<?php

class User
{
    public function findAllUsers()
    {
        global $database;
        return $result = $database->query("SELECT * FROM users");
    }
}