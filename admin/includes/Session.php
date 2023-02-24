<?php
    
    class Session
    {
        public int    $id;
        public string $message;
        public int    $count;
        private bool  $signed_in = false;
        
        function __construct()
        {
            session_start();
            $this->visitorCount();
            $this->checkLogin();
            $this->checkMessage();
        }
        
        public function visitorCount()
        {
            if (isset($_SESSION['count'])) {
                return $this->count = $_SESSION['count']++;
            } else {
                return $_SESSION['count'] = 1;
            }
        }
        public function resetCount(): int
        {
            return $this->count = $_SESSION['count'] = 0;
        }
        private function checkLogin()
        {
            if (isset($_SESSION['id'])) {
                $this->id        = $_SESSION['id'];
                $this->signed_in = true;
            } else {
                unset($this->id);
                $this->signed_in = false;
            }
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
        
        public function message($msg = "")
        {
            if (!empty($msg)) {
                $_SESSION['message'] = $msg;
            } else {
                return $this->message;
            }
        }
        
        public function isSignedIn(): bool
        {
            // method fetches private var is a getter method
            return $this->signed_in;
        }
        
        public function login($user)
        {
            if ($user) {
                $this->id        = $_SESSION['id'] = $user->id;
                $this->signed_in = true;
            }
        }
        
        public function logout()
        {
            unset($this->id);
            unset($_SESSION['id']);
            $this->signed_in = false;
        }
        
    } /*←← end the session class */
    $session = new Session();