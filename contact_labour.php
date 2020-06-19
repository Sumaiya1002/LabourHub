<?php
	include("session_l.php");
	$labour_phone=$_SESSION['labour_phone'];
	$sql="SELECT * FROM labour WHERE labour_phone='$labour_phone'";
	$query=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($query);
	$labour_id=$row["labour_id"];

	if(isset($_POST['continue'])){
		$message=$_POST['message'];
        $labour_id=$row["labour_id_tmp"];
        $query="INSERT INTO `message`(`message`, `message_sender_id`, `message_receiver_id`,`sender_designation`, `receiver_designation`) VALUES ('$message','$labour_id',1,'Labour','Admin')";
            if (mysqli_query($con, $query)){
                unset($_SESSION['labour_id_tmp']);
                echo '<script language="javascript">';
                echo 'alert("Message Succesfully Send")';
                echo '</script>';
                echo "<script>location.href='user-profile.php';</script>";
            }else{
                echo $labour_id;
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
				  <a href="user-profile.php"><?php echo $row["labour_name"]; ?></a>				  
				  <a href="tasks.php">Home</a>
				  <a href="category.php">Category</a>
				  <a href="labour_pending_work.php">Work</a>
                  <a href="contact_labour.php">Contact</a>
                  <a href="labour_message.php">Message</a>
                  <a href="logout_l.php">Logout</a>
                   
			</div>
		</nav>

	</header>
	<div class="signup-form">
		<form action="contact_labour.php" method="post">			
			<div class="signup-body">
			<div class="form-group">
				
				<input type="text" class="form-control" name="user_name" placeholder="Full Name"
				autocomplete="off" value="<?php echo $row['labour_name']; ?>" required>

			</div>
			
			<div class="form-group">
				
				<input type="email" class="form-control" name="user_email" placeholder="Email"
				autocomplete="off" value="<?php echo $row['labour_email']; ?>" required>

			</div>

			<div class="form-group">
				
				<input type="phone" class="form-control" name="user_phone" placeholder="Phone Number"
				autocomplete="off" value="<?php echo $row['labour_phone']; ?>" required>

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