<?php
	session_start();
	include("dbconnect.php");
		
	if(empty($_SESSION["client_phone"])){
		header("location: signin.php");
	}else{
		$client_phone=$_SESSION["client_phone"];
		$sql="SELECT client_name FROM client WHERE client_phone='$client_phone'";
		$query=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($query);
		if($row==0){
			header("location:index.php");
		}
	}
?>