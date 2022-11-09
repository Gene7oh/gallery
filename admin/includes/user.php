<?php
    // ↓↓ to use the db class we need to make the $database object global↓↓
    /** @noinspection PhpUnused */
    /** @noinspection PhpUnnecessaryLocalVariableInspection */
    class User {
        public int $user_id;
        public string $username;
        public string $user_fname;
        public string $user_lname;
        public string $user_password;
        public static function findAllUsers() {
//            global $database;
//            $result_set = $database->query("SELECT * FROM users");
            $result_set = self::findThisQuery("Select * FROM users");
            return $result_set;
        }
    
        public static function findUserById($user_id){
//            global $database;
//            $result     = $database->query("SELECT * FROM users WHERE user_id = $user_id");
            $result = self::findThisQuery("SELECT * FROM users WHERE user_id = $user_id");
            $found_user = mysqli_fetch_array($result);
            return $found_user;
        }
        public static function findThisQuery($sql){
            global $database;
            $result = $database->query($sql);
            return $result;
        }
    } /** end User class */