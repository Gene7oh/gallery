<?php
require_once "new-config.php";

/* ↑↑ Safety precaution. Not always necessary but better safe than sorry ↑↑ */

class Database
{
    public $connect;

    function __construct()
    {
        $this->openDbConnect();
    }

    private function openDbConnect()
    {
        /*
        $this->connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
         if (mysqli_connect_errno()) {
             die("Connection Failed " . mysqli_error($this->connect));
         }*/
        $this->connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->connect->connect_errno) {
            die("Database Connection Failed" . $this->connect->connect_errno);
        }
    }

    public function query($sql)
    {
        /*$result = mysqli_query($this->connect, $sql);
        $this->confirmQuery($result);
        return $result;*/
        $result = $this->connect->query($sql);
        $this->confirmQuery($result);
        return $result;
    }

    private function confirmQuery($result)
    {
        if (!$result) {
            die("Query Failed <br>" . $this->connect->error);
        }
    }

    public function escapeString($string)
    {
//        return $escaped_string = mysqli_real_escape_string($this->connect, $string);
        return $escaped_string = $this->connect->real_escape_string($string);
    }

    public function theInsertId()
    {
        return $this->connect->insert_id;
    }
} /* ←← end class */

$database = new Database();