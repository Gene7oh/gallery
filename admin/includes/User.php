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
        $result = $database->query($sql);
        $the_object_array = array();
        while ($row = mysqli_fetch_array($result)) {
            $the_object_array[] = self::instantiation($row);
        }
        return $the_object_array;
    }

    private static function instantiation($the_record)
    {
        $the_object = new self();
        /*$theObject->id       = $result['id'];
        $theObject->username = $result['username'];
        $theObject->fname    = $result['fname'];git
        $theObject->lname    = $result['lname'];*/
        foreach ($the_record as $the_attribute => $value) {
            if ($the_object->hasTheAttribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }
        return $the_object;
    }

    private function hasTheAttribute($the_attribute)
    {
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);
    }

    public static function verifyUser($username, $password)
    {
        global $database;
        $username = $database->escapeString($username);
        $password = $database->escapeString($password);
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'LIMIT 1";
        $result_array = self::findThisQuery($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function findById($id)
    {
        $result_array = self::findThisQuery("SELECT * FROM users WHERE id = $id LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
        /*if (!empty($result_array)) {
            return $result_array = array_shift($result_array);
        } else return false;*/
    }
} /** end class */