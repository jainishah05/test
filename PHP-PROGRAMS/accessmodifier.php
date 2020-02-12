<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS AccessModifier</title>
</head>
<body>
	<h2>AccessoModifier Demo</h2>
	<?php 
		class student
		{
			private $value;
			//In PHP,to access private variable getProperty() and to access private function getMethod() is used

			function set_name($name)
			{
				$this->name = $name;
			}
			private function get_name()
			{
				echo "Student Name is ".$this->name."<br>";
			}
		}

		//object creation
		$obj = new student();
		$ref_class = new ReflectionClass($obj);
		$obj->set_name("Jennyyy Shah");
		//accesing private method
		$private_method = $ref_class-> getMethod('get_name');
		$private_method->setAccessible(true);
		echo $private_method->invoke($obj);
		//accessing private variable
		$private_var = $ref_class-> getProperty('value');
		$private_var->setAccessible(true);
		$private_var->setValue($obj,"Hello");
		echo $private_var->getValue($obj);
	?>
</body>
</html>