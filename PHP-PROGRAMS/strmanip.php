<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS StringManipulation</title>
</head>
<body>
	<h2>String Manipulation Demo</h2>
	<?php
		$str1 = "jaini";
		$str2 = "shah";
		$str3 = "jaini shah";
		$str4 = "HELLO";

		//concatenation
		echo $str1.' Kapeshkumar '.$str2.'<br>';
		echo "Upper case first letter:".ucfirst($str1).'<br>';
		echo "Upper case first letter of each word:".ucwords($str3).'<br>';
		echo "Repeat String:"." "."ops".str_repeat('s',5).'<br>';
		echo "Upper case:".strtoupper($str3).'<br>';
		echo "Lower case:".strtolower($str4).'<br>';
		echo "position of character:".strpos($str3,' ').'<br>';
		echo "Find character in a given string:".strchr($str3,'s').'<br>';
		echo "Length of a given string:".strlen($str3).'<br>';
		echo "Without trim:"." 1"." 2 3 4 "."5 ".'<br>';
		echo "Both side trim:"." 1".trim(" 2 3 4 ")."5".'<br>';
		echo "Left side trim:"." 1".ltrim(" 2 3 4 ")."5".'<br>';
		echo "Right side trim:"." 1".rtrim(" 2 3 4 ")."5".'<br>';
		echo "String replace:".str_replace("jaini","jenny",$str3).'<br>';
		echo "Sub string:".substr($str3,4,10).'<br>';
		echo "Using string function in another:".strtoupper(str_replace("jaini","jenny",$str3));
	?>

</body>
</html>