<?php
    
    class Users
    {
        /** @lesson learned.
         * Class property had to match database
         * column name in order
         * for the instantiate function to assign
         * the value to the property.
         * TODO automate the class properties using the instantiate loop.
         */
        public $user_id;
        public $user_name;
        public $user_password;
        public $user_fname;
        public $user_lname;
        
        public static function find_all_users()
        {
            return self::find_this_query("SELECT * FROM users");
        }
        
        public static function user_by_id($user_id)
        {
            /** previous version of the method returned an array from here but now it is returned from instantiate method */
            /*$result_set = self::find_this_query("SELECT * FROM users WHERE user_id =$user_id");
            return $found_user = mysqli_fetch_array($result_set);*/
            $the_result_array = self::find_this_query("SELECT * FROM users WHERE user_id =$user_id");
            /*if (!empty($the_result_array)){
                return $first_item = array_shift($the_result_array);
            }else {
                return false;
            }*/
            return !empty($the_result_array) ? array_shift($the_result_array) : false;
        }
        
        public static function find_this_query($sql)
        {
            global $database;
            $result_set    = $database->query($sql);
            $the_obj_array = array();
            while ($row = mysqli_fetch_array($result_set)) {
                $the_obj_array[] = self::instantiate($row);
            }
            return $the_obj_array;
        }
        
        public static function instantiate($record)
        {
            $the_object = new self();
            /*$the_object->id        = $record['user_id'];
            $the_object->user_name = $record['user_name'];
            $the_object->password  = $record['user_password'];
            $the_object->fname     = $record['user_fname'];
            $the_object->lname     = $record['user_lname'];*/
            foreach ($record as $the_attribute => $value) {
                if ($the_object->has_the_attribute($the_attribute)) {
                    $the_object->$the_attribute = $value;
                }
            }
            return $the_object;
        }
        
        private function has_the_attribute($the_attribute)
        {
            $object_properties = get_object_vars($this);
            return array_key_exists($the_attribute, $object_properties);
        }
        
        public static function test_var()
        {
            var_dump(get_class_vars(self::class));
        }
    }