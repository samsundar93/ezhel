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
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth');
        $this->loadComponent('Common');
        $this->loadModel('Sitesettings');
        $this->loadModel('Languages');
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');

        $this->prefix = (!empty($this->request->params['prefix']))
            ? $this->request->params['prefix'] : '';


        if ($this->prefix === 'ezheladmin') {
            $this->loadComponent('Auth', [
                'loginRedirect' => [
                    'controller' => 'Users',
                    'action' => 'login'
                ],
                'logoutRedirect' => [
                    'controller' => 'Users',
                    'action' => 'logout'
                ]
            ]);

            if (!empty($this->Auth->user()) && $this->Auth->user('role_id') === 2) {
                $this->Flash->success('Please logout our frontend');
                return $this->redirect(BASE_URL);
            }
        } else if ($this->prefix === 'partners') {

            $this->loadComponent('Auth', [
                'loginRedirect' => [
                    'controller' => 'Users',
                    'action' => 'login'
                ],
                'logoutRedirect' => [
                    'controller' => 'Users',
                    'action' => 'logout'
                ]
            ]);

            if (!empty($this->Auth->user()) && $this->Auth->user('role_id') === 1) {
                $this->Flash->success('Please logout our Admin panel');
                return $this->redirect(ADMIN_BASE_URL);
            }else if (!empty($this->Auth->user()) && $this->Auth->user('role_id') === 4) {
                $this->Flash->success('Please logout our customer panel');
                return $this->redirect(BASE_URL);
            }
        }else {

            $this->loadComponent('Auth', [
                'loginRedirect' => [
                    'controller' => 'Users',
                    'action' => 'index'
                ],
                'logoutRedirect' => [
                    'controller' => 'Users',
                    'action' => 'logout'
                ]
            ]);

            if (!empty($this->Auth->user()) && $this->Auth->user('role_id') === 1) {
                $this->Flash->success('Please logout our Admin panel');
                return $this->redirect(ADMIN_BASE_URL);
            }else if (!empty($this->Auth->user()) && $this->Auth->user('role_id') === 2) {
                $this->Flash->success('Please logout our partner panel');
                return $this->redirect(BASE_URL.'partners');
            }

        }


        $this->settingsDetails();
        $controller = $this->request->params['controller'];
        $action     = $this->request->params['action'];

        $this->limit            = 100;

        $languageList    =   $this->Languages->find('list', [
            'keyField' => 'code',
            'valueField' => 'code',
            'conditions' => [
                'id IS NOT NULL',
                'deleted_status' => 'No'
            ]
        ])->hydrate(false)->toArray();

        $currentLanguage = $this->request->session()->read('sessionLang');


        if($currentLanguage == '') {
            $this->request->session()->write('sessionLang','AR');
        }

        if($this->request->session()->read('sessionLang') == 'EN') {
            I18n::locale('en_US');
        }else {
            I18n::locale('es_AR');
        }

        $base_path = ROOT . '/tmp';
        $models      = $base_path.'/cache/models';
        $persistent  = $base_path.'/cache/persistent';
        $cache_files = array($models,$persistent);


        //To delete Cache files
        foreach ($cache_files as $filepath) {
            $filepath = $filepath.'/*';
            $files = glob($filepath); //get all file names
            foreach($files as $file){
                if(is_file($file))
                    unlink($file); //delete file
            }
        }
        //echo __x('written communication', 'He read the first letter');die();
        //echo __x('My name is name');die();


        $this->set(compact('controller', 'action','languageList'));
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        $this->loadComponent('Auth');
        if(!empty($this->Auth->user()))
            $this->set('logginUser', $this->Auth->user());
        else
            $this->set('logginUser', '');

        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function settingsDetails() {
        $settingsQry = $this->Sitesettings->find('all');
        $settingsDetails = (!empty($settingsQry)) ? $settingsQry -> hydrate(false) -> toArray() : '';
        if(!empty($settingsDetails)) {
            $this->set('settingsDetails', $settingsDetails);
        }
    }
}
