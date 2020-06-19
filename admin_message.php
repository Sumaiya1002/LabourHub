
<!DOCTYPE html>
<html>
<head>
	<title>Check Message</title>
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
    <th>User Name</th>
    <th>Designation</th>
    <th></th>
  </tr>
  <?php
    include("session_a.php");
    $query="SELECT * FROM message WHERE receiver_designation='Admin'";
    $sql=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($sql)){
      $r_id=$row['message_receiver_id'];

      if($row["sender_designation"]=='Labour'){
        $query1="SELECT labour_name FROM labour WHERE labour_id='$r_id'";
        $sql1=mysqli_query($con,$query1);
        $row1=mysqli_fetch_array($sql1);
        echo '<td>'.$row1['labour_name'].'</td>';
        echo '<td>'.$row['sender_designation'].'</td>';
        echo '<td><a href="view_message.php?message_id='.$row["message_id"].'"><button style="border-style:none; padding:10px;background-color:#999;color:#fff;border-radius:2px;">View Message</button></a></td>';
      }elseif($row["sender_designation"]=='Client'){
        $query1="SELECT client_name FROM client WHERE client_id='$r_id'";
        $sql1=mysqli_query($con,$query1);
        $row1=mysqli_fetch_array($sql1);
        echo '<td>'.$row1['client_name'].'</td>';
        echo '<td>'.$row['sender_designation'].'</td>';
        echo '<td><a href="view_message.php?message_id='.$row["message_id"].'"><button style="border-style:none; padding:10px;background-color:#999;color:#fff;border-radius:2px;">View Message</button></a></td>';
      }
  ?>
  <tr>
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