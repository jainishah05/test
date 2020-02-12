<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS Class-Object</title>
</head>
<body>
	<h2>Class-Object Demo</h2>
	<?php 
		class master
		{
			protected $value = "abcd";
			protected function set_name($name)
			{
				$this->name = $name;
			}
		}

		class slave extends master
		{
			function get_name()
			{
				$this->set_name("Jaini shah");
				return $this->name;
			}
		}
		
		//we can access protected members of class by defining them into child class method.
		$obj = new slave();
		echo $obj-> get_name();
	?>
</body>
</html>