<!-- a session refers to a limited time of communication between two systems. Some sessions involve a client and a server, while other sessions involve two personal computers. A common type of client/server session is a Web or HTTP session -->
<!-- in PHP,a session is a way to store information (in variables) to be used across multiple pages -->

<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS Session</title>
</head>
<body>
	<h2>Session Demo</h2>
	<?php
		//displaying session variables
		//echo $_SESSION["fruit"]."<br>";
		//echo $_SESSION["vegetable"]."<br>";

		//modifying session variable by overwriting it.
		$_SESSION["fruit"] = "Mango";
		print_r($_SESSION);

		session_unset(); //remove all session variables
		echo "<br>after using session_unset() method: <br>";
		print_r($_SESSION);

		session_destroy(); //destroys the session.
		//echo $_SESSION["fruit"];
	?>

</body>
</html>