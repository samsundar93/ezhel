<?php

namespace App\Controller\Ezheladmin;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\ORM\Table;


class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->viewBuilder()->layout('backend');
        $this->loadComponent("Flash");
        $this->loadComponent("Common");
        $this->loadModel("Users");
        $this->loadModel('Timezones');
        $this->loadModel("Sitesettings");
    }

    public function beforeFilter(Event $event)
    {
        // allow only login, forgotpassword
        $this->Auth->allow(
            [
                'adminLoginValidation'
            ]
        );
    }

    #-----------------------------------------------------------------------------------------------------------------
    /* Admin Login*/
    public function login() {

        if(!empty($this->Auth->user())){
            return $this->redirect(BASE_URL.'ezheladmin/users/dashboard');
        }else if($this->request->is('post')){
            $user = $this->Auth->identify();
            if(!empty($user) && ($user['role_id'] == 1)){
                $this->Auth->setUser($user);
                return $this->redirect(BASE_URL.'ezheladmin/users/dashboard');
            }else{
                $this->Flash->error('Invalid username or password, try again');
            }
        }
    }
    #-----------------------------------------------------------------------------------------------------------------
    /* Admin Dashboard*/
    public function dashboard() {
        //echo 'dashboard page here';die();
    }
    #-----------------------------------------------------------------------------------------------------------------
    /*Admin Logout*/
    public function logout() {
        $this->Auth->logout();
        return $this->redirect(BASE_URL.'ezheladmin');
    }
    #-----------------------------------------------------------------------------------------------------------------
     /*sitesetting*/
     public function setting() {

         if($this->request->is('post')){
             //echo "<pre>";print_r($this->request->data);die();
             $sitesetting  = $this->Sitesettings->newEntity();
             $sitesetting  = $this->Sitesettings->patchEntity($sitesetting, $this->request->data);

             $sitesetting->id  = $this->Auth->user('role_id');
             $sitesettingEditInfo  = $this->Sitesettings->get($this->Auth->user('role_id'));

             //Site Logo ------------------------------------------------------------
             $invalid = '0';
             if(isset($this->request->data['sitelogo']['name']) && !empty($this->request->data['sitelogo']['name'])
             ){
                 $valid     = getimagesize($_FILES['sitelogo']['tmp_name']);
                 $filePart  = pathinfo($this->request->data['sitelogo']['name']);
                 $logo      = ['jpg','jpeg','gif','png'];

                 if( $this->request->data['sitelogo']['error'] == 0 &&
                     ($this->request->data['sitelogo']['size'] > 0 ) &&
                     in_array(strtolower($filePart['extension']),$logo) && !empty($valid) ) {

                     $img_path       = SITESETTINGS_LOGO_PATH;
                     if(isset($sitesettingEditInfo['sitelogo']) && !empty($sitesettingEditInfo['sitelogo'])
                         && file_exists(SITESETTINGS_LOGO_PATH.'/'.$sitesettingEditInfo['sitelogo']))
                         $this->Common->unlinkFile($sitesettingEditInfo['sitelogo'], $img_path);
                     $image_detail   = $this->Common->UploadFile($this->request->data['sitelogo'], $img_path);
                     $sitesetting->sitelogo  = $image_detail['refName'];

                 } else{

                     $invalid = '1';
                     $site_data = $this->Sitesettings->find('all')->first();
                     $this->set(compact('id','site_data'));
                     $this->Flash->error(_("Site Logo should be valid image type"));
                 }

             }
             else
                 $sitesetting->sitelogo      = $sitesettingEditInfo['sitelogo'];

             // Site FavIcon ----------------------------------------------------
             if(isset($this->request->data['site_fav_icon']['name']) && !empty($this->request->data['site_fav_icon']['name'])
                 ){


                 $valid   = getimagesize($_FILES['site_fav_icon']['tmp_name']);
                 $file     = pathinfo($this->request->data['site_fav_icon']['name']);

                 $fav      = ['ico'];


                 if( $this->request->data['site_fav_icon']['error'] == 0 &&
                     ($this->request->data['site_fav_icon']['size'] > 0 ) &&
                     in_array(strtolower($file['extension']),$fav) && !empty($valid) ) {

                     $img_path       = SITESETTINGS_LOGO_PATH;
                     if(isset($sitesettingEditInfo['site_fav_icon']) && !empty($sitesettingEditInfo['site_fav_icon'])
                         && file_exists(SITESETTINGS_LOGO_PATH.'/'.$sitesettingEditInfo['site_fav_icon']))
                         $this->Common->unlinkFile($sitesettingEditInfo['site_fav_icon'], $img_path);

                     $image_detail   = $this->Common->UploadFile($this->request->data['site_fav_icon'], $img_path);
                     $sitesetting->site_fav_icon  = $image_detail['refName'];

                 } else{

                     $invalid = '1';
                     $site_data = $this->Sitesettings->find('all')->first();
                     $this->set(compact('id','site_data'));
                     $this->Flash->error(_("Site FavIcon should be valid .ico type"));
                 }

             }
             else
                 $sitesetting->site_fav_icon      = $sitesettingEditInfo['site_fav_icon'];
             //---------------------------------------------------------------------------------------

             if($invalid == 0) {
                 if ($this->Sitesettings->save($sitesetting)){
                     $this->Flash->success(_('Site Settings updated successfully'));
                     return $this->redirect(BASE_URL.'ezheladmin/users/setting');
                 }
             }
         }

         $paydemo  = ['Demo' => 'Demo'];
         $paylive  = ['Live' => 'Live'];
         $smsdemo  = ['Demo' => 'Demo'];
         $smslive  = ['Live' => 'Live'];
         $time1hrs = ['24' => '24'];
         $time2hrs = ['48' => '48'];

         /*$zone = $this->Timezones->find('list',[
             'keyField' => 'id',
             'valueField' => 'timezone_name',
             'conditions' => [
                 'id IS NOT NULL'
             ]
         ])->hydrate(false)->toArray();*/

         $this->set(compact('paydemo','paylive','smsdemo','smslive','time1hrs','time2hrs','zone'));

         $site_data = $this->Sitesettings->find('all')->first();

         if(!empty($site_data))
             $this->request->data = $site_data;
             $this->set('site_data',$site_data);
     }

     public function adminLoginValidation() {
         $user = $this->Auth->identify();
         if(!empty($user) && ($user['role_id'] == 1)) {
             $this->Auth->setUser($user);
             return $this->redirect(BASE_URL . 'ezheladmin/users/dashboard');
         }else {
             echo 'invalid Login';die();

         }
         die();
     }

     public function payment() {

         if($this->request->is('post')) {
             $sitesetting  = $this->Sitesettings->newEntity();
             $sitesetting  = $this->Sitesettings->patchEntity($sitesetting, $this->request->data);
             $sitesetting->id  = $this->Auth->user('role_id');
             if ($this->Sitesettings->save($sitesetting)){
                 $this->Flash->success(_('Payment updated successfully'));
                 return $this->redirect(BASE_URL.'ezheladmin/users/payment');
             }
         }else {
             $site_data = $this->Sitesettings->find('all')->first();

             if(!empty($site_data))
                 $this->request->data = $site_data;
             $this->set('site_data',$site_data);
         }
     }

     public function changepassword() {
         if($this->request->is('post')) {
             //echo "<pre>";print_r($this->request->data);die();
             $userDetails  = $this->Users->newEntity();
             $userDetails  = $this->Users->patchEntity($userDetails, $this->request->data);
             $userDetails->id  = $this->Auth->user('role_id');
             if ($this->Users->save($userDetails)){
                 $this->Flash->success(_('Password Changed successfully'));
                 return $this->redirect(BASE_URL.'ezheladmin/users/changepassword');
             }
         }
     }
    #-----------------------------------------------------------------------------------------------------------------


    #-----------------------------------------------------------------------------------------------------------------
}// class end ...