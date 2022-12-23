<?php
    
    class Photo extends Db_object
    {
        protected static string $db_table        = "photos";
        protected static array  $db_table_fields = array('title', 'description', 'filename', 'type', 'size');
        public int              $id              = 0;
        public string           $title           = "";
        public string           $description     = "";
        public string           $filename        = "";
        public string           $type            = "";
        public int              $size            = 0;
        
    }  /* end of class */