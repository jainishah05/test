<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS IfStatement</title>
</head>
<body>
	<h2>If Statement Demo</h2>
	<?php
		$marks = 50;
		//===,==,<,>,<=,>=
		if ($marks >= 50) {
			echo '<h4 style = "color:green"> You have passed this exam! </h4>';
		} else {
			echo '<h4 style = "color:red"> You have failed this exam! </h4>';
		}
		
		$marks = 30;
		//===,==,<,>,<=,>=
		if ($marks >= 50) {
			echo '<h4 style = "color:green"> You have passed this exam! </h4>';
		} else {
			echo '<h4 style = "color:red"> You have failed this exam! </h4>';
		}
	?>

</body>
</html>