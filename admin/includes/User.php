<?php
    
    /* call static methods with the self :: var inside another class method.
     * ↓↓ to use the db class we need to make the $database object global in each method ↓↓ */
    
    class User extends Db_object
    {
        protected static array $db_table_fields = array(
                'username',
                'user_fname',
                'user_lname',
                'user_password'
        );
        public int             $id              = 0;
        public string          $username        = "";
        public string          $user_fname      = "";
        public string          $user_lname      = "";
        public string          $user_password   = "";
        
        /* @noinspection PhpMissingReturnTypeInspection */
        
        public static function verifyUser($username, $password)
        {
            global $database;
            $username = $database->escapeString($username);
            $password = $database->escapeString($password);
            /* @noinspection SqlResolve */
            $sql          = "SELECT * FROM " . static::$db_table . " WHERE username = '{$username}' AND user_password = '{$password}' LIMIT 1";
            $result_array = User::findThisQuery($sql);
            return !empty($result_array) ? array_shift($result_array) : false;
        }
        
        /* @noinspection PhpMissingReturnTypeInspection */
        public function save()
        {
//            return isset($this->user_id) ? $this->updateUser() : $this->createUser();
            if (isset($this->id)) {
                $this->update();
            } else {
                $this->create();
            }
        }
        
        /** @noinspection PhpMissingReturnTypeInspection */
        public function update()
        {
            global $database;
            $properties     = $this->cleanProperties();
            $property_pairs = array();
            foreach ($properties as $key => $value) {
                $property_pairs[] = " {$key}= '{$value}' ";
            }
            
            $sql = "UPDATE " . self::$db_table . " SET " . implode(",", $property_pairs) . " WHERE id = {$database->escapeString($this->id)}";
            $database->query($sql);
            if (mysqli_affected_rows($database->connect) == 1) {
                return true;
            } else {
                return false;
            }
            /* replaced update crud statement ↓↓ with
             * username= '{$database->escapeString($this->username)}', user_fname= '{$database->escapeString($this->user_fname)}', user_lname= '{$database->escapeString($this->user_lname)}', user_password= '{$database->escapeString($this->user_password)}'*/
        }
        /* @noinspection PhpMissingReturnTypeInspection */
        /* @noinspection SqlResolve */
        
        protected function cleanProperties()
        {
            global $database;
            $cleaned_properties = array();
            foreach ($this->properties() as $key => $value) {
                $cleaned_properties[$key] = $database->escapeString($value);
            }
            return $cleaned_properties;
        }
        
        /* @noinspection PhpMissingReturnTypeInspection */
        
        protected function properties()
        {
            $properties = array();
            foreach (self::$db_table_fields as $db_field) {
                if (property_exists($this, $db_field)) {
                    $properties[$db_field] = $this->$db_field;
                }
                /*
                 *
                 * Warning:  Undefined property: User::$db_field in Z:\xampp\htdocs\Projects\gallery\admin\includes\User.php on line 136
                 * ↑↑ the dollar sign needed in the $this->$db_field assigned to the array key.
                 * User has been successfully created
                 */
            }
            return $properties;
        }
        
        /* @noinspection PhpMissingReturnTypeInspection */
        
        public function create()
        {
            global $database;
            $properties = $this->cleanProperties();
            $sql        = "INSERT INTO " . self::$db_table . "(" . implode(",", array_keys($properties)) . ")";
            $sql        .= "VALUES ('" . implode("','", array_values($properties)) . "')";
            if ($database->query($sql)) {
                $this->id = $database->TheInsertId();
                return true;
            } else {
                return false;
            }
            /* VALUES ('{$database->escapeString($this->username)}','{$database->escapeString($this->user_fname)}', '{$database->escapeString($this->user_lname)}', '{$database->escapeString($this->user_password)}')"
             * $sql .= "VALUES ('";
             * $sql .= $database->escapeString($this->username) . "','";
             * $sql .= $database->escapeString($this->user_fname) . "' , '";
             * $sql .= $database->escapeString($this->user_lname) . "' ,'";
             * $sql .= $database->escapeString($this->user_password) . "')"; */
        }
        
        /* @noinspection PhpUnused */
        public function delete(): bool
        {
            global $database;
            /* @noinspection SqlResolve */
            $sql = "DELETE  FROM " . self::$db_table . " WHERE id = '{$database->escapeString($this->id)}'";
            $database->query($sql);
            if (mysqli_affected_rows($database->connect) == 1) {
                return true;
            } else {
                return false;
            }
        }
        
    } /* end User class */