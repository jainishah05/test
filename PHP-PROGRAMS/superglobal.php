<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS SuperGlobals</title>
</head>
<body>
	<h2>SuperGlobals Demo</h2>

	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		Name: <input type="text" name="fname">
		<input type="submit">
	</form>


	<?php

		// $_REQUEST[] super global-used to collect data after submitting an HTML form.
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
		    // collect value of input field
		    echo "FORM-DATA: ";
		    $name = $_REQUEST['fname'];
		    if (empty($name)) {
		        echo "Please Enter a Name!<br>";
		    } else {
		        echo $name;
		    }
		}
		echo "<br> <br>";
		// $_POST[] & $_GET[] are also used to collect data after submitting an HTML form.but $_POST[] is used when in form method="post" is defined and $_GET[] is used when method ="get" is defined.

		// Global keyword
		$a = 23;
		$b = 49;

		function myFun($a,$b)
		{
			// Using this keyword it takes values of $a and $b which is defined outside the function rather that the values passed by calling a function.
			global $a,$b;
			return $a+$b;
		}
		echo myFun(10,20)."<br>";

		// same as there is a GLOBALS[index]-which stores all global variable.
		function Fun($a,$b)
		{
			// Using this it takes values of $a and $b which is defined outside the function rather that the values passed by calling a function.
			echo $GLOBALS['a']+$GLOBALS['b']."<br>";
			echo $a+$b."<br>"; //it takes values passed by calling a function.
		}
		Fun(10,20);

		// $_SERVER[] super global-holds information about headers, paths, and script locations.
		echo $_SERVER['PHP_SELF']."<br>";
		echo $_SERVER['SERVER_NAME']."<br>";
		echo $_SERVER['HTTP_HOST']."<br>";
		echo $_SERVER['HTTP_REFERER']."<br>";
		echo $_SERVER['HTTP_USER_AGENT']."<br>";
		echo $_SERVER['SCRIPT_NAME']."<br>";
	?>
</body>
</html>