<?php

Class accountController Extends baseController {

public function index() {
	/** function to verify a user exists and log them in ***/
		function validate_credentials($username,$password){
			$user=new user();
			$result = $user->get($username,$password);
			//Set session for user
			if($result==1){
				session_start();
				$_SESSION['user_email']=$user->email;
				$_SESSION['user_firstName']=$user->firstName;
				$_SESSION['user_isAdmin']=$user->isAdmin;
			}
			return $result;
		}
	/*** check to see if form has already been submitted ***/
		if(isset($_POST['submit-login'])) { 
			$username = $_POST['username'];
			$password = $_POST['password'];
			if(validate_credentials($username,$password)!=0){
				//go back to home
				header("Location: /");
			}else{
				$error = "Username or password incorrect.  Please try again";
				echo "<script type='text/javascript'>alert('$error');</script>";
			}
		}
		
		
	/*** set a template variable ***/


	/*** load the index template ***/
		$this->registry->template->show('header');
		$this->registry->template->show('navigation');
		$this->registry->template->show('account_login');
		$this->registry->template->show('footer');
}

public function logout() {

	/*** load the index template ***/
		$this->registry->template->show('header');
		$this->registry->template->show('navigation');
		$this->registry->template->show('account_logout');
		$this->registry->template->show('footer');
		
		session_start();
		session_destroy();

		header('Refresh: 2; URL=http://forwarddegree.no-ip.org');
}

public function register() {
		$this->registry->template->show('header');
		$this->registry->template->show('navigation');
		
	if(isset($_POST['submit-register'])) { 
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if($firstname==NULL||$lastname==NULL||$username==NULL||$password==NULL){
			$this->registry->template->show('account_register');
			$error = "Please enter all values";
			echo "<script type='text/javascript'>alert('$error');</script>";
		}
		
		$user=new user();
		$result = $user->set($firstname,$lastname,$username,$password);
		//Set session for user
		if($result==1){
			session_start();
			$_SESSION['user_email']=$user->email;
			$_SESSION['user_firstName']=$user->firstName;
			$_SESSION['user_isAdmin']=$user->isAdmin;
			$this->registry->template->show('account_registerwait');
			header('Refresh: 2; URL=http://forwarddegree.no-ip.org');
		}else{
			$this->registry->template->show('account_register');
			$error = "Failed to create user.  Please try again.";
			echo "<script type='text/javascript'>alert('$error');</script>";
		}
	}else{
		$this->registry->template->show('account_register');
	}
	
	/*** load the index template ***/
		$this->registry->template->show('footer');

}

}

?>
