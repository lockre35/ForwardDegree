<?php 
include '../Views/newCourse_view.php';

if(isset($_POST['submit-course'])) { 
	include '../Models/course.php';

	$name = $_POST['CourseName'];
	$department = $_POST['CollegeID'];
	$number = $_POST['CourseNumber'];
	$section = $_POST['CourseSection'];
	$description = $_POST['CourseDescription'];
	$seats = $_POST['CourseSeats'];
	
	/*
	echo $name;
	echo $department;
	echo $section;
	echo $description;
	echo $seats;*/
	
	if($name==NULL||$department==-1||$number==NULL||$seats==NULL){
		$error = "Please enter all required values";
		echo "<script type='text/javascript'>alert('$error');</script>";
	}
	
	$dep = new course();
	
	if(!$dep->get($department, $number, $section)){
		//Does not exist in database
		$result = $dep->set($department, $number, $section, $name, $description, $seats);
		if($result==1){
			session_start();
			$_SESSION['success']=1;
			//echo "Here";
			header("Location: ../Controllers/newCourse.php");
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