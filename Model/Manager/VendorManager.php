<?php

    class VendorManager extends BaseManager
    {

        public function __construct($datasource)
        {
            parent::__construct("Vendor", "Vendor", $datasource);
            
        }

    }

?>