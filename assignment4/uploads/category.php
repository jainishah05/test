<?php
	
	include_once 'connection.php';
	
	class category extends connection
	{	
		public function __construct()
		{
			parent::__construct(); 
		}

		public function insert($category,$table)
		{
			$sql= "INSERT INTO $table (category) VALUES ('$category')";
			if($this->conn->query($sql) === true)
			{
				echo "New record created successfully";
			}
			else
			{
				die("Records are not inserted".$this->conn->error);
			}
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

		public function fetch($table,$id)
		{
			$sql = "SELECT * FROM $table WHERE id = $id";
		    $result = $this->conn->query($sql);

		    if($result->num_rows > 0)
		    {
		    	$row = $result->fetch_assoc();
		    }
		    return $row;
		}

		public function update($table,$category,$id)
		{
			$this->conn->query("UPDATE $table SET category='$category' WHERE id = $id") or die($this->conn->error());
		}

		public function delete($table,$id)
		{
			$this->conn->query("DELETE FROM $table WHERE id = $id") or die("Data is not deleted: " .$this->conn->error);
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