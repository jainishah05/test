<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS StrictMode</title>
</head>
<body>
	<h2>StrictMode Demo</h2>
	<?php declare(strict_types=1); //strict requirement
	// with strict mode
		function myFun($a,$b)
		{
			echo $a+$b."<br>";
		}

		myFun(10,"5hello"); 
		myFun(30,56);
		myFun(10,67);
		myFun(92,77);
	?>
</body>
</html>