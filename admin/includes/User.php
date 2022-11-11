<?php
    
    // ↓↓ to use the db class we need to make the $database object global↓↓
    class User {
        /** @noinspection PhpUnnecessaryLocalVariableInspection */
        public static function findAllUsers() {
            $result = self::createQuery("SELECT * FROM users");
            while ($row = mysqli_fetch_array($result)) {
                echo $row['user_id'] . "<br>" . $row['username'] . "<br>";
            }
        }
        
        /** @noinspection PhpUnnecessaryLocalVariableInspection */
        private static function createQuery($sql) {
            global $database;
            return $database->query($sql);
        }
        
        /** @noinspection PhpUnnecessaryLocalVariableInspection */
        public static function findUserById($user_id) {
            $result     = self::createQuery("SELECT * FROM users WHERE user_id = $user_id");
            $user_found = mysqli_fetch_array($result);
            return $user_found;
        }
    } /** end User class */