<?php

Class manageController Extends baseController {

public function index() {
	/*** load the index template ***/
		$this->registry->template->show('header');
		$this->registry->template->show('navigation');
		$this->registry->template->show('manage_index');
		$this->registry->template->show('footer');
}

public function newDepartment() {
		
		if(isset($_POST['submit-department'])) { 
			
			$department = $_POST['department'];
			$abbreviation = $_POST['abbreviation'];

			if($department==NULL||$abbreviation==NULL){
				$error = "Please enter all values";
				echo "<script type='text/javascript'>alert('$error');</script>";
			}else{
			
				$dep = new department();
				
				if(!$dep->get($department)&&!$dep->get2($abbreviation)){
					//Does not exist in database
					$result = $dep->set($department,$abbreviation);
					if($result==1){
						session_start();
						$_SESSION['success']=1;
						header("Location: /manage/newDepartment");
					}else{
						$error = "Failed to store new department.  Please try again.";
						echo "<script type='text/javascript'>alert('$error');</script>";
					}
				}else{
					$error = "Department already exists.";
					echo "<script type='text/javascript'>alert('$error');</script>";
				}
			}
		}

	/*** load the index template ***/
		$this->registry->template->show('header');
		$this->registry->template->show('navigation');
		$this->registry->template->show('manage_newDepartment');
		$this->registry->template->show('footer');
}

public function newCourse() {

		$this->registry->template->departments = array();

		$deps = new department();
		$array = array();
		$array = $deps->getAll();
		$arraySize = count($array);
		for($x=0;$x<$arraySize;$x++){
			$id=$array[$x]['CollegeID'];	
			$name=$array[$x]['CollegeName'];
			$abr=$array[$x]['CollegeAbr'];
			$this->registry->template->departments[$x]="<option value=$id>($abr) $name</option>"; 
		}
		
		
		if(isset($_POST['submit-course'])) { 

			$name = $_POST['CourseName'];
			$department = $_POST['CollegeID'];
			$number = $_POST['CourseNumber'];
			$section = $_POST['CourseSection'];
			$description = $_POST['CourseDescription'];
			$seats = $_POST['CourseSeats'];
			
			if($name==NULL||$department==-1||$number==NULL||$seats==NULL){
				$error = "Please enter all required values";
				echo "<script type='text/javascript'>alert('$error');</script>";
			}else{
				
				$dep = new course();
				
				if(!$dep->get($department, $number, $section)){
					//Does not exist in database
					$result = $dep->set($department, $number, $section, $name, $description, $seats);
					if($result==1){
						session_start();
						$_SESSION['success']=1;
						header("Location: /manage/newCourse");
					}else{
						$error = "Failed to store new department.  Please try again.";
						echo "<script type='text/javascript'>alert('$error');</script>";
					}
				}else{
					$error = "Course already exists.";
					echo "<script type='text/javascript'>alert('$error');</script>";
				}
			}
		}

	/*** load the index template ***/
		$this->registry->template->show('header');
		$this->registry->template->show('navigation');
		$this->registry->template->show('manage_newCourse');
		$this->registry->template->show('footer');
}

}

?>