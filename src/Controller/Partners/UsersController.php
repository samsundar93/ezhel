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
            'login'
        ]);
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