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
class CategoryController extends AppController{

    public function initialize(){
        parent::initialize();
        $this->viewBuilder()->layout('backend');
        $this->loadModel('MainCategories');
        $this->loadModel('SubCategories');
        $this->loadModel('Siblings');
        $this->loadComponent('Common');
    }
#----------------------------------------------------------------------------------------------------------------------
/*Category Management*/
    public function subcategory($process = null){
        $catList = $this->SubCategories->find('all', [
            'conditions' => [
                'id IS NOT NULL',
                'main_category_id !=' => '0'
            ],
            'order' => [
                'id' => 'DESC'
            ]
        ])->hydrate(false)->toArray();
        $this->set(compact('catList'));

        if($process == 'Categories' ){
            $value = array($catList);
            return $value;
        }
    }
#----------------------------------------------------------------------------------------------------------------------
    /*Category AddEdit*/
    public function subaddedit($mcatid = null,$editid = null)
    {
        if( $this->request->is('post'))      {
            #echo "<pre>";print_r($this->request->data);die();
            $categoriesTbl              = $this->SubCategories->newEntity();
            $categories                 = $this->request->data;
            $categories['id']             = (!empty($this->request->data['editid'])) ? $this->request->data['editid'] : '';
            #$categories->id             = (!empty($this->request->data['editid'])) ? $this->request->data['editid'] : '';
            $categories['catseo_url']     = $this->Common->seoUrl($this->request->data['catname']);
            $categories['main_category_id'] = (!empty($this->request->data['mcatid'])) ? $this->request->data['mcatid'] : '';
            #echo "<pre>";print_r($categories);die();

            if(!empty($categories['id']))
            {
                $subCatEditInfo     = $this->SubCategories->find('all',[
                    'fields' => ['subcat_photo'],
                    'conditions' => ['id ='=> $categories['id']] ])
                    ->hydrate(false)->first();
            }

            if(isset($this->request->data['subcat_photo']['name']) && !empty($this->request->data['subcat_photo']['name'])
            ){

                $valid     = getimagesize($_FILES['subcat_photo']['tmp_name']);
                $filePart  = pathinfo($this->request->data['subcat_photo']['name']);
                $fileType  = ['jpg','jpeg','gif','png'];


                if( $this->request->data['subcat_photo']['error'] == 0 &&
                    ($this->request->data['subcat_photo']['size'] > 0 ) &&
                    in_array(strtolower($filePart['extension']),$fileType) && !empty($valid) ) {

                    $img_path       = CATEGORY_LOGO_PATH;
                    if(isset($subCatEditInfo['subcat_photo']) && !empty($subCatEditInfo['subcat_photo']) &&
                        file_exists(CATEGORY_LOGO_PATH.'/'.$subCatEditInfo['subcat_photo']))
                        $this->Common->unlinkFile($subCatEditInfo['subcat_photo'], $img_path);
                    $image_detail   = $this->Common->UploadFile($this->request->data['subcat_photo'], $img_path);  # exit();
                    $categories['subcat_photo']  = $image_detail['refName'];#exit();

                } else{

                    $invalid = '1';
                    $catList = $this->Categories->find('all', [
                        'conditions' => [
                            'id' => $editid
                        ]
                    ])->hydrate(false)->first();
                    $this->set(compact('editid','catList'));
                    $this->Flash->error(_("Category Image should be valid image type"));
                }

            } else{
                $categories['subcat_photo']      = ((!empty($subCatEditInfo['subcat_photo']) && $subCatEditInfo['subcat_photo'] != '') ? $subCatEditInfo['subcat_photo'] : '');;
            }
            $updateCategories                 = $this->SubCategories->patchEntity($categoriesTbl,$categories);
            if($succ = $this->SubCategories->save($updateCategories)) {
                if(!empty($this->request->data['Siblings'])) {
                    if(!empty($categories['id'])) {
                        $this->Siblings->deleteAll(['subcat_id' => $categories['id']]);
                    }
                    $sibling    = $this->request->data['Siblings'];
                    foreach($sibling as $key => $val) {
                        $siblingTbl = $this->Siblings->newEntity();
                        $sibData['subcat_id']   =  $succ->id;
                        $sibData['sibling']     =  $val['Siblings'];
                        $updateData =   $this->Siblings->patchEntity($siblingTbl, $sibData);
                        $this->Siblings->save($updateData);
                        unset($updateData);
                    }
                }

            }

            $this->Flash->success(__('Sub Category has been updated successfully.'));
            return $this->redirect(['action' => 'subcategory/'
                ,'controller' => 'category']);

        }else {
            $mainCatList = $this->Common->getMaincategory();
            $subEditCatList = $this->SubCategories->find('all', [
                'conditions' => [
                    'id =' => $editid
                ],
                'contain' => [
                    'Siblings' => [
                        'fields' => [
                            'Siblings.id',
                            'Siblings.subcat_id',
                            'Siblings.sibling'
                        ]
                    ]
                ]
            ])->hydrate(false)->toArray();
            //$mcatid = '';
            #echo "<pre>";print_r($subEditCatList);die();
            $this->set('subEditCatList', $subEditCatList);
            $this->set('mainCatList', $mainCatList);
            $this->set('mcatid', $mcatid);
        }
    }

