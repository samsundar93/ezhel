<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/3/2017
 * Time: 12:11 AM
 */
namespace App\Controller\Partners;

use App\Controller\AppController;
use Cake\Event\Event;

class ProjectsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('partner');

    }

    public function index() {

        //Load Model
        $this->loadModel('Serviceproviders');
        $this->loadModel('Users');
        $this->loadModel('Projects');

        $pendingProjects = $this->Projects->find('all', [
            'conditions' => [
                'Projects.serviceprovider_id' => $this->Auth->user('user_id'),
                'Projects.status' => 'pending',
                'Projects.delete_status' => 'N'
            ],
            'contain' => [
                'SubCategories'
            ]
        ])->hydrate(false)->toArray();
        //pr($pendingProjects);die();

        $processingProjects = $this->Projects->find('all', [
            'conditions' => [
                'serviceprovider_id' => $this->Auth->user('user_id'),
                'status' => 'processing',
                'delete_status' => 'N'
            ]
        ])->hydrate(false)->toArray();

        $this->set(compact('pendingProjects','processingProjects'));
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
}