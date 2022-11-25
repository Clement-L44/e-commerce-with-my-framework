<?php

    class AddressManager extends BaseManager
    {

        public function __construct($datasource)
        {
            parent::__construct("Address", "Address", $datasource);
            
        }

    }

?>