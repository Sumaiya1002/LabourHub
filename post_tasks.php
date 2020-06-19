<?php
	include("session_c.php");
	$client_phone=$_SESSION['client_phone'];
	$sql="SELECT client_id,client_name FROM client WHERE client_phone='$client_phone'";
	$query=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($query);
	if(isset($_POST['submit'])){
		$category=$_POST['category'];
		$task_title=$_POST['task_title'];
		$description=$_POST['description'];
		$date=$_POST['date'];
		$package=$_POST['package'];
		$budget=$_POST['budget'];
		$address=$_POST['address'];
		$client_id=$row["client_id"];

		$query="INSERT INTO `job_post`(`job_name`, `job_description`, `job_date`, `job_location`, `job_packages`, `job_budget`, `job_status`, `client_id`, `category_id`)
			VALUES ('$task_title','$description','$date','$address','$package','$budget','pending','$client_id','$category')";
		if (mysqli_query($con, $query)){
			echo '<script language="javascript">alert("Job Posted after admin confirmation!")</script>';
			echo "<script>location.href='client-profile.php';</script>";
		}else{
			echo '<script language="javascript">alert("Please fill up correctly!")</script>';
			echo "<script>location.href='post_tasks.php';</script>";
		}
	}
?>

<html>
<head>
	<title>LabourHub : Find Expert Cleaners, Handyman, Electricians for your Home and Office Tasks</title>
	<link rel="stylesheet" type="text/css" href="CSS/post_tasks.css">
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
<form id="postTasks" action="post_tasks.php" method="post">

	<div class="task_form">
				<h1>What kind of work you want to do?</h1>
		<div class="stepOne">
			<div class="tab">Job Category
				<select class="package" name="category" style="color:grey;padding:8px;" reduried>
				<option>Select your Job</option>
				<?php
					$sql="SELECT * FROM job_category";
					$query=mysqli_query($con, $sql);
					while($row=mysqli_fetch_array($query)){
						echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
					}
				?>
				</select>
			</div>
			<div class="tab">Task title
    			<p><input placeholder="E.g Clean my car" name="task_title" reduried></p>
    			
 			 </div>
 			 
 			 <div class="tab">
 			 	<h5>Describe your task in more detail</h5>
				<p style="color:grey;font-size:15px;margin-top:5px;">
					Please do not share personal information, e.g. email, phone or 
					Skype ID, as this is against Supertasker policy and your account 
					may be blocked.
				</p>
    			<textarea rows="15" cols="50" placeholder="E.g Clean my car inside and outside.I will supply all materials." name="description" reduried></textarea>
    			
			  </div>
			  <div class="tab">Date
    			<input type="date" placeholder="Date" name="date" reduried>
    			
 			 </div>
 			 <div class="tab">Packages
    			<select class="package" name="package" style="color:grey;padding:8px;" reduried>
					<option>Select your package</option>
					<option value="hourly">Hourly</option>
					<option value="monthly">Monthly</option>
					<option value="yearly">Yearly</option>
					<option value="others">Others</option>
				
				</select>
    			
 			 </div>
 			 <div class="tab">Budget
    			<p><input placeholder="E.g Write your amount." name="budget" reduried></p>
    			
 			 </div>
 			 <div class="tab">Address
				<p><textarea rows="4" cols="50" placeholder="E.g House no: Road no: etc" name="address" reduried></textarea></p>
			 </div>
		</div>
		<button type="submit" class="sub-btn" name="submit" value="Submit">Submit</button>
	</div>

	</form>



	

</body>
</html>