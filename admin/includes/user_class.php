<?php
    
    class User
    {
        /** @var int $id */
        public int $id;
        /** @var string $user_name */
        public string $user_name;
        /** @var string $password */
        public string $password;
        /** @var string $fname */
        public string $fname;
        /** @var string $lname */
        public string $lname;
    
        public static function exe_query($sql)
        {
            global $database;
            $result = $database->query($sql);
            $obj_array = array();
            while ($row = mysqli_fetch_array($result)){
                $obj_array[] = self::instantiate($result);
            }
            return $obj_array;
        }
    
        public static function instantiate($result)
        {
            $result_obj = new self;
            /*$result_obj->id        = $result['user_id'];
            $result_obj->user_name = $result['user_name'];
            $result_obj->fname     = $result['user_fname'];
            $result_obj->lname     = $result['user_lname'];
            $result_obj->password  = $result['user_password'];*/
            foreach ($result as $the_attribute => $value) {
                if ($result_obj->has_attribute($the_attribute)) {
                    $result_obj->$the_attribute = $value;
                }
            }
            return $result_obj;
        }
    
        private function has_attribute($the_attribute)
        {
        $obj_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $obj_properties);
        }
    
        public static function all_users()
        {
            return self::exe_query("SELECT * FROM users");
        }
    
        public static function user_by_id($id)
        {
            $result = self::exe_query("SELECT * FROM users WHERE user_id = $id");
            return $found_user = mysqli_fetch_array($result);
        }
    }