<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS FormHandling</title>
</head>
<body>
	<h2>FormHandling Demo</h2>

	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<label>Name:</label> 
		<input type="text" name="name" /><br><br>
		<label>Email:</label> 
		<input type="text" name="email" /><br><br>
		<input type="submit">
	</form>


	<?php
		// collect value of input field
		echo "<ul>FORM-DATA: ";
		$name = $_POST["name"];
		$email = $_POST["email"];

		echo "<li> Hello! ".$name."</li><br>";
		echo "<li>Your Mail ID is: ".$email."</li><br>";
		echo "</ul>";
	?>
	<!-- $_GET[] is used for same purpose when form method = "get". -->
</body>
</html>