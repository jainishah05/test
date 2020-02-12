<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS Function</title>
</head>
<body>
	<h2>Function Demo</h2>
	<?php
	// without strict mode
		function myFun($a,$b)
		{
			return $a+$b;
		}

		echo myFun(10,"5hello")."<br>";

		// it will automatically convert string into integer because the starting value is integer!!

		// Function with return type declaration
		function test($a,$b) :int
		{
			return (int)($a+$b);
		}

		echo test(10,40)."<br>";
		echo test(3.4,5.6)."<br>";
		echo test(1.1,6.5)."<br>";
		echo test(1.9,7.89999);
	?>
</body>
</html>