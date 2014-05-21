<?php 
include '../Views/newCollege_view.php';

if(isset($_POST['submit-department'])) { 
	include '../Models/college.php';
	
	$department = $_POST['department'];
	$abbreviation = $_POST['abbreviation'];

	if($department==NULL||$abbreviation==NULL){
		$error = "Please enter all values";
		echo "<script type='text/javascript'>alert('$error');</script>";
	}
	
	$dep = new college();
	
	if(!$dep->get($department)&&!$dep->get2($abbreviation)){
		//Does not exist in database
		$result = $dep->set($department,$abbreviation);
		if($result==1){
			session_start();
			$_SESSION['success']=1;
			echo "Here";
			header("Location: ../Controllers/newCollege.php");
		}else{
			$error = "Failed to store new department.  Please try again.";
			echo "<script type='text/javascript'>alert('$error');</script>";
		}
	}else{
		$error = "Department already exists.";
		echo "<script type='text/javascript'>alert('$error');</script>";
	}
}
?>