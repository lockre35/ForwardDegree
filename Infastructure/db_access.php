<?php
//Create connection
/*$con=mysqli_connect("vostro.no-ip.biz","guest","guest","test");

Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
*/
class db_access{
	var $host = "vostro.no-ip.biz";
	var $db = "test";
	var $user = "guest";
	var $password = "guest";
	
	var $link_id = 0;
	var $query_id = 0;
	var $record = array();
	var $row;
	var $error;
	
	function connect()
	{
		if(0==$this->link_id)
			$this->link_id=mysql_connect($this->host,$this->user, $this->password);
		if (mysqli_connect_errno())
			$this->throwError(mysqli_connect_error());
		if(!mysql_query(sprintf("use %s", $this->db), $this->link_id))
			$this->throwError("Query not set properly");
	}
	
	function throwError($error){
		printf("Error encountered: %s",$error);
		die("Session Ended");
	}
	
	function query($query)
	{
		$this->connect();
		$this->query_id = mysql_query( $query,$this->link_id );
		$this->row = 0;
		if( !$this->query_id )
			$this->throwError( "Invalid SQL: ".$query);
		return $this->query_id;
	}
	
	function numRows()
    {
        return mysql_num_rows( $this->query_id );
    }
	
	function nextRecord()
	{
		@ $this->record = mysql_fetch_array( $this->query_id );
		$this->row += 1;
		$stat = is_array( $this->record );
		if( !$stat )
		{
			@ mysql_free_result( $this->query_id );
			$this->query_id = 0;
		}
		return $stat;
	}
}
?>