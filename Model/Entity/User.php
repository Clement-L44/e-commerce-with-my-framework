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

        const ROLE_USER = 'role_user';
        const ROLE_ADMIN = 'role_admin';

        public function __construct($firstname, $lastname, $email, $phone)
        {
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->email = $email;
            $this->phone = $phone;
            $this->when_deleted = null;
            $this->roles = 'role_user';
        }

        public function __get($property){
            if(property_exists($this, $property)){
                return $this->$property;
            }
        }

        public function getId() :int{
            return $this->id_user;
        }

        public function getFirstname() :string{
            return $this->firstname;
        }

        public function setFirstname(string $data) :void{
            $this->firstname = $data;
        }

        public function getLastname() :string{
            return $this->lastname;
        }

        public function setLastname(string $data) :void{
            $this->lastname = $data;
        }

        public function getEmail() :string{
            return $this->email;
        }

        public function setEmail(string $data) :void{
            $this->email = $data;
        }

        public function getPhone() :string{
            return $this->phone;
        }

        public function setPhone(string $data) :void{
            $this->phone = $data;
        }

        public function getRoles() :string{
            return $this->roles;
        }

        public function setRoles(string $data) :void{
            $this->roles = $data;
        }

        public function check_deleted(): ?mixed{
            if($this->when_deleted != null){
                return $this->when_deleted;
            } else {
                return null;
            }
        }

        public function delete() :void{
            $date = new DateTime();
            $this->when_deleted = $date->format('Y-m-d H:i:s');
        }

        public function reactivited() :self{
            $this->when_deleted = null;
            return $this;
        }

        public function check_password() :string{
            return $this->password;
        }

        public function crypt_password(string $data) :string{
            return password_hash($data, PASSWORD_BCRYPT);
        }

        public function setPassword(string $data) :void{
            $hashPassword = password_hash($data, PASSWORD_BCRYPT);
            $this->password = $hashPassword;
        }
    }

?>