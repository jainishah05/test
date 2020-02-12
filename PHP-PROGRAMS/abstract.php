<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS Abstract-Keyword</title>
</head>
<body>
	<h2>Abstract-Keyword Demo</h2>
	<?php 
		abstract class master
		{
			abstract function show($value);
		}

		class slave extends master
		{
			function show($value)
			{
				return $this->value = $value;
			}
		}
		
		$obj = new slave();
		echo "<p style='color: blue'>".$obj-> show("Blue colored text")."<br>";

		$obj = new slave();
		echo "<p style='color: red'>".$obj-> show("Red colored text")."<br>";

		$obj = new slave();
		echo "<p style='color: green'>".$obj-> show("Green colored text")."<br>";

		$obj = new slave();
		echo "<p style='color: yellow'>".$obj-> show("Yellow colored text")."<br>";
	?>
</body>
</html>