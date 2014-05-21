<?php
class user{
	var $firstName;
	var $isAdmin;
	var $email;
	var $password;
	
	function get($username,$password){
		require_once('../Infastructure/db_access.php');
		$db = new db_access();
		$sql = "Select * from tbl_user where Email='$username' and Password='$password'";
		$db->query($sql);
		$db->nextRecord();

		$this->firstName=$db->record['FirstName'];
		$this->email=$db->record['Email'];
		$groups=$db->record['Groups'];
		if(!strcmp($groups,"admin")){
			$this->isAdmin=1;
		}else{
			$this->isAdmin=0;
		}
		
		return $db->numRows();
	}
	
	function set($firstname,$lastname,$username,$password){
		require_once('../Infastructure/db_access.php');
		$db = new db_access();
		$sql = "Insert into tbl_user (FirstName, LastName, Email, Password) values ('$firstname','$lastname','$username','$password')";
		$db->query($sql);
		$sql = "Select * from tbl_user where Email='$username'";
		$db->query($sql);

		if($db->numRows()==1){
			$this->firstName=$firstname;
			$this->email=$username;
			$this->admin=0;
		}
		return $db->numRows();
	}
}
?>