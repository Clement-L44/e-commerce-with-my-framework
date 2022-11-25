<?php

    class ArticleManager extends BaseManager
    {

        public function __construct($datasource)
        {
            parent::__construct("Article", "Article", $datasource);
            
        }

    }

?>