<?php 

	// 
include('process.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($con, "SELECT * FROM crudtable WHERE id=$id");
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$age = $n['age'];
			$username = $n['username'];
			$address = $n['address'];
	
	}
$results = mysqli_query($con, "SELECT * FROM crudtable");
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD by Sonawap </title>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>

<div class="container">
	<h1 class="text-center">CRUD. Side Hustle Task for the day</h1>
	<h2 class="text-center">Done by Sonawap | Github: https://github.com/sonawap</h2>
	<h2 class="text-center">Mentor MRT</h2>
	<div class="row">
		<div class="col-md-12">
			<div class="conn-wrap">
				<h1>Users List</h1>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>Name </th>
								<th>Age </th>
								<th>Username </th>
								<th>Address </th>
								<th colspan="2">Action </th>
							</tr>
						</thead>
						<tbody>
							<?php while ($row = mysqli_fetch_array($results)) { ?>
								<tr>
									<td><?php echo $row['name']; ?></td>
									<td><?php echo $row['age']; ?></td>
									<td><?php echo $row['username']; ?></td>
									<td><?php echo $row['address']; ?></td>
									<td>
										<a class="btn btn-primary btn-sm" role="button" href="index.php?edit=<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-edit"></i> Edit </a></td>
									<td> <a class="btn btn-danger btn-sm" role="button" href="index.php?del=<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-trash"></i> Delete </a></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="conn-wrap">
				<?php if ($update == true): ?>
					<h1>Update User</h1>
				<?php else: ?>
					<h1>Create new User</h1>
				<?php endif ?>
				<form method="post" action="process.php" >
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<div class="form-group">
						<label class="control-label">Name </label>
						<input class="form-control" type="text" name="name" required placeholder="Enter Name" value="<?php echo $name; ?>">
					</div>
					<div class="form-group">
						<label class="control-label">Age </label>
						<input class="form-control" type="number" name="age" required placeholder="Enter age" value="<?php echo $age; ?>">
					</div>
					<div class="form-group">
						<label class="control-label">Username </label>
						<input class="form-control" type="text" name="username" required placeholder="Enter Username" value="<?php echo $username; ?>">
					</div>
					<div class="form-group">
						<label class="control-label">Address </label>
						<textarea class="form-control form-control" name="address" required placeholder="Enter address"><?php echo $address; ?></textarea>
					</div>
					<?php if ($update == true): ?>
						<button class="btn btn-primary btn-lg" type="submit" name="update">Update user </button>
					<?php else: ?>
							<button class="btn btn-primary btn-lg" type="submit" name="save">Create user </button>
					<?php endif ?>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>