<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS Cookie</title>
</head>
<body>
	<h2>Cookie Demo</h2>

	<!-- cookie is used to store some useful information on client browser!! -->
	<?php
		$cookie_name = "user";
		$cookie_value = "john joe";

		//setcookie is used to create a cookie.
		setcookie($cookie_name, $cookie_value, time() + (84600*30)); //84600 seconds= 1 day
		//modifying cookie value.
		$cookie_value = "alan doeeee";
		setcookie($cookie_name, $cookie_value, time() + (84600*30));

		if (!isset($_COOKIE[$cookie_name])) 
		{
			echo "Cookie name <b>".$cookie_name."</b> is not set!!<br>";
		}
		else
		{
			echo "cookie is set!!<br>";
			echo "Cookie name is <b>".$cookie_name."</b>.<br>";
			echo "Cookie value is <b>".$cookie_value."</b>.<br>";
		}
		//by setting expiration time in setcookie method we can delete a cookie.
	?>

</body>
</html>