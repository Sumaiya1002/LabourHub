<?php
	include("session_c.php");
	$client_phone=$_SESSION['client_phone'];
	$sql="SELECT * FROM client WHERE client_phone='$client_phone'";
	$query=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($query);

	if(isset($_POST['continue'])){

		$message=$_POST['message'];
        $client_id=$row["client_id"];
        $query="INSERT INTO `message`(`message`, `message_sender_id`, `message_receiver_id`,`sender_designation`, `receiver_designation`) VALUES ('$message','$client_id',1,'Client','Admin')";
            if (mysqli_query($con, $query)){
                echo '<script language="javascript">';
                echo 'alert("Message Succesfully Send")';
                echo '</script>';
                echo "<script>location.href='client-profile.php';</script>";
            }else{
                echo $client_id;
                echo 'Die C';
			}
	}
?>


<html>
<head>
	<title>--LabourHub--</title>
	<link rel="stylesheet" type="text/css" href="CSS/contact.css">
</head>
<body>
	<header>
		<nav>
			<div class="logo">LabourHub</div>
			<div class="menu">
				  
				  <a href="client-profile.php"><?php echo $row["client_name"]; ?></a>
				  <a href="post_tasks.php">Home</a>
				  <a href="beeding_work.php">Pending Work</a>
				  <a href="all_post_work.php">All Work</a>  
				  <a href="contact_client.php">Contact</a>
				  <a href="client_message.php">Message</a>
                  <a href="logout_c.php">Logout</a>
                   
			</div>
		</nav>

	</header>
	<div class="signup-form">
		<form action="contact_client.php" method="post">			
			<div class="signup-body">
			<div class="form-group">
				
				<input type="text" class="form-control" name="user_name" placeholder="Full Name"
				autocomplete="off" value="<?php echo $row['client_name']; ?>" required>

			</div>
			
			<div class="form-group">
				
				<input type="email" class="form-control" name="user_email" placeholder="Email"
				autocomplete="off" value="<?php echo $row['client_email']; ?>" required>

			</div>

			<div class="form-group">
				
				<input type="phone" class="form-control" name="user_phone" placeholder="Phone Number"
				autocomplete="off" value="<?php echo $row['client_phone']; ?>" required>

			</div>
			<div class="tab">
    			<p><textarea rows="4" cols="50" name="message" placeholder="Message"></textarea></p>
    			
 			 </div>

			
			</div>
		
			
			<div class="form-group">
				<button type="submit" class="btn " name="continue">Send Message</button>
				

			</div>			
		</form>

</body>
</html>