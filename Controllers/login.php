<?php 
include '../Infastructure/db_access.php';
include '../Views/login_view.php';
 
if(isset($_POST['submit-login'])) { 
	include '../Controllers/verify_login.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(validate_credentials($username,$password)!=0){
		//Set session variable and direct to index
		echo("User exists");
	}else{
		echo("Username of password incorrect.  Please try again");
	}
}
?>