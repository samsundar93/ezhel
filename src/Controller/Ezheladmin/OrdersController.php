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
class OrdersController extends AppController{

    public function initialize(){

        parent::initialize();
        $this->viewBuilder()->layout('backend');
        $this->loadComponent('Common');
        $this->loadModel('Customers');
        $this->loadModel('Users');
        //$this->loadModel('Orders');
    }
#-----------------------------------------------------------------------------------------------------------------
    public function pending($process = null) {

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

    public function pendingView() {

    }
    public function processing($process = null) {

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
    public function processingView() {

    }

    public function completed($process = null) {

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
    public function completedView() {

    }

    public function failed($process = null) {

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

    public function failedView() {

    }
}
