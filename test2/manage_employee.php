<?php
	include_once 'connection.php';
	include_once 'employee.php';

	$ob = new employee();

	if(isset($_GET['delete_id']))
    {
	    $id = $_GET['delete_id'];
	    $ob->delete('employee',$id);
	}

	if(isset($_POST['delete']))
    {
	    $check_id = $_POST['check'];

	    foreach($check_id as $value)
		{
	        $ob->delete('employee',$value);
		}
		header("location: manage_employee.php");
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"></link>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css"></link>

<body>

<form method="post">
	<div class="card m-3">
		<div class="card-header">
			<h1 class="p-0 m-0"> Employee Data </h1>
			<a href="index.php" class="cbtn btn mt-2 pt-2 float-right"><b>Employee</b> </a>
			<button type="submit" name="delete" class="cbtn mt-2 float-right"><b>Delete</b></button>
			</div>
		<div class="card-body">
			<table class="table table-hover table-bordered" id="employee">
				<thead>
					<tr>
						<th><input class="form-control form-control-lg" type="checkbox" id="checkAl"></th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone No</th>
						<th>City</th>
						<th>Gender</th>
						<th>Profile</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$mydata = $ob->read('employee');	

						foreach($mydata as $data)
						{
	
					?>
					<tr>
						<td> <input class="form-control form-control-sm" value="<?php echo $data['id']; ?>" name="check[]" type="checkbox"> </td>
						<td><?php echo $data['name']; ?></td>
						<td><?php echo $data['email']; ?></td>
						<td><?php echo $data['phone']; ?></td>
						<td><?php echo $data['city']; ?></td>
						<td><?php echo $data['gender']; ?></td>
						<td><img src="uploads/<?php echo $data['profile']; ?>" width = "95" height = "70" > </td>
						<td>
							<a href="index.php?edit=<?php echo $data['id']; ?>" class="btn btn-success"><span class="fa fa-edit"></span></a>
							<a href="manage_employee.php?delete_id=<?php echo $data['id']; ?>" id="del" onclick= "return show_warning(this);" class="btn btn-danger"><span class="fa fa-trash"></span></a>
						</td>
					</tr>
					<?php		
						}
					?>	
				</tbody>
			</table>
			</div>
			<div class="card-footer"> 
			
			</div>
		</div>
	</form>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script> 

<!-- <script src="jquery-ui.js" type="text/javascript"></script> -->
<!-- <script type="text/javascript" src="bootstrap.min.js" ></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="sweetalert/sweetalert.min.js"></script>ss
<script type="text/javascript" src="pagination.js"></script>

<script>
	$("#checkAl").click(function () {
		$('input:checkbox').not(this).prop('checked', this.checked);
	});

function show_warning(ev){
	var link = $(ev).attr("href");

	swal({
	title: "Are you sure?",
	text: "Once deleted, you will not be able to recover this!",
	icon: "warning",
	buttons: true,
	dangerMode: true,
	})
	.then((willDelete) => {
	if (willDelete) {
	swal("Poof! Your data has been deleted!", {
	buttons: false,
	timer: 1000,
	});

	setTimeout(function(){location.href=link} , 1000);

	} else {
	swal("Your data is safe!", {
	buttons: false,
	timer: 1000,
	});
	}
	});
	return false;
}
</script>
</body>
</html>