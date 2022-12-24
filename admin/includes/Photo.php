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
        public array            $custom_errors_array = array();
        public array            $upload_errors_array = array(
                UPLOAD_ERR_OK         => "File successfully uploaded",
                UPLOAD_ERR_INI_SIZE   => "File exceeds max upload file size",
                UPLOAD_ERR_FORM_SIZE  => "File exceeds max file size",
                UPLOAD_ERR_PARTIAL    => "The file only partially updoaded",
                UPLOAD_ERR_NO_FILE    => "No file was chosen",
                UPLOAD_ERR_NO_TMP_DIR => "Missing temp folder",
                UPLOAD_ERR_CANT_WRITE => "Failed to write to disk",
                UPLOAD_ERR_EXTENSION  => "A PHP extension stopped the file upload"
        );
        
    }  /* end of class */