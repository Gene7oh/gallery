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
        
        public static function instantiate($result)
        {
            $obj_result            = new self();
            $obj_result->id        = $result['user_id'];
            $obj_result->user_name = $result['user_name'];
            $obj_result->fname     = $result['user_fname'];
            $obj_result->lname     = $result['user_lname'];
            $obj_result->password  = $result['user_password'];
            return $obj_result;
        }
        
        public static function exe_query($sql)
        {
            global $database;
            return $result = $database->query($sql);
        }
        
        public static function all_users()
        {
            return self::exe_query("SELECT * FROM users");
        }
        
        public static function user_by_id($id)
        {
            $result = self::exe_query("SELECT * FROM users WHERE user_id = $id");
            return $found_user = mysqli_fetch_array($result);
        }
    }