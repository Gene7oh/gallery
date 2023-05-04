<?php

class User
{
    public static function findAllUsers()
    {
        return self::findThisQuery("SELECT * FROM users");
    }

    public static function findById($id)
    {
        $result = self::findThisQuery("SELECT * FROM users WHERE id = $id LIMIT 1");
        return mysqli_fetch_array($result);
    }

    private static function findThisQuery($sql)
    {
        global $database;
        return $result = $database->query($sql);
    }
} /** end class */