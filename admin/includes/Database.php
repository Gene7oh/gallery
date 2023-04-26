<?php

namespace gallery;
require_once "new-config.php";

class Database
{
    public $connect;
    function __construct(){
        $this->openDbConnect();
    }

    public function openDbConnect()
    {
        $this->connect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if (mysqli_connect_errno()){
            die("Connection Failed". mysqli_error());
        }
    }
}
$database = new Database();
