<!DOCTYPE html>
<html>
<head>
	<title>PHP-PROGRAMS FileUpload</title>
</head>
<body>
	<h2>FileUpload Demo</h2>

	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype = "multipart/form-data" >
		<label><b>Select File to Upload:</b></label> 
		<input type="file" name="fileupload" /><br><br>
		<input type="submit" name="submit" value="Upload file">
	</form>

	<?php
		$target_dir = "opt/lampp/htdocs/PHP-PROGRAMS/uploads";
		if (isset($_POST['submit'])) 
		{
			echo "pressed";
			$file = $_FILES["fileupload"];
			print_r($file); //it displays th name,type of selected file.
			$file_name = $_FILES["fileupload"]["name"];// name of file
			$file_type = $_FILES["fileupload"]["type"];//type of file
			$file_size = $_FILES["fileupload"]["size"];//size of file
			$file_tmploc = $_FILES["fileupload"]["tmp_name"];//temp-loc of file
			$file_store = "uploads/".$file_name;//store a file in a folder

			move_uploaded_file($file_tmploc, $file_store); //moves selected file to upload folder
		}
	?>
</body>
</html>