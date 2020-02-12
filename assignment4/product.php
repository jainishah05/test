<?php
	
	include_once 'connection.php';
	
	class product extends connection
	{	
		public function __construct()
		{
			parent::__construct(); 
		}

		public function insert($table,$name,$image,$price,$category_id)
		{
			$sql= "INSERT INTO $table (name,image,price,category_id) VALUES ('$name','$image','$price','$category_id')";
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

		public function fetch($table,$pid)
		{
			$sql = "SELECT * FROM $table WHERE product_id = $pid";
		    $result = $this->conn->query($sql);
	
		    if($result->num_rows > 0)
		    {
		    	$row = $result->fetch_assoc();
		    }
		    return $row;
		}

		public function update($table,$id,$pname,$price,$img,$cid)
		{
			$this->conn->query("UPDATE $table SET name='$pname',image='$img',price='$price',category_id='$cid' WHERE product_id = $id") or die($this->conn->error());
		}

		public function delete($table,$id)
		{
			$this->conn->query("DELETE FROM $table WHERE product_id = $id") or die("Data is not deleted: " .$this->conn->error);
		}

		public function count($table)
		{
			$sql= "SELECT * FROM $table";
			$result = $this->conn->query($sql);
			return $result;
		}

		public function get_lim_record($table,$start,$lim)
		{
			$sql= "SELECT * FROM $table LIMIT $start,$lim";
			$result = $this->conn->query($sql);
		    return $result;
		}

	}
?>