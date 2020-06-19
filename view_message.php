<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="CSS/view_message.css">
</head>
<body>
	<div class="header">
		<center><img src="images/admin_icon.png" alt="adminicon" id="image">
		<br> Welcome To Admin Panel....!</center>
	</div>
<div class="main-content">
	<div class="sidebar">
		<ul>
		<a href="admin_message.php"><li>Check Message</li></a>
			<a href="pending_post.php"><li>Pending Post</li></a>
			<a href="admin_approved_post.php"><li>Approved Post</li></a>
			<a href="add_category.php"><li>Category</li></a>
			<a href="sending_message_labour.php"><li>Labour List</li></a>
            <a href="sending_message_client.php"><li>Client List</li></a>
			<a href="logout_a.php"><li>Logout</li></a>
		</ul>
	</div>
	<div class="content">

		<h2>View Message</h2>
		
		<div class="subcontent">
			<?php
				include("session_a.php");

				if(isset($_GET['message_id'])){
					$message_id=$_GET['message_id'];
					$query ="SELECT message,message_receiver_id,sender_designation,receiver_designation FROM message WHERE message_id='$message_id'";
					$sql=mysqli_query($con,$query);
					$row=mysqli_fetch_array($sql);
					$r_id=$row['message_receiver_id'];

					if($row["sender_designation"]=='Labour'){
						$query1="SELECT labour_id,labour_name FROM labour WHERE labour_id='$r_id'";
						$sql1=mysqli_query($con,$query1);
						$row1=mysqli_fetch_array($sql1);
						echo '<h3>'.$row["sender_designation"].' name:</h3> ';
						echo '<p>&nbsp;&nbsp;&nbsp;'.$row1["labour_name"].'</p>';
			?>
			<h3>Message Details: </h3>

			<div class="mini" style="hight:100px;width:1000px;">
						<pre><?php echo $row['message'];?></pre>
			</div>
			<?php
						echo '<a href="message_box.php?labour_id='.$row1['labour_id'].'">Reply</a>';
					}elseif($row["sender_designation"]=='Client'){
						$query1="SELECT client_id,client_name FROM client WHERE client_id='$r_id'";
						$sql1=mysqli_query($con,$query1);
						$row1=mysqli_fetch_array($sql1);
						echo '<h3>'.$row["sender_designation"].' name:</h3> ';
						echo '<p>&nbsp;'.$row1["client_name"].'</p>';
			?>
			<h3>Message Details: </h3>

			<div class="mini" style="hight:100px;width:1000px;">
						<pre><?php echo $row['message'];?></pre>
			</div>
			<?php
						echo '<a href="message_box.php?client_id='.$row1['client_id'].'">Reply</a>';
					}
				}
			?>
		</div>

	</div>
</div>
</body>
</html>