
<!DOCTYPE html>
<html>
<head>
	<title>Labour List</title>
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
    <th>Serial No.</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Button</th>
  </tr>
  <?php
      include("session_a.php");
      $query="SELECT labour_id,labour_name,labour_email, labour_phone FROM labour";
      $sql=mysqli_query($con,$query);
      $i=0;
      while($row=mysqli_fetch_array($sql)){
        $i++;
  ?>
  <tr>
    
    <td><?php echo $i; ?></td>
    <td><?php echo $row['labour_name']; ?></td>
    <td><?php echo $row['labour_email']; ?></td>
    <td><?php echo $row['labour_phone']; ?></td>
    <td><a href="message_box.php?labour_id=<?php echo $row['labour_id'];?>" style="border-style:none; padding:5px;background-color:#999;color:#fff;border-radius:2px;">Send Message</a></td>
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