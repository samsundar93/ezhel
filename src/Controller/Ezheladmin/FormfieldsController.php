<?php
/**
 * Created by PhpStorm.
 * User: IlayaPrabu
 * Date: 18-06-2017
 * Time: 14:54
 */

namespace App\Controller\Ezheladmin;

use App\Controller\AppController;

class FormfieldsController extends AppController {

    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('backend');
        $this->loadModel('MainCategories');
        $this->loadModel('SubCategories');
        $this->loadModel('FormFields');
        $this->loadModel('Siblings');
        $this->loadModel('FormfieldAnswers');
    }

    public function index() {

        $formData   =   $this->FormFields->find('all', [
            'contain' => [
                'FormfieldAnswers'
            ]
        ])->hydrate(false)->toArray();
        $this->set('formData', $formData);
        #pr($formData);die;
    }

    public function fieldaddedit($id = '') {

        if($this->request->is('post')) {
            //echo "<pre>";print_r($this->request->data);die();
            $postData   =   $this->request->data;
            $formFieldTbl   =   $this->FormFields->newEntity();
            $update =   $this->FormFields->patchEntity($formFieldTbl,$postData);
            if($res = $this->FormFields->save($update)) {
                if(isset($postData['FormField']) && !empty($postData['FormField'])) {
                    if(!empty($postData['id'])) {
                        $this->FormfieldAnswers->deleteAll(['FormfieldAnswers.field_id' => $postData['id']]);
                    }
                    foreach($postData['FormField'] as $key => $val) {
                        if(!empty($val['answer'])) {
                            $ansTbl = $this->FormfieldAnswers->newEntity();
                            $updateAns['field_id'] = $res['id'];
                            $updateAns['answer'] = $val['answer'];
                            $AnswerUpdate = $this->FormfieldAnswers->patchEntity($ansTbl, $updateAns);
                            $this->FormfieldAnswers->save($AnswerUpdate);
                        }
                    }
                    $this->Flash->success(__('Form Fields Created'));
                    $this->redirect(['controller' => 'Formfields', 'action' => 'index']);
                }
            }
        }
        if(!empty($id)) {
            $formData   =   $this->FormFields->find('all', [
                'conditions' => [
                    'FormFields.id' => $id
                ],
                'contain' => [
                    'FormfieldAnswers',
                ]
            ])->hydrate(false)->toArray();
            $this->set('formData', $formData);
            if(!empty($formData)) {
                $this->request->data    =   $formData[0];
                $this->set('formData', $formData[0]);
                #pr($formData[0]);die;
            }
        }
        $catList    =   $this->MainCategories->find('list', [
            'keyField' => 'id',
            'valueField' => 'maincatname',
            'conditions' => [
                'MainCategories.status' => 1
            ]
        ])->hydrate(false)->toArray();

        $subCatList    =   $this->SubCategories->find('list', [
            'keyField' => 'id',
            'valueField' => 'catname',
            'conditions' => [
                'SubCategories.status' => 1
            ]
        ])->hydrate(false)->toArray();

        $siblingList    =   $this->Siblings->find('list', [
            'keyField' => 'id',
            'valueField' => 'sibling'

        ])->hydrate(false)->toArray();

        //echo "<pre>";print_r($formData);die();
        $fieldType  =   ['text' => 'Text', 'textarea' => 'Textarea', 'radio' => 'Radio', 'select' => 'Select', 'checkbox' => 'Checkbox'];
        $this->set(compact(['catList', 'fieldType','subCatList','siblingList']));
    }

    public function ajaxLoad() {
        if($this->request->is('post') && !empty($this->request->action)) {
            $this->viewBuilder()->layout(false);
            switch(strtolower($this->request->data['action'])) {
                case 'subcat':
                    $catId  =   $this->request->data['catId'];
                    $subcatList    =   $this->SubCategories->find('list', [
                        'keyField' => 'id',
                        'valueField' => 'catname',
                        'conditions' => [
                            'SubCategories.main_category_id' => $catId,
                            'SubCategories.status' => 1
                        ]
                    ])->hydrate(false)->toArray();
                    $this->set('action', 'subcat');
                    $this->set('subcatList', $subcatList);
                    break;
                case 'sibling':
                    $subcatId  =   $this->request->data['subcatId'];
                    $siblingList    =   $this->Siblings->find('list', [
                        'keyField' => 'id',
                        'valueField' => 'sibling',
                        'conditions' => [
                            'Siblings.subcat_id' => $subcatId
                        ]
                    ])->hydrate(false)->toArray();
                    $this->set('action', 'sibling');
                    $this->set('siblingList', $siblingList);
                    break;
                case 'status':
                    /*$formId  =   $this->request->data['formId'];
                    $statusVal  =   $this->request->data['changestaus'];
                    $siblingList    =   $this->FormFields->get($formId);
                    $siblingList['status']    =   ($statusVal == 0) ? 1 : 0;
                    $this->FormFields->save($siblingList);*/

                    $category         = $this->FormFields->newEntity();
                    $category         = $this->FormFields->patchEntity($category,$this->request->data);
                    $category->id     = $this->request->data['id'];
                    $category->status = $this->request->data['changestaus'];
                    $this->FormFields->save($category);

                    $this->set('id', $this->request->data['id']);
                    $this->set('action', 'statuschange');
                    $this->set('field', $this->request->data['field']);
                    $this->set('status', (($this->request->data['changestaus'] == 0) ? 'deactive' : 'active'));
                    break;
                case 'delete':
                    $formId  =   $this->request->data['formId'];
                    $siblingList    =   $this->FormFields->get($formId);
                    $this->FormFields->delete($siblingList);
                    echo "success";die;
                    break;
            }
        }
    }

}