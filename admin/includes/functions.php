<?php
    /** ↓↓ depreciated function ↓↓ function __autoload($class)
     * {
     * $class = strtolower($class);
     * $path  = "includes/{$class}.php";
     * if (file_exists($path)){
     * require_once ($path);
     * } else {
     * die("File $class not found! It was either deleted, renamed, or moved");
     * }
     * }*/
    function myTimeZone(): string
    {
        //	F j, Y, g:i a
        //	D jS \of M y h:i A
        //	g:i a
        //	date("F j, y,");
        //	d/m/y
        date_default_timezone_set('America/Chicago');
      return "F j, Y, g:i a";
    }
    
    function classAutoLoader($class)
    {
        $the_path = "includes/{$class}.php";
        if (file_exists($the_path)) {
            require_once($the_path);
        } else {
            die("<warning style='color:darkred'>The $class class was not found! <br> The file could have been deleted:<br> moved: renamed: or never created!</warning>");
        }
    }
    
    spl_autoload_register('classAutoLoader');
    
    function redirect($location)
    {
        header("Location: {$location}");
    }
    
    function refresh($time, $location)
    {
        header("Refresh: $time; url=$location");
    }