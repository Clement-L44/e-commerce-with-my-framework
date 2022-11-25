<?php

    class CategoryManager extends BaseManager
    {

        public function __construct($datasource)
        {
            parent::__construct("Category", "Category", $datasource);
            
        }

    }

?>