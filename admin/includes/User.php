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
        $theObject->fname    = $result['fname'];
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

    public static function findById($id)
    {
        $result = self::findThisQuery("SELECT * FROM users WHERE id = $id LIMIT 1");
        if (!empty($result)){
           return $result_array = array_shift($result);
        } else return false;
    }
} /** end class */