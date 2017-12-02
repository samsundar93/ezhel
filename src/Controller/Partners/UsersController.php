<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 30-10-2017
 * Time: 15:58
 */
namespace App\Controller\Partners;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('partner');

    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow([
            'login',
            'signup',
            'partnerLogin'
        ]);
    }

    public function signup() {
        if($this->request->is('post')) {

            $this->loadModel('Serviceproviders');
            $this->loadModel('Users');

            //Service provider
            $spEntity                 = $this->Serviceproviders->newEntity();
            $spUdtPatch               = $this->Serviceproviders->patchEntity($spEntity, $this->request->data);
            $spSave                   = $this->Serviceproviders->save($spUdtPatch);

            //Users
            $udtUser['sp_username']            = $this->request->data['username'];
            $udtUser['sp_password']            = $this->request->data['password'];
            $udtUser['role_id']             = '2';
            $udtUser['status']              = '1';
            $udtUser['user_id']             = $spSave->id;
            $userEntity                     = $this->Users->newEntity();
            $userUdtPatch                   = $this->Users->patchEntity($userEntity, $udtUser);
            $userSave                       = $this->Users->save($userUdtPatch);
            if($userSave) {
                $this->Flash->success(__('Registered successful. Admin will contact soon'));
                return $this->redirect(BASE_URL.'partners/signup');
            }

        }

    }

    public function partnerLogin()
    {
        //Load Model
        $this->loadModel('Serviceproviders');
        $this->loadModel('Users');

        if($this->request->data['username'] != '' && $this->request->data['password'] != ''){

            $this->Auth->config('authenticate', [
                'Form' => [
                    'fields' => [
                        'username' => 'sp_username',
                        'password' => 'sp_password'
                    ]
                ]
            ]);
            $this->request->data['sp_username'] = $this->request->data['username'];
            $this->request->data['sp_password'] = $this->request->data['password'];

            $user           = $this->Auth->identify();
            //echo "<pre>";print_r($user);die();
            if(!empty($user)) {
                $sp_status      = $this->Serviceproviders->find('all', [
                    'fields' => ['status']
                    ,'conditions' => ['id ='=> $user['user_id']] ])
                    ->hydrate(false)->toArray();

                if(count($sp_status) != 0 && ($sp_status[0]['status'] == '0' || $sp_status[0]['status'] == '1' ) && $user['role_id'] == '2'){
                    $this->Auth->setUser($user);
                    $username   = $this->Serviceproviders->find('all',[
                        'fields' => 'firstname'
                        ,'conditions' => ['id ='=> $this->Auth->user('user_id')] ])
                        ->hydrate(false)->first();
                    $this->request->session()->write('splusername',$username['firstname']);
                    echo 1;exit();
                }
                else if(count($sp_status) != 0 && $sp_status[0]['status'] == 0 && $user['role_id'] == '2'){
                    echo 2;exit();
                }
                else{
                    echo 3;exit();
                }
            }else {
                echo 4;exit();
            }

        }
    }

    public function login() {
        if(!empty($this->Auth->user())){
            if($this->Auth->redirectUrl() == '/') {
                return $this->redirect(PARTNER_BASE_URL.'users/dashboard');
            }else {
                return $this->redirect($this->Auth->redirectUrl());
            }

        }else if($this->request->is('post')){
            $user = $this->Auth->identify();
            if(!empty($user) && ($user['role_id'] == 2)){
                $this->Auth->setUser($user);
                return $this->redirect(PARTNER_BASE_URL.'users/dashboard');
            }else{
                $this->Flash->error('Invalid username or password, try again');
            }
        }
    }

    public function dashboard() {

    }

    public function profile() {
        $this->loadModel('Serviceproviders');

        if($this->request->is('post')) {


            $serviceproEditInfo = $this->Serviceproviders->find('all', [
                'conditions' => [
                    'id' => $this->Auth->user('user_id')
                ]
            ])->hydrate(false)->first();



            //$serviceList = implode(',',$this->request->data['service_category']);
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


            $usersEnty         = $this->Serviceproviders->newEntity();
            $usersEnty         = $this->Serviceproviders->patchEntity($usersEnty,$this->request->data);
            $usersEnty->id     = $this->Auth->user('user_id');
            //$usersEnty->service_category     = $serviceList;
            $usersEnty->language     = $language;
            //$usersEnty->paytype     = $payType;
            $this->Serviceproviders->save($usersEnty);
            $this->Flash->success(__('profile update successful'));
            return $this->redirect(PARTNER_BASE_URL.'users/profile');

        }

        $profileDetails = $this->Serviceproviders->find('all', [
            'conditions' => [
                'id' => $this->Auth->user('user_id')
            ]
        ])->hydrate(false)->first();
        $selectedLanguage = explode(',',$profileDetails['language']);

        $this->set(compact('profileDetails','selectedLanguage'));
    }


    public function myaccount() {
        $this->loadModel('Serviceproviders');
        $this->loadModel('Users');
        if($this->request->is('post')) {
            $this->request->data['id'] = $this->Auth->user('user_id');
            $spEdit = $this->Serviceproviders->newEntity();
            $spPatch = $this->Serviceproviders->patchEntity($spEdit,$this->request->data);
            $spUpdate = $this->Serviceproviders->save($spPatch);

            //Users Update
            $this->request->data['id'] = $this->Auth->user('id');
            $this->request->data['sp_username'] = $this->request->data['username'];
            $userEdit = $this->Users->newEntity();
            $userPatch = $this->Users->patchEntity($userEdit,$this->request->data);
            $userUpdate = $this->Users->save($userPatch);

            $this->Flash->success(__('Account update successful.'));
            return $this->redirect(PARTNER_BASE_URL.'users/myaccount');

        }
        $myaccountDetails = $this->Serviceproviders->find('all', [
            'conditions' => [
                'id' => $this->Auth->user('user_id')
            ]
        ])->hydrate(false)->first();
        $userId = $this->Auth->user('id');

        $this->set(compact('myaccountDetails','userId'));

    }

    public function partnerLogout() {
        $this->request->session()->write('splusername','');
        $this->Auth->logout();
        return $this->redirect(PARTNER_BASE_URL);
    }

    public function verifyPassword() {
        if($this->request->data['password'] != '') {
            $this->loadModel('Users');
            $userDetails = $this->Users->find('all', [
                'conditions' => [
                    'id' => $this->Auth->user('id')
                ]
            ])->hydrate(false)->first();

            if ((new DefaultPasswordHasher)->check($this->request->data['password'], $userDetails['sp_password'])) {

                $this->Auth->config('authenticate', [
                    'Form' => [
                        'fields' => [
                            'password' => 'sp_password'
                        ]
                    ]
                ]);

                //$this->request->data['sp_password'] = $this->request->data['password'];
                //$this->request->data['password'] = '';

                $userEdit = $this->Users->newEntity();
                $userEdt['sp_password'] = $this->request->data['newpassword'];
                $userEdt['id'] = $userDetails['id'];
                $userPatch = $this->Users->patchEntity($userEdit,$userEdt);
                $userUpdate = $this->Users->save($userPatch);
                $this->request->session()->write('splusername','');
                $this->Auth->logout();
                $this->Flash->success(__('Password changed successful.'));
                echo '1';die();
            }else {
                echo '3';die();
            }

        }else {
            echo '2';die();
        }
    }
}