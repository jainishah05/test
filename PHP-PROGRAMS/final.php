<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS Final-Keyword</title>
</head>
<body>
	<h2>Final-Keyword Demo</h2>
	<?php 
		class master
		{
			function __construct($value)
			{
				$this->value = $value;
			}

			final function show() //using final keyword child class object can not override the method.
			{
				return $this->value;
			}
		}

		class slave extends master
		{
			function __construct($value)
			{
				$this->value = $value;
			}

			//function show()
			function print()
			{
				return $this->value;
			}
		}
		
		$obj = new slave("Method of slave class is called.");
		echo $obj-> print();
	?>
</body>
</html>