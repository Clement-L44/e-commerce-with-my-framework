<?php
	class UserController extends BaseController
	{
		public function Login()
		{
			$this->view("login");
		}
		
		public function Authenticate($email,$password)
		{
			//$user = $this->UserManager->getByMail($email);
			var_dump($email, $password);
		}
	}