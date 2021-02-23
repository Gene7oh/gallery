<?php
    
    class Cars
    {
        public $wheel_count = 4;
        private $door_count = 2;
        protected $engine_size = 400 . " CU ";
        
        function car_details()
        {
            return "Vehicle has " . $this->door_count . " doors and " . $this->wheel_count . " Chrome Wheels, sporting a " . $this->engine_size . " engine.";
        }
    }
    
    class Trucks extends Cars
    {
        private $door_count = 4;
        
        function truck_details()
        {
            return "This truck has " . $this->door_count . " doors" . "<br>";
        }
    }
    
    $bmw = new Cars();
    echo $bmw->car_details();
    $silverado = new Trucks();
    echo "<br>" . $silverado->wheel_count = 6;
    echo $silverado->truck_details();
    echo "<br>";
    echo $silverado->car_details();