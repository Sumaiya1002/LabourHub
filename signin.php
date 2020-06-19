<?php
	session_start();
	include("dbconnect.php");
	if(isset($_POST['login'])){
		$phone=$_POST["phone"];
		$query_c="SELECT client_pass FROM client WHERE client_phone='$phone'";
		$sql_c=mysqli_query($con, $query_c);
		$row_c=mysqli_fetch_array($sql_c);

		$query_l="SELECT labour_pass FROM labour WHERE labour_phone='$phone'";
		$sql_l=mysqli_query($con, $query_l);
		$row_l=mysqli_fetch_array($sql_l);

		$query_a="SELECT password FROM admin WHERE phone='$phone'";
		$sql_a=mysqli_query($con, $query_a);
		$row_a=mysqli_fetch_array($sql_a);

		if ($row_c["client_pass"]==$_POST["pass"]){
			$_SESSION['client_phone']=$phone;
			header("location:post_tasks.php");
		}else if($row_l["labour_pass"]==$_POST["pass"]){
			$_SESSION['labour_phone']=$phone;
			header("location:tasks.php");
		}else if($row_a["password"]==$_POST["pass"]){
			$_SESSION['admin_phone']=$phone;
			header("location:admin.php");
		}else{
			echo '<script language="javascript">alert("Wrong Password or Phone")</script>';
		}
		//user-profile,tasks,open_task,contact_labour,labour_message,labour_pending_work,category,finished_work_labour,a/c_setting,change_image
		//post_tasks,client_message,view_message_c,contact_client,client-profile,beeding_work,all_post_work,c_a/c_setting,c_change_image

	}
?>

<html>
<head>
	<title>--LabourHub--</title>
    <link rel="stylesheet" type="text/css" href="CSS/contact.css">
    <link rel="stylesheet" type="text/css" href="CSS/signin.css">
</head>
<body>
	<header>
		<nav>
			<div class="logo">LabourHub</div>
			<div class="menu">
				  
				  <a href="index.php">Home</a>
                  <a href="about.html">About</a>
                  <a href="policy.html">Policy</a>
                  <a href="contact.html">Contact</a>
                   <a href="signin.php">Login</a>
                   <a href="signup.php">Register</a>

                   
			</div>
		</nav>

	</header>
	<div class="signin-form">
		<form action="signin.php" method="post">
			<div class="form-header">
				<h2>Login</h2>
				<div class="text-center" style="color:#999;font-weight:bold;">Don't Have an Account?  <a href="signup.php">Signup</a></div>
			</div>
			<div class="form-group">
				
				<input type="text" class="form-control" name="phone" placeholder="Phone Number"
				autocomplete="off" >
				<input type="password" class="form-control" name="pass" placeholder="Password"
				autocomplete="off" >
			</div>

			
			<div class="form-group">
				<button type="submit" class="btn" name="login">Login</button>
			</div>
			<div class="small"><a href="forget_pass.php"style="margin-left:150px; font-weight:bold;">Forget Password?</a></div>
			<br>
			
		</form>
	</div>

</body>
</html>