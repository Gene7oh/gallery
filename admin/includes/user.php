<?php
    /** @noinspection PhpUndefinedVariableInspection */
    // ↓↓ to use the db class we need to make the $database object global↓↓
    /** @noinspection PhpUnused */
    
    /** @noinspection PhpUnnecessaryLocalVariableInspection */
    
    class User {
        public int $user_id;
        public string $username;
        public string $user_fname;
        public string $user_lname;
        public string $user_password;
        
        
        /** @noinspection PhpUndefinedFieldInspection */
        public static function autoInstance($fetched_records): User {
            $auto_instance = new self;
            /*$auto_instance->user_id    = $user_found['user_id'];
            $auto_instance->username   = $user_found['username'];
            $auto_instance->user_fname = $user_found['user_fname'];
            $auto_instance->user_lname = $user_found['user_lname'];*/
            /* for the love of Jesus please to remember to return the results or objects ↓↓*/
            foreach ($fetched_records as $records => $value) {
                if ($auto_instance->instanceHasRecords($records)) {
                    $auto_instance->records = $value;
                }
            }
            return $auto_instance;
        }
        
        /** @noinspection PhpMissingReturnTypeInspection */
        private function instanceHasRecords($records) {
            $object_vars = get_object_vars($this);
            return array_key_exists($records, $object_vars);
        }
        
        public static function findAllUsers() {
//            global $database;
//            $result_set = $database->query("SELECT * FROM users");
            $result_set = self::findThisQuery("Select * FROM users");
            return $result_set;
        }
        
        public static function findThisQuery($sql) {
            global $database;
            $result = $database->query($sql);
            return $result;
        }
        
        public static function findUserById($user_id) {
//            global $database;
//            $result     = $database->query("SELECT * FROM users WHERE user_id = $user_id");
            $result     = self::findThisQuery("SELECT * FROM users WHERE user_id = $user_id");
            $found_user = mysqli_fetch_array($result);
            return $found_user;
        }
        
    } /** end User class */