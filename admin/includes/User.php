<?php
    
    /* call static methods with the self :: var inside another class method.
     * ↓↓ to use the db class we need to make the $database object global in each method ↓↓ */
    
    class User extends Db_object
    {
        protected static string $db_table        = "users";
        protected static array  $db_table_fields = array(
                'username',
                'user_fname',
                'user_lname',
                'user_password'
        );
        public int              $id              = 0;
        public string           $username        = "";
        public string           $user_fname      = "";
        public string           $user_lname      = "";
        public string           $user_password   = "";
        
        /* @noinspection PhpMissingReturnTypeInspection */
        
        public static function verifyUser($username, $password)
        {
            global $database;
            $username = $database->escapeString($username);
            $password = $database->escapeString($password);
            /* @noinspection SqlResolve */
            $sql          = "SELECT * FROM " . static::$db_table . " WHERE username = '{$username}' AND user_password = '{$password}' LIMIT 1";
            $result_array = User::findByQuery($sql);
            return !empty($result_array) ? array_shift($result_array) : false;
        }
        
        
    } /* end User class */