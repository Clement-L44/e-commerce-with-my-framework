<?php

    class ViewNotFoundException extends Exception
    {
        public function __construct($message = "No view has been found")
        {
            parent::__construct($message, "0006");
        }

        public function getMoreDetail()
		{
			return "Action has not been found with route";
		}
    }

?>