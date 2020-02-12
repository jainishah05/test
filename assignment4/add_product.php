<?php
	include_once 'connection.php';
	include_once 'category.php';
	include_once 'product.php';

	$ob = new category();
	$pobj = new product();

	$id = 0;
	$update = "";
	$pname = "";
	$price = "";
	$img = "";
	$category = "";
	$errors = "";
	$target_dir = "/opt/lampp/htdocs/assignment4/uploads";
	$uploadOk = 1;

	
	if(isset($_POST['submit']))
	{
	    if(isset($_FILES["fileupload"]))
	    {
	    	//file upload
	    	$errors = array();
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
			    $pname = $_POST["pname"];
			    $price = $_POST["price"];
			    $cid = $_POST["category"];
	         	$image_name = $_FILES["fileupload"]["name"];
	         	move_uploaded_file($file_tmploc,$file_store);
				$pobj->insert('product',$pname,$image_name,$price,$cid);
				header("location: manage_product.php");
	      	}
	    }
	}

	if(isset($_GET['edit']))
    {
    	$update = true;
	    $id = $_GET['edit'];
	    $fetch_data = $pobj->fetch('product',$id);
	    $img = $fetch_data['image'];
	    $pname = $fetch_data['name'];
	    $price = $fetch_data['price'];
	    $category = $fetch_data['category_id'];
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
			unlink("uploads/".$img);
			move_uploaded_file($file_tmploc,$file_store);
			$id = $_POST['id'];
			$product = $_POST['pname'];
			$p_price = $_POST['price'];
			$c_id = $_POST['category'];
			$pobj->update('product',$id,$product,$p_price,$file_name,$c_id);
		    header("location: manage_product.php");
	    }
	    else
	    {
	    	$file_name = $img;
			$id = $_POST['id'];
			$product = $_POST['pname'];
			$p_price = $_POST['price'];
			$c_id = $_POST['category'];
			$pobj->update('product',$id,$product,$p_price,$file_name,$c_id);
		    header("location: manage_product.php");
	    }

	}
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link href="css/responsive.css" rel="stylesheet" />
  	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
</head>
<body>
	<header>
		<?php include('header.php'); ?>
	</header>

	<section class="showcase p-5">
		<div class="container">
			<?php if($update == true): ?>
			<h1><b>Edit&nbsp;Product</b></h1>
			<?php else: ?>
			<h1><b>Add&nbsp;Product</b></h1>
			<?php endif; ?>
		</div>
	</section>

	<section class="form">
		<form id="add_product" class="border product-form" method="post" name="product" enctype = "multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
		    <div class="form-group">
					<label>Product Name:</label>
					<input type="text" class="form-control" name="pname" placeholder="Enter Product Name" value="<?php echo $pname;?>" autocomplete="off" />
				</div>
				<div class="form-group">
					<label>Product Price:</label>
					<input type="text" class="form-control" name="price"  value="<?php echo $price;?>"placeholder="Enter Product Price" autocomplete="off" />
				</div>
				<div class="form-group">
					<label>Upload Image:</label><br>
					<?php if($update == true): ?>
					<img id="image" src="uploads/<?php echo $img; ?>" width = "100" height = "80" ><lable name="img"><?php echo $img; ?></lable>
					<input type="file" class="form-control" name="fileupload" >
					<? else: ?>
					<input type="file" class="form-control" name="fileupload" >
					<? endif; ?>
					<span class="error"> <?=$errors;?> </span>
				</div>	
				<div class="form-group">
					<label>Category:</label>
      				<select class="form-control" name="category">
      				<?php if($update == true): ?>
      					<?php
						$mydata = $ob->read('add_category');

						foreach($mydata as $data)
						{
							if($data['id'] == $category)
							{
						?>
        				<option value="<?php echo $category; ?>"><?php echo $data['category']; ?></option>
        				<?
        					}
        				}	
        				foreach($mydata as $data)
						{
						?>
        				<option value="<?php echo $data['id']; ?>"><?php echo $data['category']; ?></option>
	      				<?		
						}		
						?>
					<?php else: ?>
        				<option> </option>
						<?php
							$mydata = $ob->read('add_category');

							foreach($mydata as $data)
							{
						?>
        				<option value="<?php echo $data['id']; ?>"><?php echo $data['category']; ?></option>
	      				<?php		
							}		
						?>
					<? endif; ?>	
      				</select>
				</div>
		    <hr>
		    <center>
		    	<?php if($update == true): ?>
					<button type="submit" class="cbtn mt-2" name="update"><b>Update</b><img src="images/icon4.png"> </button>
				<?php else: ?>		
		    		<button type="submit" name="submit" class="cbtn mt-2"><b>Submit</b> <img src="images/icon4.png"> </button>
		    	<?php endif; ?>	
		    </center>
		</form>
	</section>

	<?php include('footer.php'); ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script>

<script src="js/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="js/bootstrap.min.js" ></script>
<script src="js/bootstrap@.min.js"></script>

<script type="text/javascript" src="js/product.js"></script>

</body>
</html>