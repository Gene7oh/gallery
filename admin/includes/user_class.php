<?php
    
    class User
    {
        
        public static function all_users()
        {
            global $database;
            return $result_set = $database->query("SELECT * FROM users ");
        }
        
        public static function user_by_id($id)
        {
            global $database;
          $result = $database->query("SELECT * FROM users WHERE user_id = $id");
          return $found_user = mysqli_fetch_array($result);
        }
    }