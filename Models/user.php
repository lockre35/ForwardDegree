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
}
?>