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
class CustomersController extends AppController{

    public function initialize(){

        parent::initialize();
        $this->viewBuilder()->layout('backend');
        $this->loadComponent('Common');
        $this->loadModel('Customers');
        $this->loadModel('Users');
        //$this->loadModel('Orders');
    }
#-----------------------------------------------------------------------------------------------------------------
    /*Customer Management*/
    public function index($process = null) {
        $customerList = $this->Customers->find('all', [
            'conditions' => [
                'id IS NOT NULL'
            ],
            'order' => [
                'id' => 'DESC'
            ]
        ])->hydrate(false)->toArray();
        $this->set(compact('customerList'));

        if($process == 'Customers' ){
            $value = array($customerList);
            return $value;
        }
    }
#-----------------------------------------------------------------------------------------------------------------
    public function addedit($id = null) {
        if($this->request->is('post')) {

            if($this->request->data['userId'] != '') {

                $users = $this->Users->find('all', [
                    'conditions' =>[
                        'user_id' => $this->request->data['userId']
                    ]
                ])->hydrate(false)->first();
                //$this->request->getData('id') = $this->request->getData('editedId');
                $customerPatch['id'] = $this->request->data['userId'];
            }

            $customers = $this->Customers->newEntity();
            $customerPatch = $this->Customers->patchEntity($customers, $this->request->data);
            $saveCustomer = $this->Customers->save($customerPatch);

            if($saveCustomer) {
                $user = $this->Users->newEntity();
                $userDetails['id'] = (isset($users['id'])) ? $users['id'] : '';
                $userDetails['username'] = $this->request->data['phone_number'];
                $userDetails['password'] = $this->request->data['password'];
                $userDetails['user_id'] = $saveCustomer->id;
                $userDetails['role_id'] = '5';
                $usersPatch = $this->Users->patchEntity($user, $userDetails);
                $saveuser = $this->Users->save($usersPatch);
                if($this->request->data['userId'] != '') {
                    $this->Flash->success(__('Customer edit successful'));
                }else {
                    $this->Flash->success(__('Customer add successful '));
                }
                return $this->redirect(ADMIN_BASE_URL.'customers');
            }
        }else {

            $custEditList  = $this->Customers->find('all', [
                'conditions' => [
                    'id =' => $id
                ]
            ])->hydrate(false)->first();
            if(!empty($custEditList)) {
                $this->request->data = $custEditList;
            }
            $this->set(compact('custEditList','id'));
        }
    }
   #-----------------------------------------------------------------------------------------------------------------
    public function ajaxaction(){

        if($this->request->is('ajax')){
            if($this->request->data['action'] == 'custstatuschange'){

                $usersEnty         = $this->Customers->newEntity();
                $usersEnty         = $this->Customers->patchEntity($usersEnty,$this->request->data);
                $usersEnty->id     = $this->request->data['id'];
                $usersEnty->status = $this->request->data['changestaus'];
                $this->Customers->save($usersEnty);

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

    public function checkCustomer() {

        if($this->request->data['id'] != '') {
            $conditions = [
                'id!=' => $this->request->data['id'],
                'OR' => [
                    'username' => $this->request->data['username'],
                    'phone_number' => $this->request->data['phone_number'],
                ]
            ];

        }else {
            $conditions = [
                'OR' => [
                    'username' => $this->request->data['username'],
                    'phone_number' => $this->request->data['phone_number']
                ]
            ];
        }

        $userCount = $this->Customers->find('all', [
            'conditions' => $conditions
        ])->count();

        if($userCount == 0) {
            echo 'true';die();
        }else {
            echo 'false';exit;
        }
    }
    #-----------------------------------------------------------------------------------------------------------------
}
