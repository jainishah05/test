<?php
	
	include_once 'connection.php';
	
	class employee extends connection
	{	
		public function __construct()
		{
			parent::__construct(); 
		}

		public function insert($table,$Name,$Email,$Phone,$City,$Gender,$Profile_name)
		{
			$sql= "INSERT INTO $table (name,email,phone,city,gender,profile) VALUES ('$Name','$Email','$Phone','$City','$Gender','$Profile_name')";
			$result = $this->conn->query($sql);	
		}

		public function read($table)
		{
			$sql= "SELECT * FROM $table";
			$result = $this->conn->query($sql);
			if($result->num_rows > 0)
		    {
		    	while ($row = $result->fetch_assoc())
		    	{
		    		$data[] = $row;
		    	}
		    	return $data;
		    }
		}

		public function fetch($table,$eid)
		{
			$sql = "SELECT * FROM $table WHERE id = $eid";
		    $result = $this->conn->query($sql);
	
		    if($result->num_rows > 0)
		    {
		    	$row = $result->fetch_assoc();
		    }
		    return $row;
		}

		public function update($table,$Id,$Name,$Email,$Phone,$City,$Gender,$File_name)
		{
			$sql ="UPDATE $table SET name='$Name',email='$Email',phone='$Phone',city='$City',gender='$Gender',profile= '$File_name' WHERE id = $Id";
			$result = $this->conn->query($sql);
		}

		public function delete($table,$id)
		{
			$this->conn->query("DELETE FROM $table WHERE id = $id") or die("Data is not deleted: " .$this->conn->error);
		}
	}
?>