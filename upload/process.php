<?php 
	include 'connect.php';

	// initialize variables
	$title = "";
	$update = false;
	$dateposted = date('Y-m-d');
	//For Insert
	if (isset($_POST['save'])) {
		
		$title = $_POST['title'];
		
		//specifying the supported file extension
		$validextensions=['mp4','avi','3gp'];
		$ext=explode('.',basename($_FILES['file']['name']));
		//explode file name from dot(.)
		$file_extension=end($ext);
		//generate Name for the video;
		$videoName="video_".rand(100000,900000).".".$file_extension;
		$target_path=$videoName;
		$filesize= 5000000;

		if(($_FILES['file']['size'] <= $filesize) and in_array($file_extension,$validextensions)) {
			$videoName="video_".rand(100000,900000).".".$file_extension;
			$destination = 'videos'."/".$videoName;
			$temp_file = $_FILES['file']['tmp_name'];
			
			echo "ok";
			if(move_uploaded_file($temp_file,$destination)){
				mysqli_query($con, "INSERT INTO videos (title, video, dateposted) VALUES ('$title', '$videoName','$dateposted')"); 
				header("Location: index.php?success=Video has been added to your playlist");
			}else{
				header("Location: index.php?error=Sorry an error occured");
			}
		}else{
			header("Location: index.php?error=Invalid Video format or file too large");
		}

		

	}

	//For Delete
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($con, "DELETE FROM videos WHERE id=$id");
	header('location: index.php?success=Video has been removed to your playlist');
}


?>