<?php
    require_once "config.php";
    
    class Database
    {
        public $connect;
        
        /** original diaz var was private phpstorm thru a fit and edwin from the future makes it public which is one of the options phpstorm offered Cool right */
        function __construct()
        {
            $this->connect_db();
        }
        
        public function connect_db()
        {
            /*$this->connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);*/
            $this->connect = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            if ($this->connect->errno) {
                echo "Database Connection Failed " . $this->connect->connect_errno;
            }
        }
        
        public function query($sql)
        {
            return $result = mysqli_query($this->connect, $sql);
            $this->confirm_query($result);
        }
        
        private function confirm_query($result)
        {
            if (!$result) {
                echo "Query Failed " . mysqli_error($this->connect);
            }
        }
        
        public function escape_string($string)
        {
            return $escaped_string = mysqli_real_escape_string($this->connect, $string);
        }
    }
    
    /* INSTANTIATE DATABASE CONNECTION */
    $database = new Database();