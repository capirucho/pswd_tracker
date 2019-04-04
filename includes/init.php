<?php
/**
 * Created by PhpStorm.
 * User: ronald
 * Date: 2018-12-18
 * Time: 02:56
 */



	defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
	define('SITE_ROOT', DS . 'Users' . DS . 'ronald' . DS . 'Sites' . DS . 'Personal'. DS . 'password_app');
	defined ('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS . 'includes');
    defined ('CLASSES_PATH') ? null : define('CLASSES_PATH', SITE_ROOT . DS . 'classes');


    require_once(INCLUDES_PATH . DS ."functions.php");
    require_once(INCLUDES_PATH . DS ."config.php");
    require_once(CLASSES_PATH . DS ."Database.php");
    require_once(CLASSES_PATH . DS ."Object_Helper.php");
    require_once(CLASSES_PATH . DS ."User.php");
    require_once(CLASSES_PATH) . DS . "Account.php";
    require_once(CLASSES_PATH) . DS . "Account_Type.php";
    require_once(CLASSES_PATH . DS ."Session.php");
    require_once(CLASSES_PATH . DS ."Paginate.php");

