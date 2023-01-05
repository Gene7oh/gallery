<?php
    /** @noinspection PhpMissingFieldTypeInspection */
    /** @noinspection PhpMultipleClassDeclarationsInspection */
    require_once("new-config.php");
    
    class Database
    {
        public $connect;
        
        function __construct()
        {
            $this->open_db_connection();
        }
        
        public function open_db_connection()
        {
            $this->connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if ($this->connect->connect_errno) {
                die("Connection Failed" . "<br>" . $this->connect->connect_errno);
            }
        }
        
        public function query($sql)
        {
            $result = $this->connect->query($sql);
            $this->confirmQuery($result);
            return $result;
        }
        
        private function confirmQuery($result)
        {
            if (!$result) {
                echo "Query Failed" . "<br>" . $this->connect->error;
            }
        }
        
        /** @noinspection PhpUnused
         * @noinspection PhpUnusedLocalVariableInspection
         */
        public function escapeString($string)
        {
            return $escaped_string = $this->connect->real_escape_string($string);
            
        }
        
        /** @noinspection PhpUnused */
        public function TheInsertId()
        {
            return mysqli_insert_id($this->connect);
        }
        
    } /*end Database Class */
    
    $database = new Database();