<?php
    
    namespace gallery;
    // Create the class
    class Cars
    {
        // create some methods which are just functions in a class.
        function greeting()
        {
            echo "This is the greeting function" . "<br>";
        }
        
        function wheels()
        {
            echo 4 . "<br>";
        }
    }
    new Cars();
    $greet = new Cars();
    echo $greet->greeting();
    echo $greet->wheels();