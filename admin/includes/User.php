<?php
    
    /** call static methods with the self::var inside another class method.
     * ↓↓ to use the db class we need to make the $database object global↓↓*/
    class User
    {
        public static function findAllUsers()
        {
            global $database;
            /** @noinspection PhpUnnecessaryLocalVariableInspection */
            $result = $database->query("SELECT * FROM users");
            return $result;
        }
        
        public static function findUserById($user_id)
        {
            global $database;
            /**@noinspection PhpUnnecessaryLocalVariableInspection */
            $result= $database->query("SELECT * FROM users WHERE user_id = $user_id");
            /** @noinspection PhpUnnecessaryLocalVariableInspection */
            $user_found = mysqli_fetch_array($result);
            return $user_found;
        }
    } /** end User class */