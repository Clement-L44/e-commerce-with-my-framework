<?php
	class UserController extends BaseController
	{
		public function Login()
		{
			$this->View("login");
		}
		
		public function Authenticate($login,$password)
		{
			$user = $this->UserManager->getByMail($login);
		}
	}