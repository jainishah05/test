<?php
	include_once 'connection.php';
	include_once 'category.php';
	include_once 'product.php';

	$pob = new product();
	$ob = new category();

	$limit = 5;
	$total_record = $pob->count('product')->num_rows;
	$total_pages = ceil($total_record/$limit);

	if(isset($_GET['page']))
	{
		$pg = $_GET['page'];
	}
	else
	{
		$pg = 1;
	}

	$start_point = ($pg-1) * $limit;

	if(isset($_GET['delete_id']))
    {
	    $id = $_GET['delete_id'];
	    $pob->delete('product',$id);
	}

	if(isset($_POST['delete']))
    {
	    $check_id = $_POST['check'];

	    foreach($check_id as $value)
		{
	        $pob->delete('product',$value);
		}
		header("location: manage_product.php");
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
			<h1><b>Manage&nbsp;Product</b></h1>
		</div>
	</section>

		<form method="post">
		<div class="card m-3">
			<div class="card-header">
				<a href="add_product.php" class="cbtn btn mt-2 float-right"><b>Add Product</b> </a>
				<button type="submit" name="delete" class="cbtn mt-2 float-right"><b>Delete</b></button>
			</div>
			<div class="card-body">
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th><input class="form-control form-control-sm" type="checkbox" id="checkAl"></th>
								<th>Product</th>
								<th>Price</th>
								<th>Image</th>
								<th>Category</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$data = $pob->get_lim_record('product',$start_point,$limit);	

								while($pdata = $data->fetch_assoc())
								{
							?>
							<tr>
								<td> <input class="form-control form-control-sm" name="check[]"  value = "<?php echo $pdata['product_id']; ?>" type="checkbox"> </td>
								<td><?php echo $pdata['name']; ?></td>
								<td><img src="uploads/<?php echo $pdata['image']; ?>" width = "200" height = "150" > </td>
								<td><?php echo $pdata['price']; ?></td>
								<?php
									$mydata = $ob->read('add_category');	

									foreach($mydata as $cdata)
									{
										if($pdata['category_id'] == $cdata['id'])
										{	
								?>
								<td><?php echo $cdata['category']; ?></td>
								<input type="hidden" name="" value="<?php echo $pdata['category_id']; ?>">
								<?php
										}		
									}
								?>	
								<td>
									<a href="add_product.php?edit=<?php echo $pdata['product_id']; ?>" class="btn btn-success"><span class="fa fa-edit"></span></a>
									<a href="manage_product.php?delete_id=<?php echo $pdata['product_id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a>
								</td>
							</tr>
							<?php		
								}
							?>	
						</tbody>
					</table>
			</div>
			<div class="card-footer"> 
				<nav aria-label="Page navigation example">
				  <ul class="pagination">
				  		<?php 
					  		$prev = $pg-1;
							$next = $pg+1;
						?>
					    <li class="page-item <?=($pg <= 1)?'disabled':''?>">
					    	<a class="page-link" href="manage_product.php?page=<?php echo $prev; ?>">Previous</a>
					    </li>
					    <?php
					  		for($i=1;$i<=$total_pages;$i++)
					  		{
				  		?> 
					    <li class="page-item <?=($pg == $i)?'active':'disable'?>">
					    	<a class="page-link" href="manage_product.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
					    </li>
					    <?php } ?> 
					    <li class="page-item <?=($pg == $total_pages)?'disabled':''?>">
					    	<a class="page-link" href="manage_product.php?page=<?php echo $next; ?>">Next</a>
					    </li>
				  </ul>
				</nav>
			</div>
		</div>
		</form>

	<?php include('footer.php'); ?>


<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js" ></script>
<script src="js/jquery3.2.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap@.min.js"></script>


<script>
	$("#checkAl").click(function () {
		$('input:checkbox').not(this).prop('checked', this.checked);
	});
</script>
</body>
</html>