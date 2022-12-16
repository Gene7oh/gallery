<?php
    
    /** call static methods with the self :: var inside another class method.
     * ↓↓ to use the db class we need to make the $database object global↓↓ */
    class User
    {
        protected static array  $db_table_fields = array(
                'username',
                'user_fname',
                'user_lname',
                'user_password'
        );
        protected static string $db_table        = "users";
        public int              $id              = 0;
        public string           $username        = "";
        public string           $user_fname      = "";
        public string           $user_lname      = "";
        public string           $user_password   = "";
        
        /** @noinspection PhpMissingReturnTypeInspection */
        public static function findAll()
        {
            return self::findThisQuery("SELECT * FROM " . self::$db_table);
        }
        /** @noinspection PhpMissingReturnTypeInspection */
        /** @noinspection SqlResolve */
        
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
            foreach ($the_record as $the_attribute => $value) {
                if ($the_object->hasAttribute($the_attribute)) {
                    $the_object->$the_attribute = $value;
                }
                /*
                 * $the_object->user_id       = $found_user['user_id'];
                $the_object->username      = $found_user['username'];
                $the_object->user_fname    = $found_user['user_fname'];
                $the_object->user_lname    = $found_user['user_lname'];
                $the_object->user_password = $found_user['user_password'];*/
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
        
        public static function findById($user_id)
        {
            /** @noinspection SqlResolve */
            $id_array = self::findThisQuery("SELECT * FROM " . self::$db_table . " WHERE id = $user_id");
            return !empty($id_array) ? array_shift($id_array) : false;
        }
        
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
        }
        
        /** @noinspection PhpMissingReturnTypeInspection */
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
        /** @noinspection PhpMissingReturnTypeInspection */
        /** @noinspection SqlResolve */
        
        protected function cleanProperties()
        {
            global $database;
            $cleaned_properties = array();
            foreach ($this->properties() as $key => $value) {
                $cleaned_properties[$key] = $database->escapeString($value);
            }
            return $cleaned_properties;
        }
        
        /** @noinspection PhpMissingReturnTypeInspection */
        
        protected function properties()
        {
            $properties = array();
            foreach (self::$db_table_fields as $db_field) {
                if (property_exists($this, $db_field)) {
                    $properties[$db_field] = $this->$db_field;
                }
                /**
                 *
                 * Warning:  Undefined property: User::$db_field in Z:\xampp\htdocs\Projects\gallery\admin\includes\User.php on line 136
                 * ↑↑ the dollar sign needed in the $this->$db_field assigned to the array key.
                 * User has been successfully created
                 */
            }
            return $properties;
        }
        
        /** @noinspection PhpMissingReturnTypeInspection */
        
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
            /** VALUES ('{$database->escapeString($this->username)}','{$database->escapeString($this->user_fname)}', '{$database->escapeString($this->user_lname)}', '{$database->escapeString($this->user_password)}')"
             * $sql .= "VALUES ('";
             * $sql .= $database->escapeString($this->username) . "','";
             * $sql .= $database->escapeString($this->user_fname) . "' , '";
             * $sql .= $database->escapeString($this->user_lname) . "' ,'";
             * $sql .= $database->escapeString($this->user_password) . "')"; */
        }
        
        public function delete(): bool
        {
            global $database;
            /** @noinspection SqlResolve */
            $sql = "DELETE  FROM " . self::$db_table . " WHERE id = '{$database->escapeString($this->id)}'";
            $database->query($sql);
            if (mysqli_affected_rows($database->connect) == 1) {
                return true;
            } else {
                return false;
            }
        }
        
    } /** end User class */