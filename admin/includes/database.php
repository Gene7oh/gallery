<?php
    /** @noinspection PhpMissingFieldTypeInspection */
    /** @noinspection PhpMultipleClassDeclarationsInspection */
    require_once("new-config.php");
    
    class Database {
        public $connect;
        
        function __construct() {
            $this->open_db_connection();
        }
        
        public function open_db_connection() {
            /*$this->connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);*/
            $this->connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if ($this->connect->connect_errno) {
                die("Connection Failed" . "<br>" . $this->connect->connect_errno);
            }
        }
        
        public function query($sql) {
            return $result = $this->connect->query($sql);
            $this->confirmQuery($result);
        }
        
        private function confirmQuery($result) {
            if (!$result) {
                echo "Query Failed" . "<br>" . $this->connect->error;
            }
            
        }
        
        
        public function escapeString($string) {
            $escaped_string = $this->connect->real_escape_string($string);
        }
    }
    
    $database = new Database();