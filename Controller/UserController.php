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

		public function Registration(string $firstname, string $lastname, string $email, string $phone, string $password)
		{
			$user = new User($firstname, $lastname, $email, $phone);
			$user->setPassword($password);
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

		public function getUser (int $id_user)
		{
			$user = $this->UserManager->getById($id_user);
			if($user != false){
				$this->addParam("user", $user);
				return $this->view("update");
			} else {
				$this->redirect_to_route("/users");
			}
			
		}

		public function Update($id_user, $firstname, $lastname, $email, $phone)
		{
			$user = $this->UserManager->getById($id_user);
			if($user != false){
				$user->setFirstname($firstname);
				$user->setLastname($lastname);
				$user->setEmail($email);
				$user->setPhone($phone);

				$request = $this->UserManager->update($user, array("firstname", "lastname", "email", "phone"));
				if($request === true){
					$this->redirect_to_route("/user?id_user=".$id_user);
				} else {
					$this->addParam("error", $request);
					$this->view("update");
				}
			}
		}
	}