<?php
    
    echo "Start getters and setters " . "<br>";
    echo "______-------------______" . "<br>";
    
    class Cars
    {
        private int $doors = 4;
        
        function get_values()
        {
            return $this->doors . "<br>";
        }
        
        function set_values()
        {
            $this->doors = 10;
        }
    }
    
    $bmw = new Cars();
    echo $bmw->set_values();
    echo $bmw->get_values();
    echo "<br>" . " New line";
echo "<br>" . "Another new line after reset";