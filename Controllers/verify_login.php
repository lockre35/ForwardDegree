<?php
	function validate_credentials($username,$password){
		$db = new db_access();
		$sql = "Select * from tbl_user where Email='$username' and Password='$password'";
		$db->query($sql);
		return $db->numRows();
	}
?>