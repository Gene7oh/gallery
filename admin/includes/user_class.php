<?php
    
    class User
    {
        /** @var int $id */
        public int $id;
        /** @var string $user_name */
        public string $user_name;
        /** @var string $password */
        public string $password;
        /** @var string $fname */
        public string $fname;
        /** @var string $lname */
        public string $lname;
        public static function all_users()
        {
            return self::exe_query("SELECT * FROM users");
        }
        
        public static function user_by_id($id)
        {
            $result = self::exe_query("SELECT * FROM users WHERE user_id = $id");
            return $found_user = mysqli_fetch_array($result);
        }
        
        public static function exe_query($sql)
        {
        global $database;
        return $result = $database->query($sql);
        }
    }