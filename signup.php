<?php
	session_start();
	include("dbconnect.php");

	if(isset($_POST['continue_l'])){
		$name=$_POST['user_name'];
		$password=$_POST['user_pass'];
		$email=$_POST['user_email'];
		$phone=$_POST['user_phone'];
		$gender=$_POST['user_gender'];
		$qualification=$_POST['qualification'];
		$skill=$_POST['skill'];
		$_SESSION["email_l"]="";
		$_SESSION["email_c"]="";

		$query="INSERT INTO `labour`(`labour_name`, `labour_email`, `labour_pass`, `labour_phone`, `labour_gender`,`qualification`,`skill`, `image`,`status`) VALUES ('$name','$email','$password','$phone','$gender','$qualification','$skill','default_image','pending')";
		if (mysqli_query($con, $query)){
			$_SESSION["email_l"]=$email;
			header("location:enter_code.php");
		}
	}else if(isset($_POST['continue_c'])){
		$name=$_POST['user_name'];
		$password=$_POST['user_pass'];
		$email=$_POST['user_email'];
		$phone=$_POST['user_phone'];
		$gender=$_POST['user_gender'];
		$_SESSION["email_l"]="";
		$_SESSION["email_c"]="";

		$query="INSERT INTO `client`(`client_name`, `client_email`, `client_pass`,`client_gender`,`client_phone`,`image`, `status`) VALUES ('$name','$email','$password','$gender','$phone','default_image','pending')";
		if (mysqli_query($con, $query)){
			$_SESSION["email_c"]=$email;
			header("location:enter_code.php");
		}
	}
?>

<html>
<head>
	<title>--LabourHub--</title>
    <link rel="stylesheet" type="text/css" href="CSS/contact.css">
    <link rel="stylesheet" type="text/css" href="CSS/signup.css">
    <script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function post_task()
		{
			document.getElementById("demo1").innerHTML ='';
			document.getElementById("demo2").innerHTML ='';
			document.getElementById("demo").innerHTML ='<button type="submit" class="btn " style="background-color:green" name="continue_c">Continue as a Client</button>';
		}
	</script>
	<script type="text/javascript">
		function comp_task()
		{
			
			document.getElementById("demo1").innerHTML ='<input type="text" class="form-control" required name="qualification" placeholder="Qualification" autocomplete="off" >';
			document.getElementById("demo2").innerHTML ='<input type="text" class="form-control" required name="skill" placeholder="Skill" autocomplete="off" >';
			document.getElementById("demo").innerHTML ='<button type="submit" class="btn " style="background-color:green" name="continue_l">Continue as a Labour</button>';
		}
	</script>
	<script>
		function validate_email(){
			var email=document.getElementById("email").value;
			if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
				return (true);
			}
			alert("You have entered an invalid email address!");
			document.getElementById("email").value=null;
			return (false);
		}
	</script>
</head>
<body>
	<header>
		<nav>
			<div class="logo">LabourHub</div>
			<div class="menu">
				  
				  <a href="index.html">Home</a>
				  <a href="#">Category</a>
                  <a href="about.html">About</a>
                  
                  
                  <a href="contact.html">Contact</a>
                  <a href="signin.php">Login</a>
                  <a href="signup.php">Register</a>

                   
			</div>
		</nav>

	</header>
	<div class="signup-form">
		<form action="" method="post">
			
			<div class="signup-body">
                <div class="form-group">
						
                    <input type="text" class="form-control" required name="user_name" placeholder="Username"
                    autocomplete="off" >

                </div>
                <div class="form-group">
                    
                    <input type="password" class="form-control" required name="user_pass" placeholder="Password"
                    autocomplete="off" >

                </div>
                <div class="form-group">
                    
                    <input type="email" class="form-control" required name="user_email" id="email" placeholder="Email"
                    autocomplete="off" onchange="validate_email()">

                </div>

                <div class="form-group">
                    
                    <input type="phone" class="form-control" required name="user_phone" placeholder="Phone Number"
                    autocomplete="off" >

                </div>
                

                <div class="form-group">
                    
                    <select class="form-control" name="user_gender" required style="color:grey;padding:8px;" >
                        <option disabled="">Select your gender</option>
                        <option value="male" >Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    
                    </select>

                </div>

				<div id="demo1" class="form-group"></div>

				<div id="demo2" class="form-group"></div>

				<br>
                
				<div class="text-bar">
                    <div class="text-center">
                        <p style="margin-left:5px;">Choose how you would like to use LabourHub</p><br>
                        <button type="button" class="btn-btn" onclick="post_task()">I Want To Post Tasks</button>
                        <button type="button" class="btn-btn" onclick="comp_task()">I Want To Complete Tasks</button>
                    </div>
                </div>
                <div id="demo">
				</div>
			</div>			
		</form>

</body>
</html>