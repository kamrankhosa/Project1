<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
 	<link rel="stylesheet" src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body style="margin-top: 60px; background-color: #74bae8;">
	<center>
	<form action="" method="POST" style="width: 300px; border: 2px solid black;" enctype="multipart/form-data" name="form_reg">
		<h2 style="color: ;">Register</h2>
		<div class="form-group">
			<input type="text" name="name" class="form-control"  placeholder="Name">
		</div>
		<div class="form-group">
			
			<input type="text" name="uname" class="form-control"  placeholder="User Name">
		</div>
		<div class="form-group">
			
			<input type="Email" name="mail" class="form-control"  placeholder="Email">
		</div>
		<div class="form-group">
			<input type="Password" name="password" class="form-control"  placeholder="Password" id="password">
		</div>
		<div class="form-group">
			
			<input type="Password" name="cpassword" class="form-control" placeholder="Confirm Password">
		</div>
		<div class="form-group">
			<input type="file" name="picture" class="bg-light form-control">
		</div>
		<div class="form-group">
			<input type="submit" name="submit" class="form-control bg-success text-light">
		</div>
		<div class="form-group">
			<input type="Reset" name="Reset" class="form-control bg-danger text-light">
		</div>
	</form>
</center>

</body>
</html>

<?php



include('connection.php');

if (isset($_POST['submit']) && !empty($_FILES["picture"]["name"])) {
	$name=$_POST['name'];
	$uname=$_POST['uname'];
	$mail=$_POST['mail'];
	$pass=md5($_POST['password']);
	$flname=$_FILES["picture"]['name'];
	$tmp_name = $_FILES["picture"]['tmp_name'];
	$targetDir = "./images/";
	$targetFilePath = $targetDir . $flname;
	move_uploaded_file($_FILES['picture']['tmp_name'], $targetFilePath);

	$sql="INSERT INTO registration_tbl(Name, UserName, Email, Password, Profile) VALUES ('$name','$uname','$mail','$pass','$flname')";
	$run=mysqli_query($conn,$sql);
	if ($run)
	{
		echo "<script>alert('Registered Successfully....')</script>";
		header("Location: index.php");
	}
	else{
		echo "<script>alert('Not Registered....')</script>";
	}
	
}

?>
<script type="text/javascript">
	$(function() {
		 $("form[name='form_reg']").validate({
		 	rules:{
		 		name:{
		 			required:true,
		 			minlength:3
		 		},

		 		uname:{
		 			required:true,
		 			minlength:3
		 		},
		 		mail:{
		 			required:true,
		 			email:true
		 			
		 		},
		 		password:{
		 			required:true,
		 			minlength:3
		 		},
		 		cpassword:{
		 			required:true,
		 			equalTo:'#password'
		 		}
		 		
		 	},

		 	messages:{

		 		name:{
		 		required:"Please enter your name",
		 		minlength:"Name should be at least 3 characters long.."

		 	},
		 	uname:{
		 		required:"Please enter your UserName",
		 		minlength:"Name should be at least 3 characters long.."
		 	},
		 	mail:{
		 		required:"Please enter your email",
		 		
		 	},
		 	password:{
		 		required:"This field is required",
		 		minlength:"Must be 3 characters long"
		 	},
		 	cpassword:{
		 		required:"This field is required",
		 		equalTo:"Passwords does not match"
		 	}
		 	

		 	}


		 });
	});
</script>