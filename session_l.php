<?php
	session_start();
	include("dbconnect.php");
		
	if(empty($_SESSION["labour_phone"])){
		header("location: signin.php");
	}else{
		$labour_phone=$_SESSION["labour_phone"];
		$sql="SELECT labour_name FROM labour WHERE labour_phone='$labour_phone'";
		$query=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($query);
		if($row==0){
			header("location:index.php");
		}
	}
?>