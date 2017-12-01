<?php
/**
 * Created by PhpStorm.
 * User: Sundar
 * Date: 9/9/2017
 * Time: 10:28 PM
 */

namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;

class ServiceslistController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('frontend');

    }
    public function beforeFilter(Event $event)
    {
        // Before Login , these are the function we can access
        $this->Auth->allow([
            'index',
            'ajaxaction'
        ]);
    }

    public function index() {

        if(!empty($this->request->session()->read('requestForm'))){
            //pr($this->request->session()->read('requestForm'));
            //Load Model
            $this->loadModel('Serviceproviders');
            $this->loadComponent('Common');

            $serviceProviderLists = $this->Serviceproviders->find('all', [
                'conditions' => [
                    'status' => '1',
                    'delete_status' => 'N',
                   // 'email_verify' => '1',
                   // 'phone_verify' => '1'
                ]
            ])->hydrate(false)->toArray();

            $result = array_values(array_column($serviceProviderLists, 'service_category'));

            $timeImplde = explode(' - ',$this->request->session()->read('requestForm.recurringTime'));
            $fromTime = strtotime($timeImplde[0]);
            $toTime = strtotime($timeImplde[1]);

            //$fromTime = strtotime('06:00 AM');
            //$toTime = strtotime('02:00 PM');
            $latlng = $this->Common->latlang($this->request->session()->read('requestForm.service_area'));
            if(!empty($latlng)) {
                $sourcelatitude = $latlng[0];
                $sourcelongitude = $latlng[1];
                $this->request->session()->write('sourcelatitude',$sourcelatitude);
                $this->request->session()->write('sourcelongitude',$sourcelongitude);
            }

            $serviceList = [];

            foreach($result as $key => $value) {
                $categoryList = explode(',',$value);
                if(in_array($this->request->session()->read('requestForm.subcategory'),$categoryList)) {
                    //pr($serviceProviderLists[$key]);
                    if($this->request->session()->read('requestForm.recurring') == 'rrecurring') {

                        //$recurringDay = implode(',',$this->request->session()->read('requestForm.recurring'));

                        $dayExplode = $this->request->session()->read('requestForm.recurringDay');
                        //$dayExplode = explode(',',$day);
                        $countOfDay = count($dayExplode);
                        //pr($dayExplode);
                        if(!empty($dayExplode)) {
                            foreach($dayExplode as $dkey => $dvalue) {

                                $dayStatus = $serviceProviderLists[$key][$dayExplode[$dkey].'_status'];
                                $serviceOpenTime = strtotime($serviceProviderLists[$key][$dayExplode[$dkey].'_firstopen_time']);
                                $serviceCloseTime = strtotime($serviceProviderLists[$key][$dayExplode[$dkey].'_secondopen_time']);

                                if($fromTime > $serviceOpenTime && $toTime <= $serviceCloseTime && $dayStatus != 'Close') {
                                    $countOfDay--;
                                }
                            }
                            //echo 'count--------------'.$countOfDay;
                            if($countOfDay == 0) {
                                $latitudeTo  = $serviceProviderLists[$key]['service_lat'];
                                $longitudeTo = $serviceProviderLists[$key]['service_log'];
                                $unit='K';
                                $distance = $this->Common->getDistance($this->request->session()->read('sourcelatitude'),$this->request->session()->read('sourcelongitude'),$latitudeTo,$longitudeTo,
                                    $unit);


                                $distance = str_replace(',','',$distance);

                                if($distance <= $serviceProviderLists[$key]['service_radius']) {
                                    $serviceProviderLists[$key]['to_distance'] = $distance;
                                    if($serviceProviderLists[$key]['experience'] == 0) {
                                        $serviceProviderLists[$key]['filter_exp'] = '0-5Y';
                                    }else if($serviceProviderLists[$key]['experience'] > 5 && $serviceProviderLists[$key]['experience'] <= 10) {
                                        $serviceProviderLists[$key]['filter_exp'] = '5Y-10Y';

                                    }else {
                                        $serviceProviderLists[$key]['filter_exp'] = '>10Y';
                                    }
                                    $serviceList[] = $serviceProviderLists[$key];
                                }
                            }
                        }
                    }else if($this->request->session()->read('requestForm.recurring') == 'ooneday') {
                        if($this->request->session()->read('requestForm.startDate') != '') {
                            $startDate = $this->request->session()->read('requestForm.startDate');
                            $splitDate = explode(' ',$startDate);
                            $dayName = strtolower(date('l', strtotime($splitDate[0])));
                            $fromTime = strtotime($splitDate[1]);

                            $serviceOpenTime = strtotime($serviceProviderLists[$key][$dayName.'_firstopen_time']);
                            $serviceCloseTime = strtotime($serviceProviderLists[$key][$dayName.'_secondopen_time']);
                            $dayStatus = $serviceProviderLists[$key][$dayName.'_status'];

                            if($fromTime > $serviceOpenTime && $toTime <= $serviceCloseTime && $dayStatus != 'Close') {
                                $latitudeTo  = $serviceProviderLists[$key]['service_lat'];
                                $longitudeTo = $serviceProviderLists[$key]['service_log'];
                                $unit='K';
                                $distance = $this->Common->getDistance($sourcelatitude,$sourcelongitude,$latitudeTo,$longitudeTo,
                                    $unit);
                                //echo $distance;die();

                                $distance = str_replace(',','',$distance);

                                if($distance <= $serviceProviderLists[$key]['service_radius']) {
                                    $serviceProviderLists[$key]['to_distance'] = $distance;
                                    $serviceList[] = $serviceProviderLists[$key];
                                }
                            }
                        }
                    }
                }
            }
            $this->set(compact('serviceList'));
        }else {
            $this->redirect(BASE_URL.'services');
        }
    }

}