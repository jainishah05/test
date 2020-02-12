<?php

class connection
{
	private $host = "localhost";
    private $db_name = "test2";
    private $username = "root";
    private $password = "";
    protected $conn;

    function __construct()
    {
    	$this->conn = new mysqli($this->host,$this->username,$this->password,$this->db_name) or die("Connection failed: " .$this->conn->connect_error);
		 
		return $this->conn;
    }
}

?>