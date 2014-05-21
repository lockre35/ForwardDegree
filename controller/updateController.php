<?php

Class updateController Extends baseController {

public function index() {
		/*** check to see if form has already been submitted ***/
		if(isset($_POST['submit-department'])) { 
	
			$department = $_POST['department'];
			
			if($department==-1||$department==NULL){
				$error = "Please select a department";
				echo "<script type='text/javascript'>alert('$error');</script>";
			}else{
				session_start();
				$_SESSION['department']=$department;
				header("Location: /update/select");
			}
		}
		
		
	/*** set a template variable ***/
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

	/*** load the index template ***/
		$this->registry->template->show('header');
		$this->registry->template->show('navigation');
		$this->registry->template->show('update_index');
		$this->registry->template->show('footer');
}

public function select() {
	/*** should not have to call this here.... FIX ME ***/
		session_start();
		$department=$_SESSION['department'];
		//include '../Models/course.php';
		$this->registry->template->courses = array();
		
		$course = new course();
		$array = array();
		$array = $course->getAll($department);
		
		$arraySize = count($array);
		//echo $arraySize;
		for($x=0;$x<$arraySize;$x++){	
			$name=$array[$x]['CourseName'];
			$abr=$array[$x]['CollegeAbr'];
			$id=$array[$x]['CourseID'];
			$number=$array[$x]['CourseNumber'];
			$this->registry->template->courses[$x] = "
			<tr>
				<td>$abr</td>
				<td>$number</td>
				<td>$name</td>
				<td class=\"text-center\">				
					<form method=\"post\" action=\"/update/course\">
						<input type=\"text\" style=\"display: none;\" name=\"id\" value=$id></input>
						<input class=\"btn btn-xs btn-primary btn-block\" type=\"submit\" value=\"Update\" name=\"Submit\">
					</form>
				</td>
			</tr>";
		}

	/*** load the index template ***/
		$this->registry->template->show('header');
		$this->registry->template->show('navigation');
		$this->registry->template->show('update_select');
		$this->registry->template->show('footer');
}

public function course() {
	/*** should not have to call this here.... FIX ME ***/
		session_start();
		if(isset($_POST['Submit'])) { 
	
			$department = $_POST['id'];
			$course = new course();
			$course->getSingle($department);
			$this->registry->template->number = $course->number;
			$this->registry->template->name = $course->name;
			$this->registry->template->section = $course->section;
			$this->registry->template->description = $course->description;
			$this->registry->template->seats = $course->seats;
			$this->registry->template->id = $course->collegeID;
			$this->registry->template->courseID = $department;

			$dep = new department();
			$dep->getSingle($course->collegeID);
			$this->registry->template->depName= $dep->collegeName;
		}



	/*** load the index template ***/
		$this->registry->template->show('header');
		$this->registry->template->show('navigation');
		$this->registry->template->show('update_course');
		$this->registry->template->show('footer');
}
}

?>