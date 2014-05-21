<?php 
include '../Views/login_view.php';
 
if(isset($_POST['submit-login'])) { 
	include '../Controllers/verify_login.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(validate_credentials($username,$password)!=0){
		//go back to home
		header("Location: ../Views/home.php");
	}else{
		$error = "Username or password incorrect.  Please try again";
		echo "<script type='text/javascript'>alert('$error');</script>";
	}
}
?>