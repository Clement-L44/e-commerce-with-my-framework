<?php

    class Vendor{

        private $id_vendor;
        private $society;
        private $phone;
        private $email;
        private $when_deleted;
        
        public function __construct($society, $phone, $email)
        {
            $this->society = $society;
            $this->phone = $phone;
            $this->email = $email;
        }

        public function getId(){
            return $this->id_vendor;
        }

        public function getSociety(){
            return $this->society;
        }

        public function setSociety($data){
            $this->society = $data;
        }

        public function getPhone(){
            return $this->phone;
        }

        public function setPhone($data){
            $this->phone = $data;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($data){
            $this->email = $data;
        }

        public function delete(){
            $date = new DateTime();
            $this->when_deleted = $date->format('Y-m-d H:i:s');
        }

        public function check_deleted(){
            if($this->when_deleted != null){
                return $this->when_deleted;
            } else {
                return null;
            }
        }

        public function reactivited(){
            $this->when_deleted = null;
        }

    }

?>