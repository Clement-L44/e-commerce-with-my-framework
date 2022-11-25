<?php

    class VariationArticleManager extends BaseManager
    {

        public function __construct($datasource)
        {
            parent::__construct("VariationArticle", "VariationArticle", $datasource);
            
        }

    }

?>