    public function maincategory($process = null){
        $catList = $this->MainCategories->find('all', [
            'conditions' => [
                'id IS NOT NULL'
            ],
            'order' => [
                'id' => 'DESC'
            ]
        ])->hydrate(false)->toArray();
        $this->set(compact('catList'));

        if($process == 'mainCategories' ){
            $value = array($catList);
            return $value;
        }
    }

    public function mainaddedit($editid = null)
    {
        if( $this->request->is('post'))      {
            //echo "<pre>";print_r($this->request->data);die();

            $categories                 = $this->MainCategories->newEntity();
            $categories                 = $this->MainCategories->patchEntity($categories,$this->request->data);
            $categories->id             = (!empty($this->request->data['editid'])) ? $this->request->data['editid'] : '';
            $categories->catseo_url     = $this->Common->seoUrl($this->request->data['maincatname']);

            //echo "<pre>";print_r($categories);die();

            if(!empty($categories['id']))
            {
                $subCatEditInfo     = $this->MainCategories->find('all',[
                    'fields' => ['maincat_photo'],
                    'conditions' => ['id ='=> $categories['id']] ])
                    ->hydrate(false)->first();
            }

            if(isset($this->request->data['maincat_photo']['name']) && !empty($this->request->data['maincat_photo']['name'])
            ){

                $valid     = getimagesize($_FILES['maincat_photo']['tmp_name']);
                $filePart  = pathinfo($this->request->data['maincat_photo']['name']);
                $fileType  = ['jpg','jpeg','gif','png'];


                if( $this->request->data['maincat_photo']['error'] == 0 &&
                    ($this->request->data['maincat_photo']['size'] > 0 ) &&
                    in_array(strtolower($filePart['extension']),$fileType) && !empty($valid) ) {

                    $img_path       = MAINCATEGORY_LOGO_PATH;
                    if(isset($subCatEditInfo['maincat_photo']) && !empty($subCatEditInfo['maincat_photo']) &&
                        file_exists(MAINCATEGORY_LOGO_PATH.'/'.$subCatEditInfo['maincat_photo']))
                        $this->Common->unlinkFile($subCatEditInfo['maincat_photo'], $img_path);
                    $image_detail   = $this->Common->UploadFile($this->request->data['maincat_photo'], $img_path);  # exit();
                    $categories->maincat_photo  = $image_detail['refName'];#exit();

                } else{

                    $invalid = '1';
                    $mainEditCatList  = $this->MainCategories->find('all', [
                        'fields' => ['id', 'maincatname','maincat_photo', 'status','meta_name','meta_description',
                            'meta_keyword']
                        ,'conditions' => ['id =' => $editid] ])
                        ->hydrate(false)->first();
                    $this->set(compact('editid','mainEditCatList'));
                    $this->Flash->error(_("Category Image should be valid image type"));
                }

            } else{
                $categories->subcat_photo      = ((!empty($subCatEditInfo['maincat_photo']) && $subCatEditInfo['maincat_photo'] != '') ? $subCatEditInfo['maincat_photo'] : '');;
            }
            $succ                       = $this->MainCategories->save($categories);

            $this->Flash->success(__('Main Category has been updated successfully.'));
            return $this->redirect(['action' => 'maincategory/'
                ,'controller' => 'category']);

        }else {
            $mainEditCatList  = $this->MainCategories->find('all', [
                'fields' => ['id', 'maincatname','maincat_photo', 'status','meta_name','meta_description',
                    'meta_keyword']
                ,'conditions' => ['id =' => $editid] ])
                ->hydrate(false)->first();

            $this->set('mainEditCatList', $mainEditCatList);
        }
    }
#--------------------------------------------------------------------------------------------------------------------
    /*Checking Name already exist*/
    public function checkCat() {
        if($this->request->data['action'] == 'subcategory') {
            if(isset($this->request->data['catname']) && !empty($this->request->data['catname'])) {
                $catseo_url   = $this->Common->seoUrl($this->request->data['catname']);
            }

            if($this->request->data['editid'] != '') {
                $condition = [
                    'catname' => $this->request->data['catname'],
                    'id !=' => $this->request->data['editid'],
                    'main_category_id =' => $this->request->data['mcatid']
                ];
            }else {
                $condition = [
                    'catname' => $this->request->data['catname']
                ];
            }

            $catCount = $this->SubCategories->find('all', [
                'conditions' => $condition
            ])->count();

            if($catCount > 0) {
                echo 'exist';
            }else {
                echo 'succ';
            }
        }else if($this->request->data['action'] == 'maincategory') {
            if(isset($this->request->data['maincatname']) && !empty($this->request->data['maincatname'])) {
                $catseo_url   = $this->Common->seoUrl($this->request->data['maincatname']);
            }

            if($this->request->data['editid'] != '') {
                $condition = [
                    'maincatname' => $this->request->data['maincatname'],
                    'id !=' => $this->request->data['editid']
                ];
            }else {
                $condition = [
                    'maincatname' => $this->request->data['maincatname']
                ];
            }

            $catCount = $this->MainCategories->find('all', [
                'conditions' => $condition
            ])->count();

            if($catCount > 0) {
                echo 'exist';
            }else {
                echo 'succ';
            }
        }

        die();
    }
#----------------------------------------------------------------------------------------------------------------------
    /*Category Status Change*/
    public function ajaxaction(){

        if($this->request->is('ajax')){
            if($this->request->data['action'] == 'subcatstatuschange'){

                $category         = $this->SubCategories->newEntity();
                $category         = $this->SubCategories->patchEntity($category,$this->request->data);
                $category->id     = $this->request->data['id'];
                $category->status = $this->request->data['changestaus'];
                $this->SubCategories->save($category);

                $this->set('id', $this->request->data['id']);
                $this->set('action', 'subcatstatuschange');
                $this->set('field', $this->request->data['field']);
                $this->set('status', (($this->request->data['changestaus'] == 0) ? 'deactive' : 'active'));
            }

            if($this->request->data['action'] == 'maincatstatuschange'){

                $category         = $this->MainCategories->newEntity();
                $category         = $this->MainCategories->patchEntity($category,$this->request->data);
                $category->id     = $this->request->data['id'];
                $category->status = $this->request->data['changestaus'];
                $this->MainCategories->save($category);

                $this->set('id', $this->request->data['id']);
                $this->set('action', 'maincatstatuschange');
                $this->set('field', $this->request->data['field']);
                $this->set('status', (($this->request->data['changestaus'] == 0) ? 'deactive' : 'active'));
            }
        }
    }
    #------------------------------------------------------------------------------------------------------------------
    /*Category Delete*/
    public function deletecate($id = null){

        if($this->request->is('ajax')){
            if($this->request->data['action'] == 'SubCategories' && $this->request->data['id'] != ''){

                $id       = $this->request->data['id'];
                $cat      = $this->SubCategories->findById($id)->toArray();


                /*Category Image Delete*/
                $cat_path = CATEGORY_LOGO_PATH;
                $entity = $this->SubCategories->get($id);
                $result = $this->SubCategories->delete($entity);
                if(isset($cat) && !empty($cat) && file_exists($cat_path.'/'.$cat[0]['subcat_photo'])){
                    $this->Common->unlinkFile($cat[0]['subcat_photo'], $cat_path);
               }

                list($catList) = $this->subcategory('Categories');
                if($this->request->is('ajax')) {
                    $action         = 'SubCategories';
                    $this->set(compact('action', 'catList'));
                    $this->render('ajaxaction');
                }
            }

            if($this->request->data['action'] == 'mainCategories' && $this->request->data['id'] != ''){

                $id       = $this->request->data['id'];
                $cat      = $this->MainCategories->findById($id)->toArray();


                /*Category Image Delete*/
                $cat_path = MAINCATEGORY_LOGO_PATH;
                $entity = $this->MainCategories->get($id);
                $result = $this->MainCategories->delete($entity);
                if(isset($cat) && !empty($cat) && file_exists($cat_path.'/'.$cat[0]['subcat_photo'])){
                    $this->Common->unlinkFile($cat[0]['maincat_photo'], $cat_path);
               }

                list($catList) = $this->maincategory('mainCategories');
                if($this->request->is('ajax')) {
                    $action         = 'mainCategories';
                    $this->set(compact('action', 'catList'));
                    $this->render('ajaxaction');
                }
            }
        }
    }
    #------------------------------------------------------------------------------------------------------------------



}//class end...
