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
		}

		public function Register()
		{
			$this->view("register");
		}

		public function Registration($firstname, $lastname, $email, $phone, $password)
		{
			$user = new User($firstname, $lastname, $email, $phone, $password);
			$this->UserManager->create($user, ["firstname", "lastname", "email", "phone", "password", "roles", "when_deleted"]);
			var_dump($this->UserManager->create($user, ["firstname", "lastname", "email", "phone", "password", "roles", "when_deleted"]));
		}
	}