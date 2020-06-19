
<!DOCTYPE html>
<html>
<head>
	<title>Admin Post Approve</title>
	<link rel="stylesheet" type="text/css" href="CSS/admin_message.css">
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
	<table>
  <tr>
    <th>Job Poster Name</th>
    <th>Job Poster Email</th>
    <th>Date of Post</th>
    <th>Post Title</th>
    <th>Job Location</th>
    <th>Job Packages</th>
    <th>Job Budget</th>
  </tr>
  <?php
      include("session_a.php");

      $query="SELECT * FROM job_post WHERE job_status='approved'";
      $sql=mysqli_query($con,$query);
      while($row=mysqli_fetch_array($sql)){
        $job_id=$row['job_id'];
        $client_id=$row['client_id'];
  ?>
  <tr>
    <?php
        $query1="SELECT client_name, client_email FROM client WHERE client_id='$client_id'";
        $sql1=mysqli_query($con,$query1);
        while($row1=mysqli_fetch_array($sql1)){
          echo "<td>".$row1['client_name']."</td>";
          echo "<td>".$row1['client_email']."</td>";
        }
    ?>
    <td><?php echo $row['job_date']; ?></td>
    <td><?php echo $row['job_name']; ?></td>
    <td><?php echo $row['job_location']; ?></td>
    <td><?php echo $row['job_packages']; ?></td>
    <td><?php echo $row['job_budget']; ?></td>
  </tr>
  <?php
      }
  ?>  
</table>
		</div>
		
	</div>
</div>
</body>
</html>