<?php
/*function __autoload($class)
{
    $class = strtolower($class);
    $path = "includes/{$class}";
    if (file_exists($path)){
        require_once "$path";
    } else {
        die("The Class named $class cannot be found");
    }
}*/
function classAutoLoad($class)
{
    $class = strtoupper($class);
    $path = "includes/$class.php";
    if (file_exists($path)) {
        require_once "$path";
    } else {
        die("<warning style='color:darkred'>The CLASS named $class could not be found!</warning>");
    }
} /* end autoloadclass function */
spl_autoload_register('classAutoLoad');
function theTimeZone($time_zone)
{
    date_default_timezone_set($time_zone);
    return "F j, Y, g:i a";
}