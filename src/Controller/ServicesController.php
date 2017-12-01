<?php
/**
 * Created by PhpStorm.
 * User: Sundar
 * Date: 9/6/2017
 * Time: 12:10 AM
 */
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;

class ServicesController extends AppController
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
            'ajaxaction'
        ]);
    }

    public function index()
    {
        if($this->request->is('post')) {
            if(!empty($this->request->data)){
                $this->request->session()->write('requestForm', $this->request->data);
                $this->redirect(BASE_URL.'serviceslist');
            }
        }else {
            $this->request->session()->write('requestForm', '');
        }

        $this->loadModel('MainCategories');
        $this->loadModel('SubCategories');
        //echo "<pre>";print_r($this->request->data);die();

        $mainServiceList = $this->MainCategories->find('all', [
            'conditions' => [
                'MainCategories.id IS NOT NULL',
                'MainCategories.status' => 1,
            ],
            'contain' => [
                'SubCategories' => [
                    'conditions' => [
                        'SubCategories.id IS NOT NULL',
                        'SubCategories.status' => 1
                    ],
                ]
            ]
        ])->hydrate(false)->toArray();

        //echo "<pre>";print_r($mainServiceList);die();

        $this->set(compact('mainServiceList'));

    }

    public function ajaxaction() {

        $this->loadModel('FormFields');
        $this->loadModel('FormfieldAnswers');

        $formFields = $this->FormFields->find('all', [
            'conditions' => [
                'subcat_id' => $this->request->data['id'],
                'status' => '1'
            ],
            'contain' => [
                'FormfieldAnswers'
            ]
        ])->hydrate(false)->toArray();

        $this->set(compact('formFields'));
    }
}