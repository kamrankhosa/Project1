<?php 
session_start();
$activer_user=$_SESSION['id'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
 	<link rel="stylesheet" src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		img{
			float: right;
		}
		#logout{
			text-align: right;
		}
		body{
			text-align: center;
		}
		a:hover:#profile{
			background-image: url('profile.png');
		}


	</style>
</head>
<body>
	<div class="container bg-dark">
			<h1 style="background-color: #78a1e3;">Wellcome to your profile.</h1>
			<b id="logout"><a href="logout.php">Log Out</a></b>
<?php

include('connection.php');
if(empty($activer_user)){
	header("Location: index.php");
	
	
}
$sql="SELECT * FROM registration_tbl WHERE ID ='$activer_user'";
	$run = mysqli_query($conn,$sql);
	$rows=$run->fetch_assoc();
	$name= $rows['Name'];
	$mail=$rows['Email'];
    $image = $rows['Profile'];
    echo "<a href='update.php' id='profile'><img src='./images/$image' width='50px' height='50px' class='img-circle' id='profile'></a>";
    echo "<br>";
     echo "<br>";
      echo "<br>";
    echo("<b>Name : </b>");
    echo $name;
    ?>
<a href="nameupdate.php"><i class='fa fa-edit'></i></a>
    
     <?php
    echo "<br>";
    echo("<b>Email : </b>");
    echo $mail;

?>
<a href="mailupdate.php"><i class='fa fa-edit'></i></a>	
	</div>
	
	

</body>

</html>

