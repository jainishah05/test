<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS Array</title>
</head>
<body>
	<h2>Array Demo</h2>
	<?php
		$numbers = array(1,46,59,3,89,34,23,76,30);

		echo "<p>First value of the array:$numbers[0]</p>";
		echo "All the numbers are below:<br>";
		print_r($numbers);
		echo "Detailed description about array<br>";
		var_dump($numbers);

		$size = count($numbers);

		for($i = 0;$i < $size; $i++)
		{
			echo "<br>$numbers[$i]";
		}
		// indexed array
		echo "<br>".$numbers[0]."<br>";
		echo $numbers[1]."<br>";
		echo $numbers[2]."<br>";
		echo $numbers[3]."<br>";

		// Associative array
		$age = array('Jaini' => 20,'Janvi' => 18,'vishu' => 25,'Akshu' => 15);
		echo "Age of Janvi is ".$age['Janvi']."<br>";

		foreach ($age as $key => $value) {
			echo "Age of ".$key." is ".$value."<br>";
		}

		// Two Dimensional array
		$student = array
		(
			array("jaini",99),
			array("janvi",95),
			array("pankti",100),
			array("vishu",158),
			array("akshu",99),
		);

		print_r($student);
		sort($student);
		// There are other sorting methods like rsort()-for descending order,asort()-for sort associative value in associative array & ksort()-for key.
		echo "<br>";
		echo $student[2][0]."<br>";
		echo $student[2][1]."<br>";

		for($i = 0; $i< 5 ; $i++) {
			echo "<h4> Student".$i."</h4><br>";
			for($j = 0; $j< 2 ; $j++){
				echo "<ul>";
				echo "<li> Student details: ".$student[$i][$j]."</li><br>";
				echo "</ul>";
			}
		}
	?>
	
</body>
</html>