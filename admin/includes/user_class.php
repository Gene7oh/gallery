<?php
    
    class Users
    {
        public static function find_all_users()
        {
            global $database;
            return $result_set = $database->query("SELECT * FROM users");
        }
        
        public static function user_by_id($user_id)
        {
            global $database;
            $result_set = $database->query("SELECT * FROM users WHERE user_id =$user_id");
            return $found_user = mysqli_fetch_array($result_set);
        }
    }