<?php

    class CommandManager extends BaseManager
    {

        public function __construct($datasource)
        {
            parent::__construct("Command", "Command", $datasource);
            
        }

    }

?>