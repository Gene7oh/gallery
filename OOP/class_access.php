<?php
    
    class Cars
    {
        var $wheel_count = 4;
        var $door_count = 2;
        
        function car_details()
        {
        return "Vehicle has " . $this->door_count . " doors and " . $this->wheel_count . " Wheels";
        }
    }
    
    $bmw = new Cars();
    echo $bmw->car_details();