<?php
	include_once 'connection.php';
	include_once 'category.php';
	$cobj = new category();

	$cname = "";
	$category = "";
	$category_err = "";
	$id = 0;
	$update = "";

	if(isset($_POST['submit']))
    {
	    if($_POST["category"] == "")
	    {
	    	$category_err = "* Category field is Required";
	    }
	    elseif(!preg_match("/^[a-zA-Z ]*$/", $_POST["category"]))
	    {
	    	$category_err = "* Only Letters & White space are allowed";
	    }
	    else
	    {
	    	$cname = $_POST["category"];
		    $cobj->insert($cname,'add_category');
		    header("location: manage_category.php");
	    }
	}

	if(isset($_GET['edit_id']))
    {
    	$update = true;
	    $cid = $_GET['edit_id'];
	    $fetch_data = $cobj->fetch('add_category',$cid);
	    $category = $fetch_data['category'];
	}

	if(isset($_POST['update']))
    {
    	$id = $_POST['id'];
	    $cname = $_POST['category'];
	    
	    $cobj->update('add_category',$cname,$cid);
	    header("location: manage_category.php");
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
	<?php 
		require_once('connection.php');
	?>

	<header>
		<?php include('header.php'); ?>
	</header>

	<section class="showcase p-5">
		<div class="container">
			<?php if($update == true): ?>
			<h1><b>Edit&nbsp;Category</b></h1>
			<?php else: ?>
			<h1><b>Create&nbsp;Category</b></h1>
			<?php endif; ?>	
		</div>
	</section>

	<section class="form">
		<form id="create_category" class="border category-form" method="post">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
		    <div class="form-group">
			    <label for="category">Category Name</label>
			    <input class="form-control w-50" type="text" name="category" id="category" value="<?php echo $category;?>" autocomplete = "off" >
			   <span class="error"> <?=$category_err;?> </span>
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

<script type="text/javascript" src="js/category.js"></script>
</body>
</html>