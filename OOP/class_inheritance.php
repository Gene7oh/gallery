<?php
    
    class Cars
    {
        var $wheel_count = 4;
        var $door_count = 2;
        function car_details()
        {
            return "This vehicle has " . $this->wheel_count . " wheels, and " . $this->door_count . " Doors" . "<br>";
        }
        
    }
    $bmw = new Cars();
    echo $bmw->car_details();