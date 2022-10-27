<?php
    /** @noinspection PhpMultipleClassDeclarationsInspection */
    require_once "config_db.php";
    class Database
    {
       public mysqli $connect;
        function __construct()
        {
            $this->open_db_connection();
        }
        
        public function open_db_connection()
        {
            $this->connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (mysqli_connect_errno()) {
                die("Connection to Database Failed " . mysqli_error($this->connect));
            } else echo "connected";
        }
    }  /* end database class */
    
    $connect_db = new Database();
    // move the connection to a construct for always on connection to Db
    /*$db_connect->open_db_connection();*/