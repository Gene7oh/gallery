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
        // TODO fix search in the settings menu, the fix, invalidate caches and restart.
        // variables used inside the method are called using the $this pseudo(??) var. IE $this->engine. No need for the $ for the already declared var.
        
        function planeDetail(): mixed
            // ↑↑ the (): var type (mixed) stops an error nag.
        {
            return "This Plane is made by " . $this->make . ", and has " . $this->wings . " wings, counting the tail ." . "<br>" .
                "The engine is made by " . $this->engine . " and sports " . $this->wheels . " !";
        }
    }
    
    $f4 = new Planes();
    echo $f4->wings . "<br>";
    echo $f4->planeDetail();
    echo "<br>" . "adjust wheel count outside the method using the f 4 var -> wheels = 20. then recall the method using the ec ho f 4-> planeDetail" . "<br>";
    $f4->wheels = 20;
    echo $f4->planeDetail();
    echo "<br>";
    
    class Helo extends Planes
    {
        var int $blade_count = 8;
        var int $seat_count  = 12;
        
        function heloDetails(): mixed
        {
            return "This model Helicopter has " . $this->blade_count . " blades, including the rear stabilizer." . "<br>" . "The cabin is the roomy " . $this->seat_count . " seat luxury version";
        }
    }
    
    echo "<br>" . "----Access Control Modifiers----" . "<br>";
    echo "Example: Private vs Public attributes/properties/vars" . "<br>";
    $helo = new Helo();
    echo $helo->heloDetails() . " . With the " . $helo->wheels . " Wheel soft touch landing gear.";
    echo "<br>" . "------------Static Modifiers--------------" . "<br>";
    echo "Difference between Static Property or method/function and conventional method or property is the Static does not require an instance, just a call, using $ var = Class::Property. When calling a method the var do not use ($ this) keyword but rather the class :: format with the $ like normal $ vars " .
        "<br>" .
        "The static keyword must be used to declare the var" .
        "<br>";
    
    class Bugs
    {
        static string $termites = "<br>" . "wood eaters" . "<br>";
        static string $ants     = "<br>" . "wood and termite eaters" . "<br>";
        static string $anteater = "solution";
        
        static function bugRant()
        {
            return "Often, Termites aka " . Bugs::$termites . " will infest the structure. On occasion the property owner will think using ants as a deterrent is a good idea because they are " . Bugs::$ants . ", however they still eat wood, therefor the only way to eliminate the threat is to employ an anteater as the " . Bugs::$anteater . "<br>" ;
            
        }
    }
    echo "Calling static var out of the class <br>";
    echo Bugs::$anteater . "<br>";
    echo "Calling the method out of the class <br>";
    echo Bugs::bugRant() . "<br>";