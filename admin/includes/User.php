<?php

class User
{
    public $id;
    public $username;
    public $fname;
    public $lname;
    public $password;

    public static function findAllUsers()
    {
        return self::findThisQuery("SELECT * FROM users");
    }

    private static function findThisQuery($sql)
    {
        global $database;
        return $result = $database->query($sql);
    }

    public static function findById($id)
    {
        $result = self::findThisQuery("SELECT * FROM users WHERE id = $id LIMIT 1");
        return mysqli_fetch_array($result);
    }

    public static function instantiation($theRecord)
    {
        /*$theObject           = new self();
        $theObject->id       = $result['id'];
        $theObject->username = $result['username'];
        $theObject->fname    = $result['fname'];
        $theObject->lname    = $result['lname'];*/

        return $theObject;
    }
} /** end class */