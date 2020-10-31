<?php 

	// 
include('process.php');
$results = mysqli_query($con, "SELECT * FROM videos");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Video Upload by Sonawap </title>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>

<div class="container">
	<h1 class="text-center">Video Upload. Side Hustle Task for the day</h1>
	<h2 class="text-center">Done by Sonawap | Github: https://github.com/sonawap</h2>
	<h2 class="text-center">Mentor MRT</h2>
	<div class="row">
		<div class="col-md-12">
			<?php if(!empty($_GET['error'])) { ?>
				<div class="alert alert-danger"><span class="icon-ban-circle"></span> <?php echo $_GET['error'] ?></div>
			<?php } ?>
			<?php if(!empty($_GET['success'])) { ?>
				<div class="alert alert-success"><span class="icon-ban-circle"></span> <?php echo $_GET['success'] ?></div>
			<?php } ?>
			<div class="conn-wrap">
				<h1>Video Playlist</h1>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>ID </th>
								<th>Title </th>
								<th colspan="2">Action </th>
							</tr>
						</thead>
						<tbody>
							<?php while ($row = mysqli_fetch_array($results)) { ?>
								<tr>
									<td><?php echo $row['id']; ?></td>
									<td><?php echo $row['title']; ?></td>
									<td>
										<a class="btn btn-primary btn-sm"  href="videos/<?php echo $row['video']; ?>" download><i class="glyphicon glyphicon-edit"></i> Download </a></td>
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
				<h1>Add Video</h1>
				<form method="post" action="process.php" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<div class="form-group">
						<label class="control-label">Title </label>
						<input class="form-control" type="text" name="title" required placeholder="Enter Video Title" value="<?php echo $title; ?>">
					</div>
					<div class="form-group">
						<label class="control-label">Choose Video </label>
						<input class="form-control" type="file" name="file" required>
					</div>
					<button class="btn btn-primary btn-lg" type="submit" name="save">Add Video </button>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>