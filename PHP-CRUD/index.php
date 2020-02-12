<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<title></title>
	<style type="text/css">
		.table-div
		{
			margin-top: 50px;
		}

		.table th,td
		{
			text-align: center;
		}
	</style>
</head>
<body>
	<?php require_once('process.php'); ?>
	<?php 
	if (isset($_SESSION["message"])): ?>

	<div class="alert alert-<?=$_SESSION['msg_type']?>">
		<?php
			echo $_SESSION["message"]; 
			unset($_SESSION["message"]); 
		?>
	</div>
	<?php endif; ?>

	<div class="container">
		<?php 
			$conn = new mysqli("localhost","root","","CRUD") or die("Connection failed: " .$conn->connect_error);

			$sql = "SELECT * FROM data";
			$result = $conn->query($sql);
			//print_r($row);
		?>
		
		<form action="process.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class = "row">
				<div class="form-group col-sm-4">
					<label>Name:</label>
					<input type="text" class="form-control" name="name" value="<?php echo $name;?>" placeholder="Enter Name" />
				</div>
			</div>
			<div class = "row">	
				<div class="form-group col-sm-4">
					<label>Location:</label>
					<input type="text" class="form-control" name="loc" value="<?php echo $loc;?>" placeholder="Enter Location"/>
				</div>
			</div>	
			<div class="form-group">
				<?php if($update == true): ?>
					<button type="submit" class="btn btn-info" name="update">Update</button>
				<?php else: ?>	
					<button type="submit" class="btn btn-primary" name="save">Save</button>
				<?php endif; ?>		
			</div>
		</form>

		<div class="table-div">
			<table class="table table-hover table-stripped table-responsive">
				<thead>
					<tr>
						<th>Name</th>
						<th>Location</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php while ($row = $result->fetch_assoc()): ?>	
					<tr>
						<td><?php echo $row["name"]; ?></td>
						<td><?php echo $row["location"]; ?></td>
						<td>
							<a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
							<a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				<?php endwhile; ?>	
				</tbody>
			</table>
		</div>
	</div>	
</body>
</html>