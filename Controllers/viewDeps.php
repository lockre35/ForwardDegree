<?php 

if(isset($_POST['submit-department'])) { 
	
	$department = $_POST['department'];
	
	if($department==-1||$department==NULL){
		$error = "Please select a department";
		echo "<script type='text/javascript'>alert('$error');</script>";
	}else{
		session_start();
		$_SESSION['department']=$department;
		header("Location: ../Views/courses_view.php");
	}
}
?>