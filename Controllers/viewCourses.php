<?php 

if(isset($_POST['Submit'])) { 

	$id = $_POST['id'];
	$department = $_SESSION['department'];
	$_SESSION['courseID']=$id;
	header("Location: ../Views/course.php");
	/*
	if($department==NULL){
		$error = "Please enter all values";
		echo "<script type='text/javascript'>alert('$error');</script>";
	}else{
		session_start();
		$_SESSION['department']=$department;
		header("Location: ../Views/courses_view.php");
	}*/

}
?>