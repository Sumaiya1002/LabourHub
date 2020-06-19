<?php
    session_start();
	include("dbconnect.php");
	if(isset($_POST['submit'])){
        $email_l=$_SESSION["email_l"];
        $email_c=$_SESSION["email_c"];
        $code=$_POST["code"];

        if(empty($email_c)){
            $query_l="SELECT status FROM labour WHERE labour_email='$email_l'";
            $sql_l=mysqli_query($con, $query_l);
            $row_l=mysqli_fetch_array($sql_l);
            if ($row_l["status"]==$code){
                $query="UPDATE labour SET `status`='Confirmed' WHERE labour_email='$email_l'";
                if(mysqli_query($con,$query)){
                    unset($_SESSION["email_l"]);
                    header("location:signin.php");
                }
            }else{
                echo '<script language="javascript">alert("Wrong Code")</script>';
            }

        }elseif(empty($email_l)){
            $query_c="SELECT status FROM client WHERE client_email='$email_c'";
            $sql_c=mysqli_query($con, $query_c);
            $row_c=mysqli_fetch_array($sql_c);
            if($row_c["status"]==$code){
                $query="UPDATE client SET `status`='Confirmed' WHERE client_email='$email_c'";
                if(mysqli_query($con,$query)){
                    unset($_SESSION["email_c"]);
                    header("location:signin.php");
                }
            }else{
                echo '<script language="javascript">alert("Wrong Code")</script>';
            }
        }
        //else{
        //     echo '<script language="javascript">alert("Insert")</script>';
        //     echo "<script>location.href='adminFood.php';</script>";
        // }

    }
?>

<html>
<head>
	<title>--LabourHub--</title>
    <link rel="stylesheet" type="text/css" href="CSS/contact.css">
    <link rel="stylesheet" type="text/css" href="CSS/signin.css">
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <script>
        function random_code_generator()
        {
            var code=Math.floor(Math.random() * 8999 + 1000);
            $.ajax({
				type: 'post',
				url: 'sending_code.php',
				data: {
                code:code},
				success: function (html) {
					alert("We Send a Code in Your mail!");
                },
            });
        }
    </script>
</head>
<body onload="random_code_generator()">
	<header>
		<nav>
			<div class="logo">LabourHub</div>
			<div class="menu">
				  
				  <a href="index.php">Home</a>
				  <a href="category.php">Category</a>
                  <a href="about.html">About</a>
                  <a href="policy.html">Policy</a>
                  <a href="contact.html">Contact</a>
                   <a href="signin.php">Login</a>
                   <a href="signup.php">Register</a>

                   
			</div>
		</nav>

	</header>
	<div class="signin-form">
		<form action="enter_code.php" method="post">
			<div class="form-header">
				<h2>Enter Code</h2>
			</div>
			<div class="form-group">
				
				<input type="text" class="form-control" name="code" placeholder="4 digit Code"
				autocomplete="off" >
			</div>

			
			<div class="form-group">
				<button type="submit" class="btn" name="submit">Submit</button>
			</div>
			<br>
			
		</form>
	</div>

</body>
</html>