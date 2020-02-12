<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS Constructor-Destructor</title>
</head>
<body>
	<h2>Constructor-Destructor Demo</h2>
	<?php 
		class student
		{
			public $name;

			//In PHP,__constructor() function is used to create a constructor.and when a object is created,it'll call automatically.

			function __construct($name)
			{
				$this->name = $name;
			}
			function __destruct()
			{
				echo "Student Name is ".$this->name."<br>s";
			}
		}

		//object creation
		$obj = new student("Jaini Shah");
		$obj1 = new student("Janvi Koshti");
	?>
</body>
</html>