<?php
    require_once "config.php";
    
    class Database
    {
        public $connect; /** original diaz var was private phpstorm thru a fit and edwin from the future makes it public which is one of the options phpstorm offered Cool right */
        function __construct()
        {
            $this->connect_db();
        }
    
        public function connect_db()
        {
            $this->connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            if (mysqli_connect_errno()) {
                echo "Database Connection Failed " . mysqli_error();
            }
        }
    }
    
    $database = new Database();