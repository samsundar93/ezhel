<?php
/**
 * Created by PhpStorm.
 * User: IlayaPrabu
 * Date: 28-04-2017
 * Time: 23:22
 */
namespace App\Controller\Ezheladmin;

use App\Controller\AppController;

class SiteSettingsController extends AppController {

    public function initialize()
    {
        parent::initialize();

        $this->viewBuilder()->layout('backend');
        $this->loadModel('SiteSettings');
        $this->loadComponent('Common');
    }

    public function index() {
        if($this->request->is('post')) {
            //echo "<pre>";print_r($this->request->data);die;
            $postData = $this->request->data;
            $settingsTable = $this->SiteSettings->newEntity();
            if(!empty($postData['fav_icon']['name'])){
                $img_path       = SITESETTINGS_LOGO_PATH;
                $unLinkfav  =   explode('.', $postData['favIcon']);
                if(!empty($postData['favIcon']) && file_exists($img_path.'/'.$unLinkfav[0]))
                    $this->Common->unlinkFile($unLinkfav[0], $img_path);
                $image_detail   = $this->Common->UploadFile($postData['fav_icon'], $img_path);
                $postData['fav_icon']  = $image_detail['refName'];
            } else {
                unset($postData['fav_icon']);
            }
            if(!empty($postData['site_logo']['name'])){
                $img_path       = SITESETTINGS_LOGO_PATH;
                $unLinklogo = explode('.', $postData['siteLogo']);
                if(!empty($postData['siteLogo']) && file_exists($img_path.'/'.$unLinklogo[0]))
                    $this->Common->unlinkFile($unLinklogo[0], $img_path);
                $image_detail   = $this->Common->UploadFile($postData['site_logo'], $img_path);
                $postData['site_logo'] = $image_detail['refName'];
            } else {
                unset($postData['site_logo']);
            }
            $updateData =   $this->SiteSettings->patchEntity($settingsTable, $postData);
            $this->SiteSettings->save($updateData);
            $this->Flash->success(__('Site Settings has been updated successfully.'));
            return $this->redirect(['controller' => 'SiteSettings']);

        }
        $settingQry =   $this->SiteSettings->find('all');
        $settingDetails = (!empty($settingQry)) ? $settingQry -> hydrate(false) -> toArray() : '';
        if(!empty($settingDetails)) {
            $this->request->data = $settingDetails[0];
            $this->set('settingDetails', $settingDetails[0]);
        }
    }
    
    public function paymentSettings() {
        if($this->request->is('post')) {
            $settingsTable = $this->SiteSettings->newEntity();
            $updateData =   $this->SiteSettings->patchEntity($settingsTable, $this->request->data);
            $this->SiteSettings->save($updateData);
            $this->Flash->success(__('Payment Settings has been updated successfully.'));
            return $this->redirect(['controller' => 'SiteSettings', 'action' => 'paymentSettings']);
        }
        $settingQry =   $this->SiteSettings->find('all', [
            'fields' => [
                'id',
                'payment_type',
                'demo_url',
                'demo_business',
                'live_url',
                'live_business'
            ]
        ]);
        $settingDetails = (!empty($settingQry)) ? $settingQry -> hydrate(false) -> toArray() : '';
        if(!empty($settingDetails)) {
            $this->request->data = $settingDetails[0];
            $this->set('settingDetails', $settingDetails[0]);
        }
    }
}