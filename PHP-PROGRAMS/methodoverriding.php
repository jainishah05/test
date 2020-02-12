<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS Method-Overriding</title>
</head>
<body>
	<h2>Method-Overriding Demo</h2>
	<?php 
		class master
		{
			function __construct($value)
			{
				$this->value = $value;
			}

			function show()
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

			function show()
			{
				return $this->value;
			}
		}
		
		$obj = new slave("Method of slave class is called.");
		echo $obj-> show();
	?>
</body>
</html>