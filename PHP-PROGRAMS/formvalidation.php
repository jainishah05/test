<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	.error
	{
		color: #ff3258;
	}
</style>
	<title>PHP-PROGRAMS FormValidation</title>
</head>
<body>

	<?php
		// collect value of input field
		$name = $email = $site = $gender = "";
		$name_err = $email_err = $site_err = $gender_err = "";

		if($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			if($_POST["name"] == "")  //or use empty() to check that input type is empty or not
			{
				$name_err = "* Name field is Required";
			}
			else
			{
				$name = test($_POST["name"]);
				if (!preg_match("/^[a-zA-Z ]*$/", $name)) 
				{
					$name_err = "* Only Letters & White space are allowed";
				}
			}	
		}

		if($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			if($_POST["email"] == "")
			{
				$email_err = "* Email field is Required";
			}
			else
			{
				$email = test($_POST["email"]);
				if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)) 
				{
					$email_err = "* Invalid URL";
				}
			}	
		}

		if($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			if($_POST["site"] == "")
			{
				$site = "";
			}
			else
			{
				$site = test($_POST["site"]);
				// preg_match() is used to perform a pattern match on a string. It returns true if a match is found and false if a match is not found
				if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $site)) 
				{
					$site_err = "* Invalid URL";
				}
			}	
		}

		if($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			if(empty($_POST["gender"]))
			{
				$gender_err = "* Gender field is Required";
			}
			else
			{
				$gender = test($_POST["gender"]);
			}	
		}

		function test($data)
		{
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>
<!-- Form part -->
	<h2>FormValidation Demo</h2>

	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<label>Name:</label> 
		<input type="text" name="name" />
		<span class="error"> <?=$name_err;?> </span>
		<br><br>
		<label>Email:</label> 
		<input type="text" name="email" />
		<span class="error"> <?=$email_err;?> </span>
		<br><br>
		<label>Website:</label>
		<input type="text" name="site" />
		<span class="error"> <?=$site_err;?> </span>
		<br><br>
		<label>Gender:</label> 
		<input type="radio" name="gender" value="Male" >Male
		<input type="radio" name="gender" value="female" >Female
		<span class="error"> <?=$gender_err;?> </span>
		<br><br>
		<input type="submit" name="submit" value="submit" />
	</form>
<!------------------------------------------------------------------------------------------>
<!-- Printing Fetch Data -->
	<h3> Form-Data:</h3>
	<?php
	echo "<b>UserName is: </b>".$name."<br>";
	echo "<b>EmailID is: </b>".$email."<br>";
	echo "<b>Gender is: </b>".$gender."<br>";
	echo "<b>Website is: </b>".$site."<br>";
	?>

</body>
</html>