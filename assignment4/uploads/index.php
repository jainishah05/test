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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
</head>
<body>
	<header>
		<?php include('header.php'); ?>
	</header>

	<section class="showcase p-5">
		<div class="container mb-5">
			<h1><b>Site Name</b></h1>
		</div>
		<div class="row">
			<div class="col-sm-2">
				<a href="index.php" style="color: #77b8dc" class="btn btn-light border">Web Site</span></a>
			</div>
			<div class="col-sm-2">
				<a href="create_category.php" style="color: #77b8dc" class="btn btn-light border">Create Category</span></a>
			</div>
			<div class="col-sm-2">
				<a href="manage_category.php" style="color: #77b8dc" class="btn btn-light border">Manage Category</span></a>
			</div>
			<div class="col-sm-2">
				<a href="add_product.php" style="color: #77b8dc" class="btn btn-light border">Create Product</span></a>
			</div>
			<div class="col-sm-2">
				<a href="manage_product.php" style="color: #77b8dc" class="btn btn-light border">Manage Product</span></a>
			</div>
		</div>
	</section>


	<section class="slide-img">
		<div id="demo" class="carousel slide" data-ride="carousel">

		  <!-- Indicators -->
		  <ul class="carousel-indicators">
		    <li data-target="#demo" data-slide-to="0" class="active"></li>
		    <li data-target="#demo" data-slide-to="1"></li>
		    <li data-target="#demo" data-slide-to="2"></li>
		  </ul>
		  
		  <!-- The slideshow -->
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="images/slide-1.jpg" alt="slide-1" width="100%" style="max-width: 100%; height: 650px">
		    </div>
		    <div class="carousel-item">
		      <img src="images/slide-2.jpg" alt="slide-2" width="100%" style="max-width: 100%; height: 650px">
		    </div>
		    <div class="carousel-item">
		      <img src="images/slide-3.jpg" alt="slide-3" width="100%" style="max-width: 100%; height: 650px">
		    </div>
		  </div>
		  
		  <!-- Left and right controls -->
		  <a class="carousel-control-prev" href="#demo" data-slide="prev">
		    <span class="carousel-control-prev-icon"></span>
		  </a>
		  <a class="carousel-control-next" href="#demo" data-slide="next">
		    <span class="carousel-control-next-icon"></span>
		  </a>
		</div>
	</section>

	

	<?php include('footer.php'); ?>

<script type="text/javascript" src="js/bootstrap.min.js" ></script>
<script src="js/jquery3.2.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap@.min.js"></script>
</body>
</html>