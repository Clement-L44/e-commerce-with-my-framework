<?php

    class Article {

        private $id_article;
        private $libelle;
        private $price;
        private $description;
        private $img;
        private $img_alt;
        private $promo;
        private $when_deleted = null;

        public function __construct($libelle, $price, $description, $img, $img_alt = null, $promo) {
            $this->libelle = $libelle;
            $this->price = $price;
            $this->description = $description;
            $this->img = $img;
            $this->img_alt = $img_alt;
            $this->promo = $promo;
        }

        public function getId(){
            return $this->id_article;
        }

        public function getLibelle(){
            return $this->libelle;
        }

        public function setLibelle($data){
            $this->libelle = $data;
        }

        public function getPrice(){
            return $this->price;
        }

        public function setPrice($data){
            $this->price = $data;
        }

        public function getDescription(){
            return $this->description;
        }

        public function setDescription($data){
            $this->description = $data;
        }

        public function getImg(){
            return $this->img;
        }

        public function setImg($data){
            $this->img = $data;
        }

        public function getImgAlt(){
            return $this->img_alt;
        }

        public function setImgAlt($data){
            $this->img_alt = $data;
        }

        public function getPromo(){
            return $this->promo;
        }

        public function setPromo($data){
            $this->promo = $data;
        }

        public function delete(){
            $date = new DateTime();
            $this->when_deleted = $date->format('Y-m-d H:i:s');
        }

        // Check if article is deleted - true : delete , false : not delete
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