<?php
    
    /* call static methods with the self :: var inside another class method.
     * ↓↓ to use the db class we need to make the $database object global in each method ↓↓ */
    
    class User extends Db_object
    {
        protected static string $db_table            = "users";
        protected static array  $db_table_fields     = array('username', 'user_fname', 'user_lname', 'user_image', 'user_password');
        public int              $id                  = 0;
        public string           $username            = "";
        public string           $user_fname          = "";
        public string           $user_lname          = "";
        public string           $user_image          = "";
        public string           $user_password       = "";
        public string           $image_placeholder   = "images".DS."placeholder.png";
        public string           $upload_directory    = "images";
        public string           $type;
        public int              $size;
        public string           $tmp_path;
        
        public static function verifyUser($username, $password)
        {
            global $database;
            $username = $database->escapeString($username);
            $password = $database->escapeString($password);
            /* @noinspection SqlResolve */
            $sql          = "SELECT * FROM " . static::$db_table . " WHERE username = '{$username}' AND user_password = '{$password}' LIMIT 1";
            $result_array = User::findByQuery($sql);
            return !empty($result_array) ? array_shift($result_array) : false;
        }  /* End Method */
     
        
        public function saveUserAndImage()
        {
            /** @noinspection DuplicatedCode */
            if ($this->id) {
                $this->update();
            } else {
                if (!empty($this->errors)) {
                    return false;
                }
                if (empty($this->user_image) || empty($this->tmp_path)) {
                    $this->errors[] = "File not available";
                    return false;
                }
                $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;
                if (file_exists($target_path)) {
                    $this->errors[] = "File {$this->user_image} already exists";
                    return false;
                }
                if (move_uploaded_file($this->tmp_path, $target_path)) {
                    if ($this->create()) {
                        unset($this->tmp_path);
                        return true;
                    }
                } else {
                    $this->errors[] = "Upload directory may need permissions set";
                    return false;
                }
            }
        }
        
        public function placeholderOrImage()
        {
            return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory . DS . $this->user_image;
        }
        
        public function deleteUser(): bool
        {
            if ($this->delete()) {
                return true;
            } else {
                return false;
            }
        }  /* End Method */
        
        
    } /* end User class */