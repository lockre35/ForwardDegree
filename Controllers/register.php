<?php 
include '../Views/register_view.php';
 
if(isset($_POST['submit-register'])) { 
	include '../Models/user.php';
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if($firstname==NULL||$lastname==NULL||$username==NULL||$password==NULL){
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

		header("Location: ../Controllers/register_wait.php");
	}else{
		$error = "Failed to create user.  Please try again.";
		echo "<script type='text/javascript'>alert('$error');</script>";
	}
}
?>