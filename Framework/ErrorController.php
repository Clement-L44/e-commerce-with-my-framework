<?php
	class ErrorController
	{
		public function Show($exception)
		{
			$this->addParam("exception",$exception);
			$this->view("error");
		}
	}

?>