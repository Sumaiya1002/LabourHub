<html>
<head>
	<title>Welcom To Labourhub</title>
	<link rel="stylesheet" type="text/css" href="CSS/user_profile.css">
	<link rel="stylesheet" href="Ionicons/css/ionicons.min.css">
</head>
<body>
	<header>
		<nav>
			<div class="logo">LabourHub</div>
			<div class="menu">
			<?php
				include("session_c.php");
				$client_phone=$_SESSION['client_phone'];
				$sql="SELECT * FROM client WHERE client_phone='$client_phone'";
				$query=mysqli_query($con,$sql);
				$row=mysqli_fetch_array($query);
			?>
				  
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
	<div class="profile-card">
		<div class="image-container">
			<img src="images/user_client_images/<?php echo $row['image']; ?>" style="margin-top: 120px;max-width:512px;max-height:512px;">
			<a href="client_change_image.php" style="color:black;"><i class="ionicons ion-edit"></i></a>
		</div>
		<div class="main-container">

			<div class="sub-container">
				<h2 style="margin-left: 15px;"><?php echo $row['client_name']; ?></h2>
				<p><i class="ionicons ion-email"></i> <?php echo $row['client_email']; ?></p>
				<p><i class="ionicons ion-iphone"></i>  +880<?php echo $row['client_phone']; ?></p>
				<p><i class="ionicons ion-ribbon-a"></i> Job Poster</p>
				<p><a href="client_account_settings.php?client_id=<?php echo $row['client_id']; ?>" style="text-decoration:none;color:#000;"><b><i class="ionicons ion-gear-b"></i> Setting</b></a></p>			
			</div>
			

			

		</div>
	</div>













<footer>
	<div class="navbar-footer">
		
			 <div class="row3">
                <div class="col2">
                    <h3>Discover</h3>
                    <ul>
                        <li><a href="#">How It Works</a></li>
                        <li><a href="#">Earn Money</a></li>
                        
                    </ul>
                </div>
                <div class="col2">
                    <h3>LabourHub</h3>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Terms and Condition</a></li>
                         <li><a href="#">Contact Us</a></li>
                          <li><a href="#">Privacy Policy </a></li>
                        
                    </ul>
                </div>
               
                 <div class="col2">
                    <h3>Existing Members</h3>
                    <ul>
                        <li><a href="#">Post a task</a></li>
                        <li><a href="#">Earn Money</a></li>
                         <li><a href="#">Login</a></li>
                         
                        
                    </ul>
                </div>

            </div>
		</div>
	<div class="copy">
         &copy; All Reserverd By Labourhub | Designed By Sumaiya & Sweety
    </div>
	
</footer>

</body>
</html>