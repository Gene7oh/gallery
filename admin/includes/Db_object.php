<?php
    
    /* personally I would have named it Gallery, but we will see why I'm probably wrong a little later */
    
    class Db_object
    {
        /*public string $img_url             = ""; guessing a abstract var will be needed to use the setFile method in child classes.*/
        public array $errors              = array();
        public array $upload_errors_array = array(
                UPLOAD_ERR_OK         => "File successfully uploaded",
                UPLOAD_ERR_INI_SIZE   => "File exceeds max upload file size",
                UPLOAD_ERR_FORM_SIZE  => "File exceeds max file size",
                UPLOAD_ERR_PARTIAL    => "The file only partially uploaded",
                UPLOAD_ERR_NO_FILE    => "No file was chosen",
                UPLOAD_ERR_NO_TMP_DIR => "Missing temp folder",
                UPLOAD_ERR_CANT_WRITE => "Failed to write to disk",
                UPLOAD_ERR_EXTENSION  => "A PHP extension stopped the file upload"
        );
        
        public static function findAll(): array
        {
            return static::findByQuery("SELECT * FROM " . static::$db_table);
        }  /* End Method */
        
        public static function findByQuery($sql): array
        {
            global $database;
            /* @noinspection PhpUnnecessaryLocalVariableInspection */
            $result           = $database->query($sql);
            $the_object_array = array();
            while ($row = mysqli_fetch_array($result)) {
                $the_object_array[] = static::instantiation($row);
            }
            return $the_object_array;
        }
        
        private static function instantiation($the_record)
        {
            $got_called_class = get_called_class();
            $the_object       = new $got_called_class();
            foreach ($the_record as $the_attribute => $value) {
                if ($the_object->hasAttribute($the_attribute)) {
                    $the_object->$the_attribute = $value;
                }
            }
            return $the_object;
        }
        
        private function hasAttribute($the_attribute): bool
        {
            $object_properties = get_object_vars($this);
            return array_key_exists($the_attribute, $object_properties);
        }
        
        public static function findById($id)
        {
            /* @noinspection SqlResolve */
            $id_array = static::findByQuery("SELECT * FROM " . static::$db_table . " WHERE id = $id");
            return !empty($id_array) ? array_shift($id_array) : false;
        }
        
        public static function countAll()
        {
            global $database;
            $sql        = "SELECT COUNT(*) FROM " . static::$db_table;
            $result_set = $database->query($sql);
            $row        = mysqli_fetch_array($result_set);
            return array_shift($row);
        }
        
        /** @noinspection DuplicatedCode
         * @noinspection PhpDynamicFieldDeclarationInspection
         */
        public function setFile($file)
        {
            /** @noinspection PhpConditionAlreadyCheckedInspection */
            if (empty($file) || !$file || !is_array($file)) {
                $this->errors[] = "No file Uploaded";
                return false;
            } elseif ($file['error'] !== 0) {
                $this->errors[] = $this->upload_errors_array[$file['error']];
            } else {
                $this->user_image = basename($file['name']);
                $this->tmp_path   = $file['tmp_name'];
                $this->type       = $file['type'];
                $this->size       = $file['size'];
            }
            
        }
        
        public function save()
        {
            if (isset($this->id)) {
                $this->update();
            } else {
                $this->create();
            }
        }
        
        public function update(): bool
        {
            global $database;
            $properties     = $this->cleanProperties();
            $property_pairs = array();
            foreach ($properties as $key => $value) {
                $property_pairs[] = " {$key}= '{$value}' ";
            }
            
            /** @noinspection PhpUndefinedFieldInspection */
            $sql = "UPDATE " . static::$db_table . " SET " . implode(",", $property_pairs) . " WHERE id = {$database->escapeString($this->id)}";
            $database->query($sql);
            if (mysqli_affected_rows($database->connect) == 1) {
                return true;
            } else {
                return false;
            }
        }
        
        protected function cleanProperties(): array
        {
            global $database;
            $cleaned_properties = array();
            foreach ($this->properties() as $key => $value) {
                $cleaned_properties[$key] = $database->escapeString($value);
            }
            return $cleaned_properties;
        }
        
        protected function properties(): array
        {
            $properties = array();
            foreach (static::$db_table_fields as $db_field) {
                if (property_exists($this, $db_field)) {
                    $properties[$db_field] = $this->$db_field;
                }
            }
            return $properties;
        }
        
        public function create(): bool
        {
            global $database;
            $properties = $this->cleanProperties();
            $sql        = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")";
            $sql        .= "VALUES ('" . implode("','", array_values($properties)) . "')";
            if ($database->query($sql)) {
                /* id is created dynamically in the child class which is why there is an error showing in the editor */
                /** @noinspection PhpDynamicFieldDeclarationInspection */
                $this->id = $database->TheInsertId();
                return true;
            } else {
                return false;
            }
        }
        
        public function delete(): bool
        {
            global $database;
            /* @noinspection SqlResolve */
            /** @noinspection PhpUndefinedFieldInspection */
            $sql = "DELETE  FROM " . static::$db_table . " WHERE id = '{$database->escapeString($this->id)}'";
            $database->query($sql);
            if (mysqli_affected_rows($database->connect) == 1) {
                return true;
            } else {
                return false;
            }
        }
    }  /* end of class */