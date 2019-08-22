<?php 
session_start();
include ('connection.php');
 $active_user = $_SESSION['id'];
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>update</title>
	</head>
	<body>
		<h1>Enter new Name :</h1>

		<form action="" method="POST" enctype="multipart/form-data" name="form_reg">
		<input type="text" name="name" required="">
		<input type="submit" name="update" value="Update">
			</form>
			<br>
			<br>
			<a href="profile.php"><button>Back to Profile</button></a>
	</body>
	</html>
<?php
if(empty($activer_user)){
	header("Location: index.php");
}

?>
<?php
	if(isset($_POST['update'])){

			$upname=$_POST['name'];
		    
			$sql="UPDATE registration_tbl SET Name = '$upname' where ID='$active_user'";
			$run = mysqli_query($conn,$sql);
			if ($run) {	
			echo "Name Updated";
			header("Location: profile.php");
			}
		}
 ?>