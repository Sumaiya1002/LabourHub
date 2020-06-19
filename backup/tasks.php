<html>
<head>
	<title>Eran Money online at home</title>
	<link rel="stylesheet" type="text/css" href="CSS/task.css">
	<link rel="stylesheet" type="text/css" href="file:///E:/grey/fontawesome-free-5.12.0-web/fontawesome-free-5.12.0-web/css/all.css">

</head>
<body>
	<header>
		<nav>
			<div class="logo">LabourHub</div>
			<div class="menu">
			<?php
				include("session_l.php");
				$labour_phone=$_SESSION['labour_phone'];
				$sql="SELECT labour_name FROM labour WHERE labour_phone='$labour_phone'";
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


<div class="post-list" >


	<?php
		$sql2="SELECT job_id FROM claimed WHERE status='Beed' or status='Confirmed'";
		$query=mysqli_query($con, $sql2);
		$row2=mysqli_fetch_array($query);
		$job_id=$row2['job_id'];
		$sql="SELECT job_id,job_name,job_budget,job_date FROM job_post WHERE job_id='$job_id'";
		$query=mysqli_query($con, $sql);
		while($row=mysqli_fetch_array($query)){
			echo '<div class="card">';
			echo '<img src="images/cleaner.png" alt="John" style="width:75px;float:left;border-radius:50%;border-style:solid;">';
			echo "<p>Title of the Job:".$row['job_name']."</p>";
			echo "<br>";
			echo "<p>".$row['job_budget']."Tk.</p>";
			echo "<br>";
			echo "<p>Date:".$row['job_date']."</p>";
			echo "<p style='padding-left:250px;'><a href='open_task.php?job_id=$job_id'>open</a></p>";
			echo '</div>';
			echo '<br>';
		}
	?>

</div>
</body>
</html>