<?php
    
    /* personally I would have named it Gallery, but we will see why I'm probably wrong a little later */
    
    class Db_object
    {
        protected static string $db_table        = "users";
    
        /* @noinspection PhpMissingReturnTypeInspection */
        public static function findAll()
        {
            return static::findThisQuery("SELECT * FROM " . static::$db_table);
        }
        /* @noinspection PhpMissingReturnTypeInspection */
        /* @noinspection SqlResolve */
    
        /* @noinspection PhpMissingReturnTypeInspection */
    
        public static function findById($user_id)
        {
            /* @noinspection SqlResolve */
            $id_array = static::findThisQuery("SELECT * FROM " . static::$db_table . " WHERE id = $user_id");
            return !empty($id_array) ? array_shift($id_array) : false;
        }
    
        public static function findThisQuery($sql): array
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
    
    
        /* @noinspection PhpMissingReturnTypeInspection */
    
        private static function instantiation($the_record)
        {
            $got_called_class = get_called_class();
            $the_object = new $got_called_class();
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
    
        /* @noinspection PhpMissingReturnTypeInspection */
    
        private function hasAttribute($the_attribute)
        {
            $object_properties = get_object_vars($this);
            return array_key_exists($the_attribute, $object_properties);
        }
    
    }