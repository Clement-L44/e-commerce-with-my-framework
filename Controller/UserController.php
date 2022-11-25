<?php
	class UserController extends BaseController
	{
		public function Login()
		{
			$this->view("login");
		}
		
		public function Authenticate($login,$password)
		{
			$user = $this->UserManager->getByMail($login);
			var_dump($user);
		}

		public function Register(){
			$this->view("register");
		}

		public function Process_register($firstname, $lastname, $email, $phone, $roles, $password){

			var_dump($firstname, $lastname, $email, $phone, $roles, $password);

		}
	}