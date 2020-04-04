<?php
    
    /**
     * Created by gene7
     * Using PhpStorm
     * Date: 4/3/2020
     */
    class Cars
    {
        function greeting()
        {
        
        }
        
        function anotherGreeting()
        {
        
        }
        
        function theLastMethod()
        {
        
        }
    }
    
    $class_methods = get_class_methods('Cars');
    foreach ($class_methods as $method) {
        echo $method . "<br>";
    }