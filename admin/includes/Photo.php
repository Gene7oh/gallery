<?php
    
    class Photo extends Db_object
    {
        protected static string $db_table            = "photos";
        protected static array  $db_table_fields     = array('title', 'caption', 'description', 'filename', 'alt_text', 'type', 'size');
        public int              $id                  = 0;
        public string           $title               = "";
        public                  $caption;
        public string           $description         = "";
        public string           $filename            = "";
        public                  $alt_text;
        public string           $type                = "";
        public int              $size                = 0;
        public string           $tmp_path;
        public string           $upload_directory    = "images";
        public array            $errors              = array();
       
        
        // ↓↓ passes the FILES super global ['uploaded_file'] as an argument
        
        /** @noinspection DuplicatedCode */
<<<<<<< HEAD
        public function setFile($file)
        {
            /** @noinspection PhpConditionAlreadyCheckedInspection */
            if (empty($file) || !$file || !is_array($file)) {
                $this->errors[] = "No file Uploaded";
                return false;
            } elseif ($file['error'] !== 0) {
                $this->errors[] = $this->upload_errors_array[$file['error']];
            } else {
                $this->filename = basename($file['name']);
                $this->tmp_path = $file['tmp_name'];
                $this->type     = $file['type'];
                $this->size     = $file['size'];
            }
            
        }  /* End Method */
=======
>>>>>>> new-placeholder
        
        public function save()
        {
            /** @noinspection DuplicatedCode */
            if ($this->id) {
                $this->update();
            } else {
                if (!empty($this->errors)) {
                    return false;
                }
                if (empty($this->filename) || empty($this->tmp_path)) {
                    $this->errors[] = "File not available";
                    return false;
                }
                $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;
                if (file_exists($target_path)) {
                    $this->errors[] = "File {$this->filename} already exists";
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
        
        public function deletePhoto(): bool
        {
            /*delete records ↓↓ from database parent class method */
            if ($this->delete()) {
                /* upon successful removal ↓↓ of records from db remove image file from server directory */
                $target_path = SITE_ROOT . DS . 'admin' . DS . $this->picturePath();
                /** @noinspection PhpTernaryExpressionCanBeReplacedWithConditionInspection */
                return unlink($target_path) ? true : false;
            } else {
                return false;
            }
        }  /* End Method */
        
        public function picturePath(): string
        {
            return $this->upload_directory . DS . $this->filename;
        }
    }  /* end of class */