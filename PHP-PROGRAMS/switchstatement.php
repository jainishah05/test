<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS SwitchStatement</title>
</head>
<body>
	<h2>Switch Statement Demo</h2>
	<?php

		$marks = 80;
		switch($marks)
		{
			case 80:
					echo '<h4 style = "color:blue"> first Class! </h4>';
					break;
			case 60:
					echo '<h4 style = "color:green"> Pass Class! </h4>';
					break;
			default:
					echo '<h4 style = "color:red"> You have failed this exam! </h4>';
		}

		$marks = 60;
		switch($marks)
		{
			case 80:
					echo '<h4 style = "color:blue"> first Class! </h4>';
					break;
			case 60:
					echo '<h4 style = "color:green"> Pass Class! </h4>';
					break;
			default:
					echo '<h4 style = "color:red"> You have failed this exam! </h4>';
		}
	?>

</body>
</html>