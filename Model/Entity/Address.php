<?php

    class AddressComplementary{

        private $id_address;
        private $zipCode;
        private $city;
        private $streetNumber;
        private $address;
        private $addressComplementary;
        private $country;

        public function __construct($zipCode, $city, $streetNumber, $address, $addressComplementary = null, $country)
        {
            $this->zipCode = $zipCode;
            $this->city = $city;
            $this->streetNumber = $streetNumber;
            $this->address = $address;
            $this->addressComplementary = $addressComplementary;
            $this->country = $country;
        }

        public function getId(){
            return $this->id_address;
        }

        public function getZipCode(){
            return $this->zipCode;
        }

        public function setZipCode($data){
            $this->zipCode = $data;
        }

        public function getCity(){
            return $this->city;
        }

        public function setCity($data){
            $this->city = $data;
        }

        public function getStreetNumber(){
            return $this->streetNumber;
        }

        public function setStreetNumber($data){
            $this->streetNumber = $data;
        }

        public function getAddress(){
            return $this->address;
        }

        public function setAddress($data){
            $this->address = $data;
        }

        public function getAddressComplementary(){
            return $this->addressComplementary;
        }

        public function setAddressComplementary($data){
            $this->addressComplementary = $data;
        }

        public function getCountry(){
            return $this->country;
        }

        public function setCountry($data){
            $this->country = $data;
        }

    }


?>