<?php
    
    class Comment extends Db_object
    {
        protected static string $db_table        = "comments";
        protected static array  $db_table_fields = array('id', 'photo_id', 'author', 'body');
        public int              $id              = 0;
        public int              $photo_id        = 0;
        public string           $author          = "";
        public string           $body            = "";
        
        public static function createComment($photo_id, $author, $body)
        {
            if (!empty($photo_id) && !empty($author) && !empty($body)) {
                $comment           = new Comment();
                $comment->photo_id = $photo_id;
                $comment->author   = $author;
                $comment->body     = $body;
                return $comment;
            } else {
                return false;
            }
        }
        
        public static function findTheComment($photo_id)
        {
            global $database;
//            $sql = "SELECT * FROM " . self::$db_table . " WHERE photo_id = " . $database->escapeString($photo_id) . "ORDER BY photo_id ASC";
            $sql = "SELECT * FROM " . self::$db_table;
            $sql .= " WHERE photo_id = " . $database->escapeString($photo_id);
            $sql .= " ORDER BY photo_id ASC";
            return self::findByQuery($sql);
        }
    }  /* end of Class    */