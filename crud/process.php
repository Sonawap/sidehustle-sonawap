<?php 
	include 'connect.php';

	// initialize variables
	$name = "";
	$age = "";
	$address = "";
	$username = "";
	$id = 0;
	$update = false;
	$dateposted = date('Y-m-d');
	//For Insert
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$age = $_POST['age'];
		$username = $_POST['username'];
		$address = $_POST['address'];

		mysqli_query($con, "INSERT INTO crudtable (name, age, username, address, dateposted) VALUES ('$name', '$age','$username','$address','$dateposted')"); 
		header('location: index.php');
	}

		//For Update
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$age = $_POST['age'];
		$username = $_POST['username'];
		$address = $_POST['address'];

		mysqli_query($con, "UPDATE crudtable SET name='$name', age='$age', username='$username', address='$address', dateposted='$dateposted' WHERE id=$id");
		header('location: index.php');
	}
	//For Delete
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($con, "DELETE FROM crudtable WHERE id=$id");
	header('location: index.php');
}


?>