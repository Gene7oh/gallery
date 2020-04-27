<?php
    
    class User
    {
        
        public function find_all_users()
        {
        global $database;
        return $result_set = $database->query("SELECT * FROM users ");
        }
    }