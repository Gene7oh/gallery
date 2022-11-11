<?php
    
    // ↓↓ to use the db class we need to make the $database object global↓↓
    class User {
        /** @noinspection PhpUnnecessaryLocalVariableInspection */
        public static function findAllUsers() {
            global $database;
            $result = $database->query("SELECT * FROM users");
            return $result;
        }
    
        /** @noinspection PhpUnnecessaryLocalVariableInspection */
        public static function findUserById($user_id){
            global $database;
            $result = $database->query("SELECT * FROM users WHERE user_id = $user_id");
            $find_user = mysqli_fetch_array($result);
            return $find_user;
        }
    } /** end User class */