<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS Final-Keyword</title>
</head>
<body>
	<h2>Final-Keyword Demo</h2>
	<?php 
		class constDemo
		{
			const CONSTANT = "I'm Constant value!";

			function show()
			{
				echo "To access constant inside a class self keyword is used.<br>";
				echo self::CONSTANT."<br>";
			}
		}
	
		$obj = new constDemo();
		echo $obj-> show();

		echo "To access constant outside a class classname is used.<br>";
		echo constDemo::CONSTANT;
	?>
</body>
</html>