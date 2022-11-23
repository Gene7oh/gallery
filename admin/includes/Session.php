<?php
    
    class Session
    {
        public int   $user_id;
        private bool $signed_in = false;
        
        function __construct()
        {
            session_start();
            $this->checkLogin();
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
        
        public function isSignedIn()
        {
            // method fetches private var is a getter method
            return $this->signed_in;
        }
        
        public function login($user)
        {
            if ($user) {
                /** @noinspection PhpUndefinedVariableInspection */
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
    } /* end the session class */
    $session = new Session();