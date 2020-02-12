<?php

	session_start();

	$name = "";
	$loc = "";
	$update = false;
	$id = 0;
	$conn = new mysqli("localhost","root","","CRUD") or die("Connection failed: " .$conn->connect_error);

    if(isset($_POST['save']))
    {
    	$name = $_POST["name"];
    	$loc = $_POST["loc"];

	    $sql = "INSERT INTO data (name,location) VALUES ('$name', '$loc')";

		if ($conn->query($sql) === TRUE) 
		{
		    echo "New record created successfully";
		} 
		else 
		{
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$_SESSION["message"] = "Records has been saved!";
		$_SESSION["msg_type"] = "success";

		header("location: index.php");
	}

	if(isset($_GET['delete']))
    {
    	$id = $_GET['delete'];

	    $conn->query("DELETE FROM data WHERE id = $id") or die("Data is not deleted: " .$conn->error);

	    $_SESSION["message"] = "Records has been deleted!";
		$_SESSION["msg_type"] = "danger";

		header("location: index.php");
	}

	if(isset($_GET['edit']))
    {
    	$id = $_GET['edit'];
    	$update = true;
	    $result = $conn->query("SELECT * FROM data WHERE id = $id") or die($conn->error());

	    if($result-> num_rows > 0)
	    {
	    	$row = $result->fetch_array();
	    	$name = $row['name'];
	    	$loc = $row['location'];
	    }
	} 

	if(isset($_POST['update']))
    {
    	$id = $_POST['id'];
    	$name = $_POST["name"];
    	$loc = $_POST["loc"];
	    $conn->query("UPDATE data SET name='$name',location='$loc' WHERE id = $id") or die($conn->error());

	    $_SESSION["message"] = "Records has been updated!";
		$_SESSION["msg_type"] = "warning";

		header("location: index.php");
	} 


?>