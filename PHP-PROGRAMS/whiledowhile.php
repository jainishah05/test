<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS While/DoWhile Loop</title>
</head>
<body>
	<h2>While/DoWhile Loop Demo</h2>
	<?php
		$count = 0;
		while($count < 10)
		{
			echo '<p style = "text-align: center">Count:'.$count.'</p>';
			$count++;
		}
			echo "while loop exits<br>";
		do
		{
			echo "it will do atleast once before checking a condition";
		}while($count < 10)
	?>

</body>
</html>