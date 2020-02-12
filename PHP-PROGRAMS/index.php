<!DOCTYPE html>
<html>
<head>
	<title>Programs-index file</title>
</head>
<body>
	<!-- Basic HTML-->
	<h1> HELLO WORLD-PHP PROGRAMS </h1>
	<ul style="list-style-type: circle">
		<li><a href ="ifstatement.php">Simple If Statement</a></li>
		<li><a href ="switchstatement.php">Simple switch Statement</a></li>
		<li><a href ="forloop.php">For Loop</a></li>
		<li><a href ="whiledowhile.php">While & DoWhile Loop</a></li>
		<li><a href ="array.php">Arrays</a></li>
		<li><a href ="strmanip.php">String Manipulation Functions</a></li>
		<li><a href ="usrfun.php">User-Defined Functions</a></li>
		<li><a href ="strictmode.php">Strict Mode</a></li>
		<li><a href ="superglobal.php">SuperGlobals</a></li>
		<li><a href ="formhandle.php">Form Handling</a></li>
		<li><a href ="formvalidation.php">Form Validation</a></li>
		<li><a href ="formvalidation2.php">Form Validation-2</a></li>
		<li><a href ="date.php">Date Functions</a></li>
		<li><a href ="filehandle.php">File Handling</a></li>
		<li><a href ="fileupload.php">File Upload</a></li>
		<li><a href ="cookie.php">Cookie</a></li>
		<li><a href ="session.php">Session</a></li>
		<li><a href ="session1.php">Session1</a></li>
		<li><a href ="class-obj.php">Class-Object</a></li>
		<li><a href ="constructor-destructor.php">Constructor-Destructor</a></li>
		<li><a href ="accessmodifier.php">Access-Modifier</a></li>
		<li><a href ="inheritance.php">Inheritance</a></li>
		<li><a href ="methodoverriding.php">Method Overriding</a></li>
		<li><a href ="final.php">Final Keyword</a></li>
		<li><a href ="class-const.php">Class Constant</a></li>
		<li><a href ="abstract.php">Abstract Keyword</a></li>
		<li><a href ="trait.php">Trait Keyword</a></li>
		<li><a href ="static.php">Static Keyword</a></li>
	</ul>

	<?php
		//printing to HTML using echo
		echo "Hello PHP!!";
		//using HTML tags in php
		echo "<br>";
		echo "second line <br>";
	?>

	<?php
		//declare variable
		$name = "Jaini Shah";
		//echo variable
		echo "<b><i>$name</i></b><br>";
		//use of concatenation operator
		echo "<h3> My Name Is:".$name."</h3>";
		echo "<h3> My Name Is: $name </h3>"
	?>

</body>
</html>