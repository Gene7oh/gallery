<?php
    /*function spf_autoload_register($class)
    {
//        $class = strtolower($class);
        $path  = "includes/{$class}.php";
        if (file_exists($path)){
            require_once ($path);
        } else {
            die("File $class not found! It was either deleted, renamed, or moved");
        }
    }*/ /** depreciated function */
function classAutoLoader($class){
//    $class = strtolower($class);
    $the_path = "includes/{$class}.php";
    if (file_exists($the_path)){
        require_once ($the_path);
    } else {
        die("The $class class was not found the file was either renamed, moved, never created or deleted");
    }
}
spl_autoload_register('classAutoLoader');