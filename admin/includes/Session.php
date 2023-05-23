<?php

class Session
{
    public int $user_id;
    private bool $signed_in = false;

    function __construct()
    {
        session_start();
        $this->checkLogIn();
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

    public function isSignedIn()
    {
        // function is a getter
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
}

/** end class */
$session = new Session();