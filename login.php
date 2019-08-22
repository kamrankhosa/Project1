<?php

session_start();
if(!empty($_SESSION['id'])){
	header("Location: index.php");
	session_unset($_SESSION['id']);
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
 	<link rel="stylesheet" src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style type="text/css">
		h2{
			color: red;
			text-align: center;
		}
	</style>
</head>
<body style="margin-top: 15%; background-color: #6893d9;">
	<center>
	<form action="" method="post" style="width: 300px; background-color: gray; border-radius: 15px;"
	enctype="multipart/form-data" name="login_form">
		<h2 style="color: black; text-align: left;">Login</h2>
		<div class="form-group">
			
			<input type="text" name="uname" class="form-control" placeholder="User Name">
		</div>
		<br>
		<div class="form-group">
			
			<input type="Password" name="password" class="form-control" placeholder="Password">
		</div>
		<div class="form-group">
			<button type="btn" name="submit" value="Login" class="form-control bg-dark text-light" style="background-color: #42ad4d; color: white;font-weight: bold;">Login</button>
		</div>
		<div class="form-group">
			<input type="Reset" name="Reset" class="form-control bg-danger text-light" style="background-color: #9c1935; color: white;font-weight: bold;">
		</div>
	</form>
</center>

</body>
</html>

		<?php
		include('connection.php');
		if (isset($_POST['submit'])) {
			
			$uname=$_POST['uname'];
			$pass=md5($_POST['password']);
			$uname = stripslashes($uname);
			$pass = stripslashes($pass);
		
			$sql = "SELECT ID FROM registration_tbl WHERE (UserName = '$uname'  OR Email = '$uname' ) AND Password ='$pass'";
			$run=mysqli_query($conn,$sql);

			if($run->num_rows>0){
			$rows=$run->fetch_assoc();
			
				$_SESSION['id']=$rows['ID'];

				header("location: index.php");
			}
		

		else {
			$error = "Username or Password is invalid";
			echo $error;
		}

		}

		?>
		<script type="text/javascript">
			$(function(){
				$("form[name='login_form']").validate({
					rules:{
						uname:{
		 			required:true,
		 			minlength:3
		 		},
		 		password:{
		 			required:true,
		 			minlength:3
		 		}

					},
					messages:{
						uname:{
		 		required:"Please enter your UserName",
		 		minlength:"Please enter a valid UserName"
		 	},
		 	password:{
		 		required:"This field is required",
		 		minlength:"Please enter a valid password"
		 	}

					}
				});
			});
		</script>