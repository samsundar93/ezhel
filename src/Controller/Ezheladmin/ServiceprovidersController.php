<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller\Ezheladmin;

use Cake\Event\Event;
use App\Controller\AppController;


/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class ServiceprovidersController extends AppController{

    public function initialize(){

        parent::initialize();
        $this->viewBuilder()->layout('backend');
        $this->loadComponent('Common');
        $this->loadModel('Customers');
        $this->loadModel('Serviceproviders');
        $this->loadModel('MainCategories');
        $this->loadModel('SubCategories');
        $this->loadModel('Siblings');
        $this->loadModel('Users');
        //$this->loadModel('Orders');
    }
#-----------------------------------------------------------------------------------------------------------------
    /*Customer Management*/
    public function index($process = null) {
        $serviceprovidersList = $this->Serviceproviders->find('all', [
            'conditions' => [
                'id IS NOT NULL'
            ],
            'order' => [
                'id' => 'DESC'
            ]
        ])->hydrate(false)->toArray();
        $this->set(compact('serviceprovidersList'));

        if($process == 'Customers' ){
            $value = array($serviceprovidersList);
            return $value;
        }
    }
#-----------------------------------------------------------------------------------------------------------------
    public function getCustDetails() {

        $orderBy = '';
        if(isset($this->request->data['search']['value']) && !empty($this->request->data['search']['value'])) {
            $conditions = [
                "OR" => [
                    "name LIKE" => "%".$this->request->data['search']['value']."%",
                    "username LIKE" => "%".$this->request->data['search']['value']."%",
                    "phone_number LIKE" => "%".$this->request->data['search']['value']."%",
                ]

            ];
        }else {
            $conditions = [
                'id IS NOT NULL'
            ];
        }

        if(isset($this->request->data['order'][0]['column']) && !empty($this->request->data['order'][0]['column'])) {

            $fieldName = (($this->request->data['order'][0]['column'] == '1') ? 'name' : (($this->request->data['order'][0]['column'] == '2') ? 'username' : (($this->request->data['order'][0]['column'] == '3') ? 'phone_number' : (($this->request->data['order'][0]['column'] == '4') ? 'status' : '' ))));

            if($fieldName != '') {
                $orderBy = [
                    $fieldName => $this->request->data['order'][0]['dir']
                ];
            }

        }
        if($orderBy == '') {
            $orderBy = [
                'id' => 'DESC'
            ];
        }
        //echo "<pre>";print_r($conditions);die();
        $custDetails = $this->Customers->find('all', [
            'conditions' => $conditions,
            'order' => $orderBy
        ])->hydrate(false)->toArray();

        $Response['draw']            = $this->request->data['draw'];
        $Response['recordsTotal']    = count($custDetails);
        $Response['recordsFiltered'] = count($custDetails);

        $url = 'customers/ajaxaction';
        $action = 'custstatuschange';
        $field = 'status';

        if(!empty($custDetails)) {
            foreach($custDetails as $key => $value) {
                $activestatusChange = $value['id'].',"0"'.',"'.$field.'"'.',"'.$url.'"'.',"'.$action.'"';
                $deActiveStatusChange = $value['id'].',"1"'.',"'.$field.'"'.',"'.$url.'"'.',"'.$action.'"';
                $field = 'status';
                $Response['data'][$key]['Id']                = $key+1;
                $Response['data'][$key]['Name']              = $value['name'];
                $Response['data'][$key]['User Name']         = $value['username'];
                $Response['data'][$key]['Phone Number']      = $value['phone_number'];
                if($value['status'] == 1) {
                    $Response['data'][$key]['Status']            = "<button class='btn btn-icon-toggle active' type='button' onclick='statusChange(".$activestatusChange.")'><i class='fa fa-check'></i></button>";
                }else {
                    $Response['data'][$key]['Status']            = "<button class='btn btn-icon-toggle active' type='button' onclick='statusChange(".$deActiveStatusChange.")'><i class='fa fa-close'></i></button>";
                }

                $Response['data'][$key]['Added Date']        = date('Y-m-d h:i A', strtotime($value['created']));
            }
        }else {
            $Response['data'] = '';
        }

        echo json_encode($Response);die();
    }
    #-----------------------------------------------------------------------------------------------------------------
    public function addedit($id = null) {

        if($this->request->is('post')) {
            //echo "<pre>";print_r($this->request->data);die();

            $serviceproEditInfo = $this->Serviceproviders->find('all', [
                'conditions' => [
                    'id' => $this->request->data['userId']
                ]
            ])->hydrate(false)->first();



            $serviceList = implode(',',$this->request->data['service_category']);
            if(isset($this->request->data['language']) && !empty($this->request->data['language'])) {
                $language = implode(',',$this->request->data['language']);
            }else {
                $language = $serviceproEditInfo['language'];
            }


            $latlng = $this->Common->latlang($this->request->data['service_area']);
            if(!empty($latlng)) {
                $this->request->data['service_lat'] = $latlng[0];
                $this->request->data['service_log'] = $latlng[1];
            }

            if(isset($this->request->data['paytype']) && !empty($this->request->data['paytype'])) {
                $payType = implode(',',$this->request->data['paytype']);
            }else {
                $payType = $serviceproEditInfo['paytype'];
            }

            $usersEnty         = $this->Serviceproviders->newEntity();
            $usersEnty         = $this->Serviceproviders->patchEntity($usersEnty,$this->request->data);
            $usersEnty->id     = $this->request->data['userId'];
            $usersEnty->service_category     = $serviceList;
            $usersEnty->language     = $language;
            $usersEnty->paytype     = $payType;

            //Timing Section:
            $usersEnty->monday_status = (isset($this->request->data['monday_status'])) ? $this->request->data['monday_status'] : '';
            $usersEnty->tuesday_status = (isset($this->request->data['tuesday_status'])) ? $this->request->data['tuesday_status'] : '';
            $usersEnty->wednesday_status = (isset($this->request->data['wednesday_status'])) ? $this->request->data['wednesday_status'] : '';
            $usersEnty->thursday_status = (isset($this->request->data['thursday_status'])) ? $this->request->data['thursday_status'] : '';
            $usersEnty->friday_status = (isset($this->request->data['friday_status'])) ? $this->request->data['friday_status'] : '';
            $usersEnty->saturday_status = (isset($this->request->data['saturday_status'])) ? $this->request->data['saturday_status'] : '';
            $usersEnty->sunday_status = (isset($this->request->data['sunday_status'])) ? $this->request->data['sunday_status'] : '';

            /*if(isset($this->request->data['hourlyrate']) && !empty($this->request->data['hourlyrate'])) {
                $usersEnty->hourlyrate     = $this->request->data['hourlyrate'];
            }*/

            if(!empty($this->request->data['servicepro_photo']['name']) && getimagesize($_FILES['servicepro_photo']['tmp_name'])){

                $img_path       = SERVICEPRO_IMG_PATH;
                if(isset($serviceproEditInfo['servicepro_photo']) && !empty($serviceproEditInfo['servicepro_photo']) && file_exists(SERVICEPRO_IMG_PATH.'/'.$serviceproEditInfo['servicepro_photo']))
                    $this->Common->unlinkFile($serviceproEditInfo['servicepro_photo'], $img_path);

                $image_detail                  = $this->Common->UploadFile($this->request->data['servicepro_photo'], $img_path);
                $usersEnty->servicepro_photo  = $image_detail['refName'];#exit();

            }
            else
                $usersEnty->servicepro_photo      = ((!empty($serviceproEditInfo['servicepro_photo']) && $serviceproEditInfo['servicepro_photo'] != '') ? $serviceproEditInfo['servicepro_photo'] : '');


            if($this->Serviceproviders->save($usersEnty)) {
                if($this->request->data['userId']  == '') {
                    $this->Flash->success(_('Service Provider Added Successfully'));
                }else {
                    $this->Flash->success(_('Service Provider edited Successfully'));
                }
                $this->redirect(ADMIN_BASE_URL.'serviceproviders');

            }
        }

        $categoryList = $this->MainCategories->find('all', [
            'conditions' => [
                'MainCategories.status' => 1,
            ],
            'contain' => [
                'SubCategories' => [
                    'conditions' => [
                        'SubCategories.status' => 1
                    ]
                ]
            ]
        ])->hydrate(false)->toArray();

        foreach($categoryList as $key => $value) {
            foreach($value['sub_categories'] as $subkey => $subvalue) {
                if($subvalue['need_siblings'] == 'Yes') {
                    $siblingList = $this->Siblings->find('all', [
                        'conditions' => [
                            'subcat_id' => $subvalue['id']
                        ]
                    ])->hydrate(false)->first();
                    if(!empty($siblingList)) {
                        $categoryList[$key]['sub_categories'][$subkey]['siblings'][] = $siblingList;
                    }
                }

            }
        }

        $spEditList = $this->Serviceproviders->find('all', [
            'conditions' => [
                'id' => $id
            ]
        ])->hydrate(false)->first();

        $timingAm = [
            '12:00 AM',
            '01:00 AM',
            '02:00 AM',
            '03:00 AM',
            '04:00 AM',
            '05:00 AM',
            '06:00 AM',
            '07:00 AM',
            '08:00 AM',
            '09:00 AM',
            '10:00 AM',
            '11:00 AM',
            '12:00 PM',
            '01:00 PM',
            '02:00 PM',
            '03:00 PM',
            '04:00 PM',
            '05:00 PM',
            '06:00 PM',
            '07:00 PM',
            '08:00 PM',
            '09:00 PM',
            '10:00 PM',
            '11:00 PM',
        ];

        $serviceCategory = explode(',',$spEditList['service_category']);
        $payType = explode(',',$spEditList['paytype']);
        $language = explode(',',$spEditList['language']);
        $this->set(compact('categoryList','spEditList','serviceCategory','timingAm','payType','language'));
    }


    #-----------------------------------------------------------------------------------------------------------------
    public function ajaxaction(){

        if($this->request->is('ajax')){
            if($this->request->data['action'] == 'custstatuschange'){

                $usersEnty         = $this->Serviceproviders->newEntity();
                $usersEnty         = $this->Serviceproviders->patchEntity($usersEnty,$this->request->data);
                $usersEnty->id     = $this->request->data['id'];
                $usersEnty->status = $this->request->data['changestaus'];
                $this->Serviceproviders->save($usersEnty);

                $this->set('id', $this->request->data['id']);
                $this->set('action', 'custstatuschange');
                $this->set('field', $this->request->data['field']);
                $this->set('status', (($this->request->data['changestaus'] == 0) ? 'deactive' : 'active'));
            }
        }
    }
    #-----------------------------------------------------------------------------------------------------------------
    public function deletecust() {

        $page = $this->request->data('page');
        if($this->request->is('ajax')){
            if($this->request->data['action'] == 'Customer' && $this->request->data['id'] != ''){

                $id       = $this->request->data['id'];
                $cus      = $this->Customers->findById($id)->toArray();

                $entity1  = $this->Customers->get($this->request->data['id']);
                $result1 = $this->Customers->delete($entity1);

                $entity2 = $this->Users->get($cus[0]['user_id']);
                $result2 = $this->Users->delete($entity2);

                //$this->Orders->deleteAll(['Orders.customer_id' => $cus[0]['user_id']]);

                list($customerList) = $this->index('Customers');
                if($this->request->is('ajax')) {
                    $action         = 'custManage';
                    $this->set(compact('action', 'customerList'));
                    $this->render('ajaxaction');
                }
            }
        }
    }

    public function validateServiceproPhone()
    {

        //Checking Serviceproviders Table
        $query      = $this->Serviceproviders->find('all', [
            'conditions' => ['phone_number' => $this->request->data['phone_number'], 'id !=' => (!empty($this->request->data['editid']) ? $this->request->data['editid'] : 'NULL')]
        ])->count();

        if($query > 0 ) {
            echo 'false';exit;
        }else {
            echo 'true';exit;
        }

    }

    public function validateServiceproEmailNew()
    {

        //Checking Serviceproviders Table
        $query      = $this->Serviceproviders->find('all', [
            'conditions' => ['username' => $this->request->data['email'], 'id !=' => (!empty($this->request->data['editid']) ? $this->request->data['editid'] : 'NULL')]
        ])->count();
        //Checking Users Table
        $dataForUser= $this->Users->find('all', [
            'conditions' => ['username' => $this->request->data['email']
                , 'user_id !=' => (!empty($this->request->data['editid']) ? $this->request->data['editid'] : 'NULL')]
        ])->count();
        if($query > 0 || $dataForUser > 0) {
            echo 'exist';exit;
        }else {
            echo 'true';exit;
        }
        echo $query.'|@@|'.$dataForUser;exit();
    }
    #-----------------------------------------------------------------------------------------------------------------
}
