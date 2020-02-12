<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS Date Functions</title>
</head>
<body>
	<h2>Date Functions Demo</h2>
	<!-- include() is used to include another file.include() & require() both includes file.but require is use when a file is required by app -->
	<?php include('index.php'); ?>
	<?php
		echo "<b>Today's date: </b>".date("d")."<br>";
		echo "<b>Today's month: </b>".date("m")."<br>";
		echo "<b>Today's year: </b>".date("y")."<br>";
		echo "<b>Today's day: </b>".date("l")."<br>";
		echo "<b>Today's Full date: </b>".date("d/m/y")."<br>";
		echo "<b>Today's time(based on Default Time-zone): </b>".date("h:i:sa")."<br>"; //s for seconds and a for am/pm.
		date_default_timezone_set("Asia/Kolkata");
		echo "<b>Today's time(based on India's Time-zone): </b>".date("h:i:sa")."<br>";

		//is used to create a custom date nd time.it takes parameters like(hour, minute, second, month, day, year).
		$d = mktime(13,27,55,06,05,1999);
		echo "<b>Custom date: </b>".date("d-m-y h:i:sa",$d)."<br>";

		//is used to create a custom date from a string.
		$d1 = strtotime("12:23pm 5th june 2000");
		echo "<b>Custom date from String: </b>".date("d-m-Y h:i:sa",$d1)."<br>"; //Y-display full year rather than last two digits.
	?>

</body>
</html>