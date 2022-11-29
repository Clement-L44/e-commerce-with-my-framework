<?php
    class UserManager extends BaseManager
    {

        public function __construct($datasource)
        {
            parent::__construct("User", "User", $datasource);
            
        }

        public function getByMail($mail)
        {
            $req = $this->_bdd->prepare("SELECT * FROM User WHERE email = :email");
            $req->bindParam('email', $mail);
            $req->execute();
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"User");
			return $req->fetch();   
        }

        

    }

?>