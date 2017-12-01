<?php
/**
 * Created by PhpStorm.
 * User: Sundar
 * Date: 9/19/2017
 * Time: 10:44 PM
 */
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;

class PartnersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('frontend');



        /*$this->Auth->loginAction = [
            'controller' => 'Users',
            'action' => 'logins',
            'plugin' => null
        ];*/

    }
    public function beforeFilter(Event $event)
    {
        // Before Login , these are the function we can access
        $this->Auth->allow([
            'signup',
            'partnerLogin',
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

            /*if(isset($this->request->data['paytype']) && !empty($this->request->data['paytype'])) {
                $payType = implode(',',$this->request->data['paytype']);
            }else {
                $payType = $serviceproEditInfo['paytype'];
            }*/

            $usersEnty         = $this->Serviceproviders->newEntity();
            $usersEnty         = $this->Serviceproviders->patchEntity($usersEnty,$this->request->data);
            $usersEnty->id     = $this->Auth->user('user_id');
            //$usersEnty->service_category     = $serviceList;
            $usersEnty->language     = $language;
            //$usersEnty->paytype     = $payType;
            $this->Serviceproviders->save($usersEnty);
            $this->Flash->success(__('profile update successful'));
            return $this->redirect(BASE_URL.'partners/profile');

        }

        $profileDetails = $this->Serviceproviders->find('all', [
            'conditions' => [
                'id' => $this->Auth->user('user_id')
            ]
        ])->hydrate(false)->first();
        $selectedLanguage = explode(',',$profileDetails['language']);

        $this->set(compact('profileDetails','selectedLanguage'));
    }
    public function project() {
        //Load Model
        $this->loadModel('Serviceproviders');
        $this->loadModel('Users');
        $this->loadModel('Projects');

        $pendingProjects = $this->Projects->find('all', [
            'conditions' => [
                'serviceprovider_id' => $this->Auth->user('user_id'),
                'status' => 'pending',
                'delete_status' => 'N'
            ]
        ])->hydrate(false)->toArray();

        $processingProjects = $this->Projects->find('all', [
            'conditions' => [
                'serviceprovider_id' => $this->Auth->user('user_id'),
                'status' => 'processing',
                'delete_status' => 'N'
            ]
        ])->hydrate(false)->toArray();
    }

    public function pendingView($id = null) {

        $this->loadModel('Serviceproviders');
        $this->loadModel('Users');
        $this->loadModel('Projects');

        $pendingView = $this->Projects->find('all', [
            'conditions' => [
                'serviceprovider_id' => $this->Auth->user('user_id'),
                'status' => 'pending',
                'delete_status' => 'N',
                'id' => $id
            ]
        ])->hydrate(false)->toArray();
    }

    public function ongoingView($id = null) {

        $this->loadModel('Serviceproviders');
        $this->loadModel('Users');
        $this->loadModel('Projects');

        $processingView = $this->Projects->find('all', [
            'conditions' => [
                'serviceprovider_id' => $this->Auth->user('user_id'),
                'status' => 'processing',
                'delete_status' => 'N',
                'id' => $id
            ]
        ])->hydrate(false)->toArray();

    }
    public function history() {

        $this->loadModel('Serviceproviders');
        $this->loadModel('Users');
        $this->loadModel('Projects');

        $conditions = [
            'OR' => [
                [
                    'status' => 'completed'
                ],
                [
                    'status' => 'failed'
                ]

            ]
        ];

        $historyProjects = $this->Projects->find('all', [
            'conditions' => [
                'serviceprovider_id' => $this->Auth->user('user_id'),
                $conditions,
                'delete_status' => 'N'
            ]
        ])->hydrate(false)->toArray();
        //echo "<pre>";print_r($historyProjects);die();
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
            return $this->redirect(BASE_URL.'partners/myaccount');

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
        return $this->redirect(BASE_URL);
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