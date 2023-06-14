<?php

class Session
{
    public int $user_id;
    public string $message;
    private bool $signed_in = false;

    function __construct()
    {
        session_start();
        $this->checkLogIn();
        $this->checkMessage();
    }

    private function checkLogIn()
    {
        if (isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;
        } else {
            unset($this->user_id);
            $this->signed_in = false;
        }
    }

    public function message($msg = "")
    {
        if (!empty($msg)) {
            $_SESSION['message'] = $msg;
        } else {
            return $this->message();
        }
    }

    public function isSignedIn(): bool
    {
        // function is a getter to access the private class property $signed_in
        return $this->signed_in;
    }

    public function logIn($user)
    {
        if ($user) {
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in = true;
        }
    }

    public function logOut($user)
    {
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
    }

    private function checkMessage()
    {
        if (isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }
}

/** end class */
$session = new Session();