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
class LanguagesController extends AppController{

    public function initialize(){

        parent::initialize();
        $this->viewBuilder()->layout('backend');
        $this->loadComponent('Common');
        $this->loadModel('Users');
        $this->loadModel('Languages');
        //$this->loadModel('Orders');
    }
#-----------------------------------------------------------------------------------------------------------------
    public function index() {
        $languageList  = $this->Languages->find('all', [
            'conditions' => [
                'id IS NOT NULL',
                'deleted_status' => 'No'
            ]
        ])->hydrate(false)->toArray();

        $this->set(compact('languageList'));

    }

    public function addEdit($editid = null) {
        //echo "<pre>";print_r($this->request->data);die();

        if( $this->request->is('post'))      {
            //echo "<pre>";print_r($this->request->data);die();

            $language                 = $this->Languages->newEntity();
            $language                 = $this->Languages->patchEntity($language,$this->request->data);
            $language->id             = (!empty($this->request->data['editid'])) ? $this->request->data['editid'] : '';
            $language->catseo_url     = $this->Common->seoUrl($this->request->data['name']);

            //echo "<pre>";print_r($categories);die();

            if(!empty($language['id']))
            {
                $langEditInfo     = $this->Languages->find('all',[
                    'fields' => ['flag'],
                    'conditions' => ['id ='=> $language['id']] ])
                    ->hydrate(false)->first();
            }

            if(isset($this->request->data['flag']['name']) && !empty($this->request->data['flag']['name'])
            ){

                $valid     = getimagesize($_FILES['flag']['tmp_name']);
                $filePart  = pathinfo($this->request->data['flag']['name']);
                $fileType  = ['jpg','jpeg','gif','png'];


                if( $this->request->data['flag']['error'] == 0 &&
                    ($this->request->data['flag']['size'] > 0 ) &&
                    in_array(strtolower($filePart['extension']),$fileType) && !empty($valid) ) {

                    $img_path       = FLAG_LOGO_PATH;
                    if(isset($subCatEditInfo['flag']) && !empty($subCatEditInfo['flag']) &&
                        file_exists(FLAG_LOGO_PATH.'/'.$subCatEditInfo['flag']))
                        $this->Common->unlinkFile($subCatEditInfo['flag'], $img_path);
                    $image_detail   = $this->Common->UploadFile($this->request->data['flag'], $img_path);  # exit();
                    $language->flag  = $image_detail['refName'];#exit();

                } else{

                    $invalid = '1';
                    $languageList  = $this->Languages->find('all', [
                        'fields' => ['id', 'name','flag']
                        ,'conditions' => ['id =' => $editid] ])
                        ->hydrate(false)->first();
                    $this->set(compact('editid','languageList'));
                    $this->Flash->error(_("Category Image should be valid image type"));
                }

            } else{
                $language->flag      = ((!empty($langEditInfo['flag']) && $langEditInfo['flag'] != '') ? $langEditInfo['flag'] : '');;
            }
            $succ                       = $this->Languages->save($language);

            $this->Flash->success(__('Language has been updated successfully.'));
            return $this->redirect(ADMIN_BASE_URL.'languages');

        }else {
            $languageList  = $this->Languages->find('all', [
                'conditions' => [
                    'id =' => $editid
                ]
            ])->hydrate(false)->first();

            $this->set('languageList', $languageList);
        }

    }

    public function checkLang() {


        if($this->request->data['editid'] != '') {
            $condition = [
                'name' => $this->request->data['name'],
                'id !=' => $this->request->data['editid'],
                'code' => $this->request->data['code'],
            ];
        }else {
            $condition = [
                'name' => $this->request->data['name'],
                'code' => $this->request->data['code']
            ];
        }

        $catCount = $this->Languages->find('all', [
            'conditions' => $condition
        ])->count();

        if($catCount > 0) {
            echo 'exist';
        }else {
            echo 'succ';
        }
        die();
    }

    public function ajaxaction(){

        if($this->request->is('ajax')){
            if($this->request->data['action'] == 'languagestatuschange'){

                $category         = $this->Languages->newEntity();
                $category         = $this->Languages->patchEntity($category,$this->request->data);
                $category->id     = $this->request->data['id'];
                $category->status = $this->request->data['changestaus'];
                $this->Languages->save($category);

                $this->set('id', $this->request->data['id']);
                $this->set('action', 'languagestatuschange');
                $this->set('field', $this->request->data['field']);
                $this->set('status', (($this->request->data['changestaus'] == 0) ? 'deactive' : 'active'));
            }
        }
    }
}