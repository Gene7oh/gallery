<?php
//    echo "The Class Definitions";
    
    class Cars
    {
        static $wheel_count = 4;
        static $door_count = 4;
        static $body_color = "Blue";
        static $body_type = "Sedan";
        
        static function car_details()
        {
            echo "This vehicle is a " . Cars::$body_color . Cars::$body_type . " With " . Cars::$door_count . "Doors";
        }
    }
    
    Cars::car_details();