<?php
    
    class Photo extends Db_object
    {
        protected static string $db_table            = "photos";
        protected static array  $db_table_fields     = array('title', 'description', 'filename', 'type', 'size');
        public int              $id                  = 0;
        public string           $title               = "";
        public string           $description         = "";
        public string           $filename            = "";
        public string           $type                = "";
        public int              $size                = 0;
        public string           $tmp_path;
        public string           $upload_directory    = "images";
        public array            $errors              = array();
        public array            $upload_errors_array = array(
                UPLOAD_ERR_OK         => "File successfully uploaded",
                UPLOAD_ERR_INI_SIZE   => "File exceeds max upload file size",
                UPLOAD_ERR_FORM_SIZE  => "File exceeds max file size",
                UPLOAD_ERR_PARTIAL    => "The file only partially uploaded",
                UPLOAD_ERR_NO_FILE    => "No file was chosen",
                UPLOAD_ERR_NO_TMP_DIR => "Missing temp folder",
                UPLOAD_ERR_CANT_WRITE => "Failed to write to disk",
                UPLOAD_ERR_EXTENSION  => "A PHP extension stopped the file upload"
        );
        
        // ↓↓ passes the FILES super global ['uploaded_file'] as an argument
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
        
        public function save()
        {
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
                if (file_exists($target_path)){
                    $this->errors[] = "File {$this->filename} already exists";
                    return false;
                }
                if (move_uploaded_file($this->tmp_path, $target_path)){
                    if ($this->create()){
                        unset($this->tmp_path);
                        return true;
                    }
                } else {
                    $this->errors[] = "Upload directory may need permissions";
                    return false;
                }
            }
        }  /* End Method */
        
    }  /* end of class */