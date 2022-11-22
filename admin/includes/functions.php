<?php
    /** ↓↓ depreciated function ↓↓ */
    /*function __autoload($class)
    {
        $class = strtolower($class);
        $path  = "includes/{$class}.php";
        if (file_exists($path)){
            require_once ($path);
        } else {
            die("File $class not found! It was either deleted, renamed, or moved");
        }
    }*/
    function classAutoLoader($class)
    {
//    $class = strtolower($class);
        $the_path = "includes/{$class}.php";
        if (file_exists($the_path)) {
            require_once($the_path);
        } else {
            die("<warning style='color:darkred'>The $class class was not found! <br> The file could have been deleted:<br> moved: renamed: or never created!</warning>");
        }
    }
    
    spl_autoload_register('classAutoLoader');