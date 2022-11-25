<?php

    class VariationArticle{

        private $id_variationArticle;
        private $size;
        private $color;
        private $stock;

        public function __construct($size, $color, $stock)
        {
            $this->size = $size;
            $this->color = $color;
            $this->stock = $stock;
        }

        public function getId(){
            return $this->id_variationArticle;
        }

        public function getSize(){
            return $this->size;
        }

        public function setSize($data){
            $this->size = $data;
        }

        public function getColor(){
            return $this->color;
        }

        public function setColor($data){
            $this->color = $data;
        }

        public function getStock(){
            return $this->stock;
        }

        public function setStock($data){
            $this->stock = $data;
        }


    }

?>