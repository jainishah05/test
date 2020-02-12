<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS FormHandling</title>
</head>
<body>
	<h2>FormHandling Demo</h2>

	<?php
		echo "<h4> Basics of JavaScript:</h4><br>";
		//echo readfile('javascript');

		$file = fopen('javascript', 'r');
		echo fread($file, filesize('javascript'))."<br><br>";
		fclose($file);

		$file = fopen('javascript', 'r') or die("unable to open file!"); //if file doesn't exits,then die() display a message written inside it!
		echo "<b>fgets demo</b>: ".fgets($file)."<br>"; //it reads first line of the file!
		echo "<b>fgetc demo</b>: ".fgetc($file)."<br>"; //used to read single character from a file!
		fclose($file);
		
		//in fopen() 'w'-is used to create a file and we can write there,using fwrite().
		$newfile = fopen("newfile.txt","w") or die("unable to open file!");
		fwrite($newfile, "Hello,I am created using fopen and fwrite!! ");
		fclose($newfile);
		echo "<b>Created File: </b>".readfile('newfile.txt')."<br>";

		//append something in new created file!
		$newfile = fopen("newfile.txt","a") or die("unable to open file!");
		fwrite($newfile, "Now My creator used 'a' mode to append text into me!!");
		fclose($newfile);
		echo "<b>After Appending: </b>: ".readfile('newfile.txt');
	?>
	
</body>
</html>