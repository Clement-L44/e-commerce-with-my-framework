<?php

    class DeliveryStockManager extends BaseManager
    {

        public function __construct($datasource)
        {
            parent::__construct("DeliveryStock", "DeliveryStock", $datasource);
            
        }

    }

?>