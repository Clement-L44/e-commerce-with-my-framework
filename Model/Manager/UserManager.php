<?php
    class UserManager extends BaseManager
    {

        private $constructor = ["firstname", "lastname", "email", "phone"];

        public function __construct($datasource)
        {
            parent::__construct("User", "User", $datasource, $this->constructor);
        }

        public function getByMail($email)
        {
            $req = $this->_bdd->prepare("SELECT * FROM User WHERE email = :email");
            $req->bindParam('email', $email);
            $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User', $this->constructor);
            $req->execute();
			return $req->fetch();   
        }

    }

?>