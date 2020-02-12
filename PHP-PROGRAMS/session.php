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
		//setting session variables
		$_SESSION["fruit"] = "apple";
		$_SESSION["vegetable"] = "tomato";

		echo "session variables are set!!";
	?>

</body>
</html>