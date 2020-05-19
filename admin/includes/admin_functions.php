<?php
    
    function fileAutoLoader($file)
        /** autoload function depreciated and replaced with spl autoload register using custom function as the param (see function declared outside of the custom function) */
    {
        $file = strtolower($file);
        $path = "includes/{$file}.php";
        if (file_exists($path) && !class_exists($file)) {
            require_once "$path";
        } else {
            die("File named {$file}.php could not be located") . "<br>";
        }
    }
    
    spl_autoload_register('fileAutoLoader');