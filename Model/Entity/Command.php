<?php

    class Command{

        private $id_command;
        private $status;
        private $date_order;
        private $date_sent;
        private $date_delivered;
        private $payment_status;

        public function __construct($status, $date_order, $payment_status)
        {
            $this->status = $status;
            $this->date_order = $date_order;
            $this->payment_status = $payment_status;
        }

        public function getId(){
            return $this->id_command;
        }

        public function getStatus(){
            return $this->stauts;
        }

        public function setStatus($data){
            $this->status = $data;
        }

        public function getDateOrder(){
            return $this->date_order;
        }

        public function setDateOrder($data){
            $this->date_order = $data;
        }

        public function check_sent(){
            if($this->date_sent != null){
                return $this->date_sent;
            } else {
                return null;
            }
        }

        public function is_sent(){
            $date = new DateTime();
            $this->date_sent = $date->format('Y-m-d H:i:s');
        }

        public function check_delivered(){
            if($this->date_delivered != null){
                return $this->date_delivered;
            } else {
                return null;
            }
        }

        public function is_delivered(){
            $date = new DateTime();
            $this->date_delivered = $date->format('Y-m-d H:i:s');
        }

        public function getPaymentStatus(){
            return $this->payment_status;
        }

        public function setPaymentStatus($data){
            $this->payment_status = $data;
        }



    }

?> 