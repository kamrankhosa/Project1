<?php 
session_start();
// if(empty($_SESSION['id'])){
// 	header("Location: index.php");
// 	session_unset($_SESSION['id']);
	
// }
include ('connection.php');
 $active_user = $_SESSION['id'];
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>update</title>
	</head>
	<body>
		<h1>Select a New profile picture</h1>
		<form action="" method="POST" enctype="multipart/form-data" name="form_reg">
		<input type="file" name="picture">
		<input type="submit" name="update" value="Update">
			</form>
	</body>
	</html>



	<?php
	if(isset($_POST['update'])){

			$nprofile=$_FILES['picture']['name'];
		    $tmp_name = $_FILES['picture']['tmp_name'];
			$targetDir = "./images/";
			$targetFilePath = $targetDir . $nprofile;
			move_uploaded_file($_FILES['picture']['tmp_name'], $targetFilePath);
			$sql="UPDATE registration_tbl SET Profile = '$nprofile' where ID='$active_user'";
			$run = mysqli_query($conn,$sql);
			if ($run) {	
			echo "Profile Updated";
			header("Location: index.php");
			}
		}
 ?>