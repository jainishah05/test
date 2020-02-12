<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS ForLoop</title>
</head>
<body>
	<h2>For Loop Demo</h2>
	<?php

	$colors = array('red','green','blue','yellow');
		for($j = 0;$j < 10; $j++)
		{
			$count = $count + 1;
		}

		echo "Count: $count <br>";

		for($i = 0;$i < 10; $i++)
		{
			if($i % 2 == 0)
			{
				echo '<b style="color: blue"> even </b> <br>';
			}
			else
			{
				echo '<b style="color: gray"> odd </b><br>';
			}
		}

		foreach ($colors as $value) {
			if ($value == "red") {
				echo '<label style="color: red">'.$value.'</label> <br>';
			} elseif($value == "green"){
				echo '<label style="color: green">'.$value.'</label> <br>';
			} elseif($value == "blue"){
				echo '<label style="color: blue">'.$value.'</label> <br>';
			} else{
				echo '<label style="color: yellow">'.$value.'</label> <br>';
			}
		}
	?>
	
</body>
</html>