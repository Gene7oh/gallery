<?php
    
    /** call static methods with the self::var inside another class method.
     * ↓↓ to use the db class we need to make the $database object global↓↓*/
    class User
    {
        public int    $user_id       = 0;
        public string $username      = "";
        public string $user_fname    = "";
        public string $user_lname    = "";
        public string $user_password = "";
        
        /** @noinspection PhpMissingReturnTypeInspection */
        public static function findAllUsers()
        {
            return self::findThisQuery("SELECT * FROM users");
        }
        
        /** @noinspection PhpMissingReturnTypeInspection */
        public static function findThisQuery($sql)
        {
            global $database;
            /** @noinspection PhpUnnecessaryLocalVariableInspection */
            $result           = $database->query($sql);
            $the_object_array = array();
            while ($row = mysqli_fetch_array($result)) {
                $the_object_array[] = self::instantiation($row);
            }
            return $the_object_array;
        }
    
        /** @noinspection PhpMissingReturnTypeInspection */
        private static function instantiation($the_record)
        {
            $the_object = new self();
            /*$the_object->user_id       = $found_user['user_id'];
            $the_object->username      = $found_user['username'];
            $the_object->user_fname    = $found_user['user_fname'];
            $the_object->user_lname    = $found_user['user_lname'];
            $the_object->user_password = $found_user['user_password'];*/
            foreach ($the_record as $the_attribute => $value) {
                if ($the_object->hasAttribute($the_attribute)) {
                    $the_object->$the_attribute = $value;
                }
            }
            return $the_object;
        }
        
        /** @noinspection PhpMissingReturnTypeInspection */
        
        private function hasAttribute($the_attribute)
        {
            $object_properties = get_object_vars($this);
            return array_key_exists($the_attribute, $object_properties);
        }
        
        /** @noinspection PhpMissingReturnTypeInspection */
        
        public static function verifyUser($username, $password)
        {
            global $database;
            $username = $database->escapeString($username);
            $password = $database->escapeString($password);
            $sql = "SELECT * FROM users WHERE username = $username AND user_password = $password LIMIT 1";
            $result_array = User::findThisQuery($sql);
            return !empty($result_array) ? array_shift($result_array) : die("<warning style='color:darkred'>User Not Found!</warning>");
        }
        
        /** @noinspection PhpMissingReturnTypeInspection */
        
        public static function findUserById($user_id)
        {
            $user_by_id_array = self::findThisQuery("SELECT * FROM users WHERE user_id = $user_id");
            return !empty($user_by_id_array) ? array_shift($user_by_id_array) : die("<warning style='color:darkred'>User Number $user_id Not Found!</warning>");
        }
        
    } /** end User class */