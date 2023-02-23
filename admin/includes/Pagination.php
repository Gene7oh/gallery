<?php
    
    class Pagination
    {
        public int $current_page;
        public int $items_per_page;
        public int $total_items_count;
        
        public function __construct($page = 1, $items_per_page, $total_items_count = 0)
        {
            $this->current_page      = (int) $page; /*$page assigned by get request*/
            $this->items_per_page    = (int) $items_per_page;
            $this->total_items_count = $total_items_count;
        }
        
        public function next(): int
        {
            return $this->current_page + 1;
        }
        
        public function previous(): int
        {
            return $this->current_page - 1;
        }
        
        public function pageTotal()
        {
            return ceil($this->total_items_count / $this->items_per_page);
        }
        public function hasPrevious(){
            return $this->previous() >= 1;
        }
        public function hasNext(){
            return $this->next() <= $this->pageTotal();
        }
        public function offset(){
            return ($this->current_page -1) * $this->items_per_page;
        }
    } /*  end class   */