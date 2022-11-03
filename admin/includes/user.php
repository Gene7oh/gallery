<?php
    
    class User {
        public function findAllUsers() {
            global $database;
            /** @noinspection PhpUnnecessaryLocalVariableInspection */
            $result_set = $database->query("SELECT * FROM users");
            return $result_set;
        }
    } /** end User class */