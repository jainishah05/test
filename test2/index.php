<?php
	include_once 'connection.php';
	include_once 'employee.php';

	$ob = new employee();

	$id = 0;
	$update = "";
	$name = "";
	$email = "";
	$phone = "";
	$city = "";
	$gender = "";
	$profile = "";
	$errors = "";
	$target_dir = "/opt/lampp/htdocs/test2/uploads";

	
	if(isset($_POST['submit']))
	{
	    if(isset($_FILES["fileupload"]))
	    {
	    	//file upload
			$file = $_FILES["fileupload"];
			$file_name = $_FILES["fileupload"]["name"];
			$file_size = $_FILES["fileupload"]["size"];
			$file_type = $_FILES["fileupload"]["type"];
			$file_tmploc = $_FILES["fileupload"]["tmp_name"];
			$target_file = $target_dir . basename($file_name);
			$file_ext=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$file_store = "uploads/".$file_name;
	    	$expensions = array("jpeg","jpg","png");
      
	      	if(in_array($file_ext,$expensions) === false)
	      	{
	         	$errors="Extension not allowed, please choose a JPEG or PNG file.";
	      	}
	      	else 
	      	{
			    $name = $_POST["name"];
			    $email = $_POST["email"];
			    $phone = $_POST["phone"];
			    $city = $_POST["city"];
			    $gender = $_POST["gender"];
	         	$profile_name = $_FILES["fileupload"]["name"];
	         	move_uploaded_file($file_tmploc,$file_store);
				$ob->insert('employee',$name,$email,$phone,$city,$gender,$profile_name);
				header("location: manage_employee.php");
	      	}
	    }
	}

	if(isset($_GET['edit']))
    {
    	$update = true;
	    $id = $_GET['edit'];
	    $fetch_data = $ob->fetch('employee',$id);
	    $name = $fetch_data['name'];
	    $email = $fetch_data['email'];
	    $phone = $fetch_data['phone'];
	    $city = $fetch_data['city'];
	    $gender = $fetch_data['gender'];
	    $profile = $fetch_data['profile'];
	}

	if(isset($_POST['update']))
    {
    	if(isset($_FILES["fileupload"]["name"]) && ($_FILES["fileupload"]["name"] != ""))
	    {
	    	//file upload
			$file = $_FILES["fileupload"];
			$file_name = $_FILES["fileupload"]["name"];
			$file_size = $_FILES["fileupload"]["size"];
			$file_type = $_FILES["fileupload"]["type"];
			$file_tmploc = $_FILES["fileupload"]["tmp_name"];
			$file_store = "uploads/".$file_name;
			unlink("uploads/".$profile);
			move_uploaded_file($file_tmploc,$file_store);
			$id = $_POST['id'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$city = $_POST['city'];
			$gender = $_POST['gender'];
			$ob->update('employee',$id,$name,$email,$phone,$city,$gender,$file_name);
		    header("location: manage_employee.php");
	    }
	    else
	    {
	    	$file_name = $profile;
			$id = $_POST['id'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$city = $_POST['city'];
			$gender = $_POST['gender'];
			$ob->update('employee',$id,$name,$email,$phone,$city,$gender,$file_name);
		    header("location: manage_employee.php");
	    }
	}
?>	

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="bootstrap.css">
<link rel="stylesheet" type="text/css" href="custom.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<body>

<form id="employee" class="border test2" method="post" enctype = "multipart/form-data">
	<center>
		<h2> Employee Form </h2>
	</center>	
	<input type="hidden" name="id" value="<?php echo $id; ?>">
				<div class="form-group">
					<label>Name:</label>
					<input type="text" class="form-control" name="name" placeholder="Enter your Name" value="<?php echo $name;?>" autocomplete="off" />
				</div>
				<div class="form-group">
					<label>Email:</label>
					<input type="text" class="form-control" name="email" placeholder="Enter your ID" value="<?php echo $email;?>" autocomplete="off" />
				</div>
				<div class="form-group">
					<label>Phone No:</label>
					<input type="tel" class="form-control" name="phone" placeholder="Enter your Number" value="<?php echo $phone;?>" autocomplete="off" />
				</div>
				<div class="form-group">
					<label>City:</label>
      				<select class="form-control" name="city">
      					<option> </option>
      					<?php 
      						if($city == "Ahmedabad"){
      					?>
        				<option value="Ahmedabad" selected>Ahmedabad</option>
        				<? }else{ ?>
        				<option value="Ahmedabad">Ahmedabad</option>
        				<? 
        					} 
        					if($city == "Gandhinagar"){
        				?>
        				<option value="Gandhinagar" selected>Gandhinagar</option>
        				<? }else{ ?>
        				<option value="Gandhinagar">Gandhinagar</option>
        				<? 
        					} 
        					if($city == "Surat"){
        				?>
        				<option value="Surat" selected>Surat</option>
        				<? }else{ ?>
        				<option value="Surat">Surat</option>
        				<? 
        					} 
        					if($city == "Nadiad"){
        				?>
        				<option value="Nadiad" selected>Nadiad</option>
        				<? }else{ ?>
        				<option value="Nadiad">Nadiad</option>
        				<? } ?>
      				</select>
				</div>
				<div class="form-group">
					<label>Gender:</label>
					<div class="radio">
						<?php 
      						if($gender == "Male"){
      					?>
						<label><input type="radio" name="gender" value="Male" checked/>Male</label>
						<? }else{ ?>
						<label><input type="radio" name="gender" value="Male" />Male</label>
						<? 
        					} 
        					if($gender == "Female"){
        				?>
        				<label><input type="radio" name="gender" value="Female" checked/>Female</label>
        				<? }else{ ?>
						<label><input type="radio" name="gender" value="Female" />Female</label>
						<? } ?>
					</div>
				</div>
				<div class="form-group">
					<label>Upload Profile:</label><br>
					<?php if($update == true): ?>
					<img id="image" src="uploads/<?php echo $profile; ?>" width = "95" height = "70" ><lable><?php echo $profile; ?></lable>
					<input type="file" class="form-control" name="fileupload" >
					<? else: ?>
					<input type="file" class="form-control" name="fileupload" >
					<? endif; ?>
					<span class="error"> <?=$errors;?> </span>
				</div>	
		    <hr>
		    <center>
		    	<?php if($update == true):?>
					<button type="submit" class="cbtn mt-2" id="update" onclick="return update_msg(ev);" name="update"><b>Update</b></button>
				<?php else: ?>		
		    		<button type="submit" name="submit" class="cbtn mt-2"><b>Submit</b> </button>
		    	<?php endif; ?>	
		    </center>
		</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script>

<script src="jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="bootstrap.min.js" ></script>
<script src="bootstrap@.min.js"></script>

<script type="text/javascript" src="employee.js"></script>

</body>
</html>