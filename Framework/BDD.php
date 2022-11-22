<?php

    /*
        static : Declaring static objects or methods allows you to access them without needing to instantiate the class.
        As static methods can be called without an object instance having been created, the pseudo-variable $this
        is not available in methods declared as static.
    */

    class BDD{

        private $_bdd;
        private static $_instance;

        public static function getInstance($datasource){
            if(empty(self::$_instance)){
                self::$_instance = new BDD($datasource);
            }
            return self::$_instance->_bdd;;
        }

        private function __construct($datasource)
        {
            $this->_bdd = new PDO('mysql:dbname='.$datasource->dbname.';host='.$datasource->host,$datasource->user, $datasource->password);
        }

    }