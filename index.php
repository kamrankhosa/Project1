<?php
session_start();
$active_user = $_SESSION['id'];
include ('connection.php');
?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Home</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
			<style type="text/css">
				img{
					border-radius: 100px;
				}
			</style>
	</head>
	<body>
	<nav class="navbar navbar-dark bg-dark navbar-expand fixed-top">
		<div class="conatiner navbar-header">
			<a href="#" class="navbar-brand">Wellcome</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
				
		<?php if( isset($_SESSION['id']) && !empty($_SESSION['id']))
		{

		?>
		      
		     
		      <?php
		     
		     
			$image_src="./images/";
			$sql="SELECT Profile FROM registration_tbl WHERE ID = '$active_user'";
			$run = mysqli_query($conn,$sql);

			 $rows=$run->fetch_assoc();

		?>
  <li class="nav-item"><a href="index.php" class="nav-link">Services</a></li>
			  <li class="nav-item"><a href="index.php" class="nav-link">Products</a></li>
			  <li class="nav-item"><a href="index.php" class="nav-link">Contact Us</a></li>
		

		<?php
			
			  $image = $rows['Profile'];

			   
			    echo "<a href='profile.php'><img src='./images/$image' width='50px' height='50px' class='img-circle'></a>";
			    ?>
			    	<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li class="nav-item"><a href="logout.php" class="nav-link navbar-right bg-dark">Logout</a></li>
            
        
        </ul>
      </li>
			

			
		     

		<?php 
	}
	else
		{ 
			?>
		     <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
		     <li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>
		<?php 
	} 

		?>
			</ul>
		
	</nav>
	

</body>
</html>


