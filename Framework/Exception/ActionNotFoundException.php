<?php
    class ActionNotFoundException extends Exception
    {
        public function __construct($message = "No action has been found")
        {
            parent::__construct($message, "0003");
        }

        public function getMoreDetail()
		{
			return "Action has not been found with route";
		}
    }
?>