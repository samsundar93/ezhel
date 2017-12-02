<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         3.0.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Use the DS to separate the directories in other defines
 */
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

/**
 * These defines should only be edited if you have cake installed in
 * a directory layout other than the way it is distributed.
 * When using custom settings be sure to use the DS and do not add a trailing DS.
 */

/**
 * The full path to the directory which holds "src", WITHOUT a trailing DS.
 */
define('ROOT', dirname(__DIR__));

/**
 * The actual directory name for the application directory. Normally
 * named 'src'.
 */
define('APP_DIR', 'src');

/**
 * Path to the application's directory.
 */
define('APP', ROOT . DS . APP_DIR . DS);

/**
 * Path to the config directory.
 */
define('CONFIG', ROOT . DS . 'config' . DS);

/**
 * File path to the webroot directory.
 */
define('WWW_ROOT', ROOT . DS . 'webroot' . DS);

/**
 * Path to the tests directory.
 */
define('TESTS', ROOT . DS . 'tests' . DS);

/**
 * Path to the temporary files directory.
 */
define('TMP', ROOT . DS . 'tmp' . DS);

/**
 * Path to the logs directory.
 */
define('LOGS', ROOT . DS . 'logs' . DS);

/**
 * Path to the cache files directory. It can be shared between hosts in a multi-server setup.
 */
define('CACHE', TMP . 'cache' . DS);

/**
 * The absolute path to the "cake" directory, WITHOUT a trailing DS.
 *
 * CakePHP should always be installed with composer, so look there.
 */
define('CAKE_CORE_INCLUDE_PATH', ROOT . DS . 'vendor' . DS . 'cakephp' . DS . 'cakephp');

/**
 * Path to the cake directory.
 */
define('CORE_PATH', CAKE_CORE_INCLUDE_PATH . DS);
define('CAKE', CORE_PATH . 'src' . DS);

//echo "<pre>";print_r($_SERVER);echo "</pre>";exit();
$site = 'local';
// Adminside
define('BASE_URL','http://'.(($site == 'local') ? ($_SERVER['SERVER_NAME'].'/subversion/ezhelnew/') : ($_SERVER['SERVER_NAME'].'/subversion/ezhelnew/')));
define('ADMIN_BASE_URL','http://'.(($site == 'local') ? ($_SERVER['SERVER_NAME'].'/subversion/ezhelnew/ezheladmin/') : ($_SERVER['SERVER_NAME'].'/subversion/ezhelnew/serviceadmin/')) );

define('LOCATION_IMG','http://'.(($site == 'local') ? ($_SERVER['SERVER_NAME'].'/subversion/ezhelnew/img/location.png') : ($_SERVER['SERVER_NAME'].'/img/location.png')));

define('PARTNER_BASE_URL',BASE_URL.'partners/');

define('BACK_LOADINGIMAGE', BASE_URL."webroot/backend/images/");
define('FRONT_LOADINGIMAGE', BASE_URL."webroot/images/");
define('ADMINPROFILE_PHOTO_PATH', WWW_ROOT."backend/images/adminprofile_photo/");
define('ADMINPROFILE_PHOTO_URL', BASE_URL."webroot/backend/images/adminprofile_photo/");


define('SITESETTINGS_LOGO_PATH', WWW_ROOT."images");
define('SITESETTINGS_LOGO_URL', BASE_URL."webroot/images/");


define('CATEGORY_LOGO_PATH', WWW_ROOT."images/subcategory");
define('CATEGORY_LOGO_URL', BASE_URL."images/subcategory");

define('MAINCATEGORY_LOGO_PATH', WWW_ROOT."images/maincategory");
define('MAINCATEGORY_LOGO_URl', BASE_URL."images/maincategory");

define('SERVICEPRO_IMG_PATH', WWW_ROOT."images/servicepro");
define('SERVICEPRO_IMG_URL', BASE_URL."webroot/images/servicepro/");


define('ITEM_LOGO_PATH', WWW_ROOT."images/item");
define('ITEM_LOGO_URL', BASE_URL."images/item");

define('FLAG_LOGO_PATH', WWW_ROOT."images/flag");
define('FLAG_LOGO_URL', BASE_URL."images/flag");


define('ADMIN_CSS','/backend/css/');
define('ADMIN_JS','/backend/js/');
define('ADMIN_IMG',BASE_URL.'webroot/backend/images/');
define('ADMIN_FONT','/backend/fonts/');
define('UPLOAD_ADMIN_IMG','backend/images/');


// Front end

define('JSON_PATH',WWW_ROOT);

define('FRONT_CSS','/css/');
define('FRONT_JS','/js/');
define('FRONT_IMG','/webroot/images/');
define('IMAGES_URL','images/');
