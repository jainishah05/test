<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS Static-Keyword</title>
</head>
<body>
	<h2>Static-Keyword Demo</h2>
	<?php 
		class constDemo
		{
			static $staticvar = "I'm a Static Variable!";
			static $staticfun = "I'm a Static Function!";

			function show()
			{
				echo "To access constant inside a class self keyword is used.<br>";
				echo self::$staticvar."<br>";
			}

			static function print($value)
			{
				echo "<b>".self::$staticfun."</b><br>";
				$valuebak = $value;
				return $valuebak;
			}
		}
	
		$obj = new constDemo();
		echo $obj-> show();

		echo "To access constant outside a class classname is used.<br>";
		echo constDemo::$staticvar."<br>";

		echo constDemo::print("Static Function called directly by a class name,without creating an object!!");
	?>
</body>
</html>