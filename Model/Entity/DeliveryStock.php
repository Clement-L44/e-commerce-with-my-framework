<?php

    class DeliveryStock{

        private $id_deliveryStock;
        private $status;
        private $date_orderTaking;
        private $date_delivery;
        private $add_stock;
        
        public function __construct($status, $date_orderTaking, $add_stock)
        {
            $this->status = $status;
            $this->date_orderTaking = $date_orderTaking;
            $this->add_stock = $add_stock;
        }

        public function getId(){
            return $this->id_deliveryStock;
        }

        public function getStatus(){
            return $this->status;
        }

        public function setStatus($data){
            $this->status = $data;
        }

        public function getDateOrderTaking(){
            return $this->date_orderTaking;
        }

        public function check_delivery(){
            if($this->date_delivery != null){
                return $this->date_delivery;
            } else {
                return false;
            }
        }

        public function is_delivery(){
            $date = new DateTime();
            $this->date_delivery = $date->format('Y-m-d H:i:s');
        }

        public function getAddStock(){
            return $this->add_stock;
        }

    }

?>