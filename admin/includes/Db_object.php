<?php
    
    /* personally I would have named it Gallery, but we will see why I'm probably wrong a little later */
    
    class Db_object
    {
        
        
        /* @noinspection PhpMissingReturnTypeInspection */
        public static function findAll()
        {
            return static::findByQuery("SELECT * FROM " . static::$db_table);
        }
        
        
        public static function findByQuery($sql): array
        {
            global $database;
            /* @noinspection PhpUnnecessaryLocalVariableInspection */
            $result           = $database->query($sql);
            $the_object_array = array();
            while ($row = mysqli_fetch_array($result)) {
                $the_object_array[] = static::instantiation($row);
            }
            return $the_object_array;
        }
        
        private static function instantiation($the_record)
        {
            $got_called_class = get_called_class();
            $the_object       = new $got_called_class();
            foreach ($the_record as $the_attribute => $value) {
                if ($the_object->hasAttribute($the_attribute)) {
                    $the_object->$the_attribute = $value;
                }
                /*
                 * $the_object->id       = $found_user['id'];
                $the_object->username      = $found_user['username'];
                $the_object->user_fname    = $found_user['user_fname'];
                $the_object->user_lname    = $found_user['user_lname'];
                $the_object->user_password = $found_user['user_password'];*/
            }
            return $the_object;
        }
        
        
        private function hasAttribute($the_attribute)
        {
            $object_properties = get_object_vars($this);
            return array_key_exists($the_attribute, $object_properties);
        }
        
        
        public static function findById($id)
        {
            /* @noinspection SqlResolve */
            $id_array = static::findByQuery("SELECT * FROM " . static::$db_table . " WHERE id = $id");
            return !empty($id_array) ? array_shift($id_array) : false;
        }
        
        
        public function save()
        {
//            return isset($this->id) ? $this->updateUser() : $this->createUser();
            if (isset($this->id)) {
                $this->update();
            } else {
                $this->create();
            }
        }
        
        public function update(): bool
        {
            global $database;
            $properties     = $this->cleanProperties();
            $property_pairs = array();
            foreach ($properties as $key => $value) {
                $property_pairs[] = " {$key}= '{$value}' ";
            }
    
            /** @noinspection PhpUndefinedFieldInspection */
            $sql = "UPDATE " . static::$db_table . " SET " . implode(",", $property_pairs) . " WHERE id = {$database->escapeString($this->id)}";
            $database->query($sql);
            if (mysqli_affected_rows($database->connect) == 1) {
                return true;
            } else {
                return false;
            }
            /* replaced update crud statement ↓↓ with
             * username= '{$database->escapeString($this->username)}', user_fname= '{$database->escapeString($this->user_fname)}', user_lname= '{$database->escapeString($this->user_lname)}', user_password= '{$database->escapeString($this->user_password)}'*/
        }
        
        
        protected function cleanProperties(): array
        {
            global $database;
            $cleaned_properties = array();
            foreach ($this->properties() as $key => $value) {
                $cleaned_properties[$key] = $database->escapeString($value);
            }
            return $cleaned_properties;
        }
        
        
        protected function properties(): array
        {
            $properties = array();
            foreach (static::$db_table_fields as $db_field) {
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
        
        public function create(): bool
        {
            global $database;
            $properties = $this->cleanProperties();
            $sql        = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")";
            $sql        .= "VALUES ('" . implode("','", array_values($properties)) . "')";
            if ($database->query($sql)) {
               /* id is created dynamically in the child class which is why there is an error showing in the editor */
                /** @noinspection PhpDynamicFieldDeclarationInspection */
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
        
        public function delete(): bool
        {
            global $database;
            /* @noinspection SqlResolve */
            /** @noinspection PhpUndefinedFieldInspection */
            $sql = "DELETE  FROM " . static::$db_table . " WHERE id = '{$database->escapeString($this->id)}'";
            $database->query($sql);
            if (mysqli_affected_rows($database->connect) == 1) {
                return true;
            } else {
                return false;
            }
        }
    }  /* end of class */