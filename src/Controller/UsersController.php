<?php
/**
 * Created by PhpStorm.
 * User: Sundar
 * Date: 9/5/2017
 * Time: 11:06 AM
 */
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;

class UsersController extends AppController
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
            'hireservice',
            'customerLogin',
            'partnerVerify',
            'setLanguage'
        ]);
    }

    public function index()
    {
        $this->request->session()->write('requestForm', '');

        $this->loadModel('MainCategories');

        $mainServiceList = $this->MainCategories->find('all', [
            'conditions' => [
                'id IS NOT NULL',
                'status' => 1,
            ]
        ])->hydrate(false)->toArray();
        $this->set(compact('mainServiceList'));

    }

    public function hireservice() {
        if($this->request->data['id'] != '') {
            $this->loadModel('Projects');
            $this->loadModel('Projectanswers');

            //Project Add
            $projectEntity = $this->Projects->newEntity();
            $projectPatchEntity = $this->Projects->patchEntity($projectEntity,$this->request->session()->read('requestForm'));
            $projectPatchEntity->serviceprovider_id = $this->request->data['id'];
            $projectPatchEntity->recurringDay = implode(',',$this->request->session()->read('requestForm.recurringDay'));
            $projectPatchEntity->customer_id = $this->Auth->user('user_id');
            $projectId = $this->Projects->save($projectPatchEntity);

            if($projectId) {

                $ordergenid = $this->Common->generateId($projectId->id);
                $finalorderid = "EHL".$ordergenid;

                $orderUpdate['project_number']  =  $finalorderid;
                $orderUpdate['id']                =  $projectId->id;
                $leadsupdt = $this->Projects->patchEntity($projectEntity,$orderUpdate);
                $leadssave = $this->Projects->save($leadsupdt);
            }

            $questions = $this->request->session()->read('requestForm.question');

            //Projects Questions
            foreach($questions as $key => $value) {
                $projectEntity = $this->Projectanswers->newEntity();
                $updateAnswer['project_id'] = $projectId->id;
                $updateAnswer['formfield_id'] = $value;
                if(is_array($this->request->session()->read('requestForm.answers_'.$value))) {
                    $updateAnswer['answer'] = implode(',',$this->request->session()->read('requestForm.answers_'.$value));
                }else {
                    $updateAnswer['answer'] = $this->request->session()->read('requestForm.answers_'.$value);
                }
                $projectPatchEntity = $this->Projectanswers->patchEntity($projectEntity,$updateAnswer);
                $this->Projectanswers->save($projectPatchEntity);

            }
            if($questions) {
                echo 'success';die();
            }else {
                echo 'error';die();
            }
            die();
        }else {
            echo 'missing';die();
        }
    }

    public function customerLogin() {
        //Load Model
        $this->loadModel('Customers');
        $this->loadModel('Users');

        if($this->request->data['username'] != '' && $this->request->data['password'] != '') {

            $user           = $this->Auth->identify();

            if(count($user) != 0)
                $sp_status      = $this->Customers->find('all', [
                    'fields' => [
                        'status'
                    ],
                    'conditions' => [
                        'id ='=> $user['user_id']
                    ]
                ])->hydrate(false)->toArray();

            if(count($sp_status) != 0 && !empty($sp_status[0]['status']) && $sp_status[0]['status'] == '1' &&
                $user['role_id'] == '5'){
                $this->Auth->setUser($user);
                $username   = $this->Customers->find('all',[
                    'fields' => [
                        'name',
                        'id'
                    ],
                    'conditions' => [
                        'id ='=> $this->Auth->user('user_id')
                    ]
                ])->hydrate(false)->first();

                $this->request->session()->write('customername',$username['name']);
                $this->Flash->success(__('Login successful.'));
                echo 1;exit();
            }
            else if(count($sp_status) != 0 && $sp_status[0]['status'] == 0 && $user['role_id'] == '5'){
                echo 2;exit();
            }
            else{
                echo 0;exit();
            }

        }else {
            echo 3; die();
        }
    }



    public function customerLogout() {
        $this->request->session()->write('customername','');
        $this->Auth->logout();
        return $this->redirect(BASE_URL);
    }

    public function partnerVerify() {
        if($this->request->data['username'] != '') {
            $this->loadModel('Users');
            if(isset($this->request->data['editId']) && $this->request->data['editId'] != '') {
                $conditions = [
                    'sp_username' => $this->request->data['username'],
                    'id !=' => $this->request->data['editId']
                ];
            }else {
                $conditions = [
                    'sp_username' => $this->request->data['username']
                ];
            }

            $userCount = $this->Users->find('all', [
                'conditions' => $conditions
            ])->count();
            if($userCount == 0) {
                echo '1';
            }else {
                echo '2';
            }
        }else {
            echo '3';
        }
        die();
    }

    public function setLanguage() {

        $this->request->session()->write('sessionLang',$this->request->data['lang']);
        die();
    }

}