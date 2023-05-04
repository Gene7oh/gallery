<?php

class User
{
    public static function findAllUsers()
    {
        global $database;
        return $result = $database->query("SELECT * FROM users");
    }

    public static function findById($id)
    {
        global $database;
        $result = $database->query("SELECT * FROM users WHERE id = $id LIMIT 1");
        return mysqli_fetch_array($result);
    }
} /** end class */
