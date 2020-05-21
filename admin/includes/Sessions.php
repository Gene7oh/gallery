<?php
    /**
     * Created by gene7
     * Using PhpStorm
     * Date: 5/16/2020
     */
    
    class Session
    {
        /**
         * @var bool
         */
        private $signed_in = false;
        /**
         * @var
         */
        public $user_id;
        
        /**
         * Session constructor.
         */
        function __construct()
        {
            session_start();
            $this->check_the_login();
        }
        
        /**
         * @return bool
         * creates a public method to use a private property $signed_in
         */
        public function is_signed_in()
        {
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
        
        private function check_the_login()
        {
            if (isset($_SESSION['user_id'])) {
                $this->user_id   = $_SESSION['user_id'];
                $this->signed_in = true;
            } else {
                unset($this->user_id);
                $this->signed_in = false;
            }
        }
    }
    
    $session = new Session();