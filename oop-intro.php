<?php
    
    namespace gallery;
    // Create the class
    class Cars
    {
        // create some methods which are just functions in a class.
        // inside the class are the variables definitions and methods(aka functions)
        function greeting()
        {
            echo "This is the greeting function" . "<br>";
        }
        
        function wheels()
        {
            echo 4 . "<br>";
        }
    }
    
    // create instance of class (aka instantiating) creating an object
    $greet = new Cars();
    echo $greet->greeting();
    echo $greet->wheels();
    echo "---------------- Properties--------------" . "<br>";
    //create properties for the method
    // properties are created with the var keyword.
    class Planes
    {
        var int    $wings  = 4;
        var string $engine = "royce";
        var int    $wheels = 16;
        var string $make   = "Boeing";
        // TODO fix search in the settings menu
        // variables used inside the method are called using the $this pseudo(??) var. IE $this->engine. No need for the $ for the already declared var.
        
        function planeDetail(): mixed
            // ↑↑ the (): var type (mixed) stops an error nag.
        {
            return "This Plane is made by " . $this->make . ", and has " . $this->wings . " wings, counting the tail ." . "<br>" .
                "The engine is made by " . $this->engine . " and sports " . $this->wheels . " !";
        }
    }
    
    class Helo extends Planes
    {
        var int $blade_count = 8;
        var int $seat_count  = 12;
        
        function heloDetails(): mixed
        {
            return "This model Helicopter has " . $this->blade_count . " blades, including the rear stabilizer." . "<br>" . "The cabin is the roomy " . $this->seat_count . " seat luxury version";
        }
    }
    
    $f4 = new Planes();
    echo $f4->wings;
    echo $f4->planeDetail();
    echo "<br>" . "adjust wheel count outside the method using the f 4 var -> wheels = 20. then recall the method using the ec ho f 4-> planeDetail" . "<br>";
    $f4->wheels = 20;
    echo $f4->planeDetail();
    echo "<br>";
    $helo = new Helo();
    echo $helo->heloDetails() . " . With the " . $helo->wheels . " Wheel soft touch landing gear.";
    echo "<br>" . "----Class Modifiers----" . "<br>";
    echo "Example: Private vs Public attributes/properties/vars" . "<br>";
    