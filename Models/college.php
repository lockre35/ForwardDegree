<?php
class college{
	var $collegeID;
	var $collegeName;
	var $collegeAbr;
	
	function get($CollegeName){
		require_once('../Infastructure/db_access.php');
		$db = new db_access();
		$sql = "Select * from tbl_college where CollegeName='$CollegeName'";
		$db->query($sql);
		$db->nextRecord();

		$this->collegeID=$db->record['CollegeID'];
		$this->collegeName=$db->record['CollegeName'];
		$this->collegeAbr=$db->record['CollegeAbr'];
		
		return $db->numRows();
	}
	
	function get2($CollegeAbr){
		require_once('../Infastructure/db_access.php');
		$db = new db_access();
		$sql = "Select * from tbl_college where CollegeAbr='$CollegeAbr'";
		$db->query($sql);
		$db->nextRecord();

		$this->collegeID=$db->record['CollegeID'];
		$this->collegeName=$db->record['CollegeName'];
		$this->collegeAbr=$db->record['CollegeAbr'];
		
		return $db->numRows();
	}
	
	function getAll(){
		require_once('../Infastructure/db_access.php');
		$db = new db_access();
		$sql = "Select * from tbl_college";
		$db->query($sql);
		$returnArray = array();
		while($db->nextRecord()){
			$id=$db->record['CollegeID'];
			$name=$db->record['CollegeName'];
			$abr=$db->record['CollegeAbr'];
			$array = array("CollegeID"=>$id,"CollegeName"=>$name,"CollegeAbr"=>$abr);
			/*echo $db->record['CollegeID'];
			echo $db->record['CollegeName'];
			echo $db->record['CollegeAbr'];*/
			array_push($returnArray,$array);
		}
		return $returnArray;
	}
	
	function set($collegeName,$collegeAbr){
	
		require_once('../Infastructure/db_access.php');
		
		$db = new db_access();
		$sql = "Insert into tbl_college (CollegeName, CollegeAbr) values ('$collegeName','$collegeAbr')";
		$db->query($sql);
		$sql = "Select * from tbl_college where CollegeName='$collegeName'";
		$db->query($sql);
		echo "Here";
		if($db->numRows()==1){
			$this->collegeName=$collegeName;
			$this->collegeAbr=$collegeAbr;
			$this->collegeID=0;
		}
		return $db->numRows();
	}
}
?>