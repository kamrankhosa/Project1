<?php 
$server="localhost";
$user="root";
$password="";
$database="task_db";
$conn=mysqli_connect($server,$user,$password,$database);
if($conn->connect_error){
	
	die("Connection error : .connect_error");
}
 ?>