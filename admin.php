<?php
	include("session_a.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="CSS/admin_panel.css">
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
		<center></center>
	</div>
</div>
</body>
</html>