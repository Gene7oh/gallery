<?php
    /** @noinspection PhpDefineCanBeReplacedWithConstInspection */
    /* if (defined('DS')){
         null;
     } else {
         define('DS', DIRECTORY_SEPARATOR);
     }*/
    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
    define('SITE_ROOT', DS . 'Z:' . DS . 'XAMPP' . DS . 'HTDOCS' . DS . 'PROJECTS' . DS . 'GALLERY');
    defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', 'SITE_ROOT' . DS . 'ADMIN' . DS . 'INCLUDES');
    require_once "functions.php";
    require_once "new-config.php";
    require_once "Database.php";
    require_once "Db_object.php";
    require_once "User.php";
    require_once "Photo.php";
    require_once "Session.php";