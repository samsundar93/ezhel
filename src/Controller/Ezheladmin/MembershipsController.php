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
class MembershipsController extends AppController{

    public function initialize(){

        parent::initialize();
        $this->viewBuilder()->layout('backend');
        $this->loadComponent('Common');
        $this->loadModel('Users');
        $this->loadModel('Memberships');
        //$this->loadModel('Orders');
    }
#-----------------------------------------------------------------------------------------------------------------
    public function index($process = null) {
        $memberShipsList  = $this->Memberships->find('all', [
            'conditions' => [
                'id IS NOT NULL',
                'delete_status' => 'No'
            ]
        ])->hydrate(false)->toArray();


        $this->set(compact('memberShipsList'));

        if($process == 'Members') {
            $value = array($memberShipsList);
            return $value;
        }

    }

    public function addEdit($editid = null) {
        //echo "<pre>";print_r($this->request->data);die();

        if( $this->request->is('post')){
            //echo "<pre>";print_r($this->request->data);die();

            $member = $this->Memberships->newEntity();
            $member = $this->Memberships->patchEntity($member,$this->request->data);
            $member->id = (!empty($this->request->data['editid'])) ? $this->request->data['editid'] : '';

            $succ                       = $this->Memberships->save($member);

            $this->Flash->success(__('Member ship has been updated successfully.'));
            return $this->redirect(ADMIN_BASE_URL.'memberships');

        }else {
            $membershipsList  = $this->Memberships->find('all', [
                'conditions' => [
                    'id =' => $editid
                ]
            ])->hydrate(false)->first();

            $this->set('membershipsList', $membershipsList);
        }

    }

    public function ajaxaction(){

        if($this->request->is('ajax')){
            if($this->request->data['action'] == 'memberstatuschange'){

                $category         = $this->Memberships->newEntity();
                $category         = $this->Memberships->patchEntity($category,$this->request->data);
                $category->id     = $this->request->data['id'];
                $category->status = $this->request->data['changestaus'];
                $this->Memberships->save($category);

                $this->set('id', $this->request->data['id']);
                $this->set('action', 'memberstatuschange');
                $this->set('field', $this->request->data['field']);
                $this->set('status', (($this->request->data['changestaus'] == 0) ? 'deactive' : 'active'));
            }
        }
    }

    public function deletecust() {
        if($this->request->is('ajax')){
            if($this->request->data['action'] == 'Membership' && $this->request->data['id'] != ''){

                $entity1  = $this->Memberships->get($this->request->data['id']);
                $result1 = $this->Memberships->delete($entity1);

                list($memberShipsList) = $this->index('Members');
                if($this->request->is('ajax')) {
                    $action         = 'membershipsManage';
                    $this->set(compact('action', 'memberShipsList'));
                    $this->render('ajaxaction');
                }
            }
        }
    }
}