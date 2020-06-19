<?php
	include("session_l.php");
	$labour_phone=$_SESSION['labour_phone'];
	$sql="SELECT labour_id,labour_name FROM labour WHERE labour_phone='$labour_phone'";
	$query=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($query);
	$labour_id=$row["labour_id"];
	
	if(isset($_POST['apply'])){
		$job_id=$_POST["job_id"];
		$query="INSERT INTO `claimed`(`job_id`, `labour_id`, `status`) VALUES ('$job_id',$labour_id,'Beed')";
		if(mysqli_query($con,$query)){
			header("location:user-profile.php");
		}
	}
?>

<html>
<head>
    <title>Eran Money online at home</title>
    <link rel="stylesheet" type="text/css" href="CSS/post_tasks.css">
	<link rel="stylesheet" type="text/css" href="CSS/task.css">
	<link rel="stylesheet" type="text/css" href="file:///E:/grey/fontawesome-free-5.12.0-web/fontawesome-free-5.12.0-web/css/all.css">

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

<div class="task_form" style="border: 1px solid black;" >
<form method="post" action="open_task.php">
<?php
    include("dbconnect.php");
    if(isset($_GET["job_id"])){
		$job_id=$_GET["job_id"];
		$sql="SELECT * FROM job_post WHERE job_id='$job_id'";
		$query=mysqli_query($con, $sql);
		while($row=mysqli_fetch_array($query)){
			$client_id=$row['client_id'];
?>
	<input name="job_id" type="hidden" value="<?php echo $job_id ?>">
	<div class="stepOne" style="border: 1px solid black hidden;">
		<div class="task-f-details1">
            <div class="pro-img">
                <img src="images/cleaner.png" alt="John">
            </div>
            <br>
            <br>
            <br>
			<div class="task-title">
                <h2>Task Title :<?php echo $row["job_name"]; ?></h2>
                <br>
                <p>Description:<?php echo $row["job_description"]; ?></p>
			</div>
			
			<div class="user-details" style="border-bottom: 0px">
				<div class="poster">
                    <b >POSTED BY</b>
                    <?php
                        $sql2="SELECT `client_name` FROM client WHERE client_id='$client_id'";
                        $query2=mysqli_query($con, $sql2);
                        $row2=mysqli_fetch_array($query2);
                        echo "<p>".$row2['client_name']."</p>";
                    ?>
				</div>				
            </div>
            
			<div class="location-details" style="border-bottom: 0px">
				
					<div class="map">
    					<i class="fa fa-map-marker" aria-hidden="true"></i>
    					
  					</div>
  					<div class="poster">
						<b >LOCATION</b>
						<p><?php echo $row['job_location']; ?></p>
					</div>	
				
			</div>
			<div class="location-details" style="border-bottom: 0px">
				
					<div class="calender">
    					<i class="fa fa-calendar" aria-hidden="true"></i>
    					
  					</div>
  					<div class="poster">
						<b >DATE</b>
						<p><?php echo $row['job_date'];?></p>
					</div>
				
			</div>

		</div>
		<div class="comment-button" style="padding-left: 180px;">
				<button type="submit" name="apply">Apply</button>
		</div>
		<div style="margin-top: 200px;">
		</div>
		

    </div>
        <?php } }?>
	</form>
</div>


</body>
</html>