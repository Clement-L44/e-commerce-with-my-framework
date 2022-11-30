<?php
	class UserController extends BaseController
	{
		public function Login()
		{
			return $this->view("login");
		}
		
		public function Authenticate(string $login, string $password)
		{
			$user = $this->UserManager->getByMail($login);
			var_dump($user);
		}

		public function Register()
		{
			return $this->view("register");
		}

		public function Registration($firstname, $lastname, $email, $phone, $password)
		{
			$user = new User($firstname, $lastname, $email, $phone, $password);
			$request = $this->UserManager->create($user, ["firstname", "lastname", "email", "phone", "password", "roles", "when_deleted"]);

			if($request === true){
				$this->redirect_to_route("/Login");
			} else {
				$this->addParam("error", $request);
				$this->view("register");
			}	
		}

		public function ListUsers()
		{
			$users = $this->UserManager->getAll();
			$this->addParam("users", $users);
			return $this->view("listUsers");
		}

		public function Update(int $id)
		{
			$user = $this->UserManager->getById($id);
			return $this->view("update");
		}
	}