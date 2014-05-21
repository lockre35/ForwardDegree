<?php

Class indexController Extends baseController {

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
				header("Location: /course/select");
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
		$this->registry->template->show('index');
		$this->registry->template->show('footer');
}

public function about() {		
	/*** load the index template ***/
		$this->registry->template->show('header');
		$this->registry->template->show('navigation');
		$this->registry->template->show('index_about');
		$this->registry->template->show('footer');
}

}

?>
