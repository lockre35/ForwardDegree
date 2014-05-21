<?php
	function validate_credentials($username,$password){
		require_once(	'../Models/user.php');
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
?>