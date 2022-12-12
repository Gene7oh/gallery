<?php
    
    /** call static methods with the self::var inside another class method.
     * ↓↓ to use the db class we need to make the $database object global↓↓*/
    class User
    {
        protected static array     $db_table_fields = array(
                'username',
                'user_fname',
                'user_lname',
                'user_password'
        );
        protected static string $db_table        = "users";
        public int              $user_id         = 0;
        public string           $username        = "";
        public string           $user_fname      = "";
        public string           $user_lname      = "";
        public string           $user_password   = "";
        
        /** @noinspection PhpMissingReturnTypeInspection */
        public static function findAllUsers()
        {
            return self::findThisQuery("SELECT * FROM " . self::$db_table);
        }  /* end findalluser method */
        
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
        }  /* end findthisquery method */
        
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
        }  /* end instantiation method */
        
        /** @noinspection PhpMissingReturnTypeInspection */
        private function hasAttribute($the_attribute)
        {
            $object_properties = get_object_vars($this);
            return array_key_exists($the_attribute, $object_properties);
        }  /* end hastheattribute method */
        
        /** @noinspection PhpMissingReturnTypeInspection */
        public static function verifyUser($username, $password)
        {
            global $database;
            $username = $database->escapeString($username);
            $password = $database->escapeString($password);
            /** @noinspection SqlResolve */
            $sql          = "SELECT * FROM " . self::$db_table . " WHERE username = '{$username}' AND user_password = '{$password}' LIMIT 1";
            $result_array = User::findThisQuery($sql);
            return !empty($result_array) ? array_shift($result_array) : false;
        }  /* end verifyuser method */
        
        /** @noinspection PhpMissingReturnTypeInspection */
        public static function findUserById($user_id)
        {
            /** @noinspection SqlResolve */
            $user_by_id_array = self::findThisQuery("SELECT * FROM " . self::$db_table . " WHERE user_id = $user_id");
            return !empty($user_by_id_array) ? array_shift($user_by_id_array) : false;
        } /* end findbyuserID method */
        
        /** @noinspection PhpMissingReturnTypeInspection */
        public function save()
        {
//            return isset($this->user_id) ? $this->updateUser() : $this->createUser();
            if (isset($this->user_id)) {
                $this->update();
            } else {
                $this->create();
            }
        }   /* end the save method*/
        
        /** @noinspection PhpMissingReturnTypeInspection */
        
        public function update()
        {
            global $database;
            $sql = "UPDATE " . self::$db_table . " SET username = '{$database->escapeString($this->username)}', user_fname = '{$database->escapeString($this->user_fname)}', user_lname = '{$database->escapeString($this->user_lname)}', user_password = '{$database->escapeString($this->user_password)}' WHERE user_id = {$database->escapeString($this->user_id)}";
            $database->query($sql);
            if (mysqli_affected_rows($database->connect) == 1) {
                return true;
            } else {
                return false;
            }
        } /* end createUser method */
        
        /** @noinspection PhpMissingReturnTypeInspection */
        public function create()
            /** @noinspection SqlResolve */
        {
            global $database;
            $properties = $this->properties();
            $sql        = "INSERT INTO " . self::$db_table . "(" . implode(",", array_keys($properties)) . ")";
            $sql        .= "VALUES ('" . implode("','", array_values($properties)) . "')";
            if ($database->query($sql)) {
                $this->user_id = $database->TheInsertId();
                return true;
            } else {
                return false;
            }
            /** VALUES ('{$database->escapeString($this->username)}','{$database->escapeString($this->user_fname)}', '{$database->escapeString($this->user_lname)}', '{$database->escapeString($this->user_password)}')"
             * $sql .= "VALUES ('";
             * $sql .= $database->escapeString($this->username) . "','";
             * $sql .= $database->escapeString($this->user_fname) . "' , '";
             * $sql .= $database->escapeString($this->user_lname) . "' ,'";
             * $sql .= $database->escapeString($this->user_password) . "')"; */
        }  /* end properties function*/
        /** @noinspection PhpMissingReturnTypeInspection */
        
        protected function properties()
        {
            $properties = array();
            foreach (self::$db_table_fields as $db_field) {
                if (property_exists($this, $db_field)) {
                    $properties[$db_field] = $this->$db_field;
                }
                /**
                 * Warning:  Undefined property: User::$db_field in Z:\xampp\htdocs\Projects\gallery\admin\includes\User.php on line 136
                 * ↑↑ the dollar sign needed in the $this->$db_field assigned to the array key.
                 * User has been successfully created
                 */
            }
            return $properties;
        }  /* end updateUser method */
        
        /** @noinspection PhpMissingReturnTypeInspection */
        
        public function delete()
        {
            global $database;
            /** @noinspection SqlResolve */
            $sql = "DELETE  FROM " . self::$db_table . " WHERE user_id = '{$database->escapeString($this->user_id)}'";
            $database->query($sql);
            if (mysqli_affected_rows($database->connect) == 1) {
                return true;
            } else {
                return false;
            }
        }    /*end delete user method*/
    } /** end User class */