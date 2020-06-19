<?php
	session_start();
	include("dbconnect.php");
		
	if(empty($_SESSION["admin_phone"])){
		header("location: signin.php");
	}else{
		$admin_phone=$_SESSION["admin_phone"];
		$sql="SELECT id FROM admin WHERE phone='$admin_phone'";
		$query=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($query);
		if($row==0){
			header("location:index.php");
		}
	}
?>