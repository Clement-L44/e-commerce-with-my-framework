<?php

    class Category{

        private $id_category;
        private $libelle;

        public function __construct($libelle)
        {
            $this->libelle = $libelle;
        }

        public function getId(){
            return $this->id_category;
        }

        public function getLibelle(){
            return $this->libelle;
        }

        public function setLibelle($data){
            $this->libelle = $data;
        }

    }

?>