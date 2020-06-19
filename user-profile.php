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
				include("session_l.php");
				$labour_phone=$_SESSION['labour_phone'];
				$sql="SELECT * FROM labour WHERE labour_phone='$labour_phone'";
				$query=mysqli_query($con,$sql);
				$row=mysqli_fetch_array($query);
			?>
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
	<div class="profile-card">
		<div class="image-container">
			<img src="images/user_client_images/<?php echo $row['image']; ?>" style="margin-top: 120px;max-width:512px;max-height:512px;">
			<a href="change_image.php" style="color:black;"><i class="ionicons ion-edit"></i></a>
		</div>
		<div class="main-container">

			<div class="sub-container">
				<h2 style="margin-left: 15px;"><?php echo $row['labour_name']; ?></h2>
				<p><i class="ionicons ion-email"></i> <?php echo $row['labour_email']; ?></p>
				<p><i class="ionicons ion-iphone"></i>  +880<?php echo $row['labour_phone']; ?></p>
				<p><i class="ionicons ion-ribbon-a"></i> Tasker</p>
				<p><b><i class="ionicons ion-ribbon-b"></i> Qualification:</b></p>
				<p>&nbsp&nbsp<?php echo $row['qualification']; ?></p>
				<p><b><i class="ionicons ion-trophy"></i> Skills:</b></p>
				<p>&nbsp&nbsp<?php echo $row['skill'];?></p>
				<p><a href="account_settings.php?labour_id=<?php echo $row['labour_id']; ?>" style="text-decoration:none;color:#000;"><b><i class="ionicons ion-gear-b"></i> Setting</b></a></p>			
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