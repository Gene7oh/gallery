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
        static $color = "Blue with Gold trim" . "<br>";
        
        function truck_details()
        {
            return "This truck has " . $this->door_count . "doors and the color is " . $this::$color . "<br>";
        }
    }
    
    $bmw = new Cars();
    echo $bmw->car_details();
    echo "<br>" . "Thus begins the Static Modifier" . "<br>";
    echo Trucks::$color;
    $tundra = new Trucks();
    echo $tundra->truck_details();