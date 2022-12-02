<?php

    class BaseManager{

        // Name of table
        private $_table;
        // Object for request
        private $_object;
        // Instance of the BDD class
        protected $_bdd;
        // Constructor for fetch mode : FETCH_CLASS in third argument.
        private $_constructor;

        // datasource : Connection string
        public function __construct($table, $object, $datasource, $constructor)
        {
            $this->_table = $table;
            $this->_object = $object;
            // Method static
            $this->_bdd = BDD::getInstance($datasource);
            $this->_constructor = $constructor;
        }

        public function getById($id)
        {
            $req = $this->_bdd->prepare("SELECT * FROM ".$this->_table." WHERE id_user=?");
            $req->execute(array($id));
            $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->_object, $this->_constructor);
            return $req->fetch();
        }

        public function getAll()
        {
            $req = $this->_bdd->prepare("SELECT * FROM ".$this->_table);
            $req->execute();
            $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->_object, $this->_constructor);
            $result = $req->fetchAll();
            return $result;
        }

        public function create($obj, $param)
        {
            $paramNumber = count($param);
            /*
                array_fill($start_index, $count, $value) : Fills an array with values. Fills an array with $count entries of the value of the $value parameter,
                keys starting at the $start_index parameter.
            */
            $valueArray = array_fill(1, $paramNumber, "?");
            /*
                implode() : Combines the elements of an array into a string.
            */
            $valueString = implode(", ",$valueArray);
            $sql = "INSERT INTO ".$this->_table."(".implode(", ", $param) . ") VALUES(".$valueString.")";
            $req = $this->_bdd->prepare($sql);
            /**
             * !! Execute expects an array with the exact number of parameters provided in the request and in the correct order, while $obj is an object that contains all the properties. !!
             */
            $boundParam = array();
            foreach($param as $paramName){
                array_push($boundParam, $obj->__get($paramName));
            }
            try{
                $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->_object, $this->_constructor);
                $exec = $req->execute($boundParam);
            } catch (PDOException $pdoException){
                return $pdoException->getMessage();
            }
            
            if($exec == false){
                return "Error code : " .$req->errorCode()." - Message : ".$req->errorInfo()[2];
            } else {
                return $exec;
            }
            
        }

        public function update($obj, $param)
        {
            $sql = "UPDATE ".$this->_table." SET ";
            foreach($param as $paramName){
                $sql = $sql.$paramName." = ?, ";
            }
            $sql = $sql." WHERE id_user=? ";
            $req = $this->_bdd->prepare($sql);
            $param[] = 'id_user';
            /**
             * !! Execute expects an array with the exact number of parameters provided in the request and in the correct order, while $obj is an object that contains all the properties. !!
             */
            $boundParam = array();
            foreach($param as $paramName){
                if(property_exists($obj, $paramName)){
                    //$boundParam[$paramName] = $obj->$paramName;
                    array_push($boundParam, $obj->__get($paramName));
                } else {
                    throw new PropertyNotFoundException($this->_object, $paramName);
                }
                
            }
            $exec = $req->execute($boundParam);
            if($exec == false){
                return "Error code : " .$req->errorCode()." - Message : ".$req->errorInfo()[2];
            } else {
                return $exec;
            }
        }

        public function delete($obj)
        {
            if(property_exists($obj, "id_user")){
                $req = $this->_bdd->prepare("DELETE FROM ".$this->_table." WHERE id_user=?");
                return $req->execute(array($obj->id));
            } else {
                throw new PropertyNotFoundException($this->_object, "id_user");
            }

        }

    }

?>