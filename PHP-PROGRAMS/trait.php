<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS Trait-Keyword</title>
</head>
<body>
	<h2>Trait-Keyword Demo</h2>
	<?php 
		trait message1 
		{
			public function msg1($msg) 
			{ 
				$this->msg = $msg;
				return $this->msg;
	  		}
		}

		class Welcome 
		{
			use message1;
		}

		class ex 
		{
			use message1;
		}

		$obj = new Welcome();
		echo $obj->msg1("OOP is fun")."<br>";
		$obj = new ex();
		echo $obj->msg1("PHP is fun");
	?>
</body>
</html>