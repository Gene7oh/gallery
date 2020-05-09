<?php
    
    class Users
    {
        public $id;
        public $user_name;
        public $password;
        public $fname;
        public $lname;
        
        public static function find_all_users()
        {
            return self::find_this_query("SELECT * FROM users");
        }
        
        public static function user_by_id($user_id)
        {
            $result_set = self::find_this_query("SELECT * FROM users WHERE user_id =$user_id");
            return $found_user = mysqli_fetch_array($result_set);
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