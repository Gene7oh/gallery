<?php
    
    class Session
    {
        public int    $user_id;
        public string $message;
        private bool  $signed_in = false;
        
        function __construct()
        {
            session_start();
            $this->checkLogin();
            $this->checkMessage();
        }
        
        private function checkLogin()
        {
            if (isset($_SESSION['user_id'])) {
                $this->user_id   = $_SESSION['user_id'];
                $this->signed_in = true;
            } else {
                unset($this->user_id);
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
        
        public function isSignedIn()
        {
            // method fetches private var is a getter method
            return $this->signed_in;
        }
        
        public function login($user)
        {
            if ($user) {
                $this->user_id   = $_SESSION['user_id'] = $user->user_id;
                $this->signed_in = true;
            }
        }
    
        public function logout()
        {
            unset($this->user_id);
            unset($_SESSION['user_id']);
            $this->signed_in = false;
        }
        
    } /*←← end the session class */
    $session = new Session();