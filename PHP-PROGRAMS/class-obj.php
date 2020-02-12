<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS Class-Object</title>
</head>
<body>
	<h2>Class-Object Demo</h2>
	<?php 
		class user
		{
			public $value = "abcd";
			function set_name($name)
			{
				$this->name = $name;
			}

			function get_name()
			{
				return $this->name;
			}
		}
		class user1
		{
		}
		$ob = new user1();
		$obj = new user();
		$obj-> set_name("Jaini");
		echo $obj-> get_name()."<br>";
		$obj-> set_name("Janvi");
		echo $obj-> get_name()."<br>";
		echo $obj->value."<br>";
		echo $obj->value = "Hey"."<br>"; //changing value of class variable.

		// instanceof keyword is used to check if an object belongs to particular class or not.
		echo (var_dump($obj instanceof user))."<br>";
		echo (var_dump($ob instanceof user))."<br>";
	?>
</body>
</html>