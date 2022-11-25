<?php

    class User
    {
        private $id_user;
        private $firstname;
        private $lastname;
        private $email;
        private $phone;
        private $roles;
        private $when_deleted;
        private $password;

        public function __construct($firstname, $lastname, $email, $phone, $roles)
        {
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->email = $email;
            $this->phone = $phone;
            $this->roles = $roles;
        }

        public function getId(){
            return $this->id_user;
        }

        public function getFirstname(){
            return $this->firstname;
        }

        public function setFirstName($data){
            $this->firstname = $data;
        }

        public function getLastName(){
            return $this->lastname;
        }

        public function setLastName($data){
            $this->lastname = $data;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($data){
            $this->email = $data;
        }

        public function getPhone(){
            return $this->phone;
        }

        public function setPhone($data){
            $this->phone = $data;
        }

        public function getRoles(){
            return $this->roles;
        }

        public function setRoles($data){
            $this->roles = $data;
        }

        public function check_deleted(){
            if($this->when_deleted != null){
                return $this->when_deleted;
            } else {
                return null;
            }
        }

        public function delete(){
            $date = new DateTime();
            $this->when_deleted = $date->format('Y-m-d H:i:s');
        }

        public function reactivited(){
            $this->when_deleted = null;
        }

        public function check_password(){
            
        }

        public function setPassword($data){
            $hashPassword = password_hash($data, PASSWORD_BCRYPT);
            $this->password = $hashPassword;
        }

    }

?>