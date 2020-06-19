<?php
	include("session_c.php");
	$client_phone=$_SESSION['client_phone'];
	$sql="SELECT client_id,client_name FROM client WHERE client_phone='$client_phone'";
	$query=mysqli_query($con,$sql);
  $row=mysqli_fetch_array($query);
?>
<html>
<body>
<head>
	<title>LabourHub : Find Expert Cleaners, Handyman, Electricians for your Home and Office Tasks</title>
     <link rel="stylesheet" type="text/css" href="CSS/policy.css">
     <link rel="stylesheet" type="text/css" href="CSS/admin_message.css">
</head>


	<header>
		<div class="logo">

			<h1 class="logo-text"><span>Labour</span>Hub</h1>
		</div>
		<ul>
          <li><a href="client-profile.php"><?php echo $row["client_name"]; ?></a></li>
				  <li><a href="post_tasks.php">Home</a></li>
				  <li><a href="beeding_work.php">Pending Work</a></li>
				  <li><a href="all_post_work.php">All Work</a></li>
				  <li><a href="contact_client.php">Contact</a></li>
				  <li><a href="client_message.php">Message</a></li>
          <li><a href="logout_c.php">Logout</a></li>

		</ul>
</header>

        <div class="content-section-a">

            <div class="rowabout">
                

                   <div class="panel panel-default">
                   
                    <div class="panel-heading">
                   <h4>Your All Work</h4>
                    </div>
                    <div class="panel-body">    
                    <div class=" features">
                    <table>
<table>
  <tr>
    <th>Serial no</th>
    <th>From</th>
    <th></th>
  </tr>
  <?php

      $client_id=$row["client_id"];
      $s='Client';
      $query="SELECT message_id FROM message WHERE receiver_designation='$s' and message_receiver_id='$client_id'";
      $sql=mysqli_query($con,$query);
      $i=0;
      while($row=mysqli_fetch_array($sql)){
          $i++;
  ?>
  <tr>

    <td><?php echo $i; ?></td>
    <td>Admin</td>
    <td><a href="view_message_c.php?message_id=<?php echo $row['message_id'];?>" style="border-style:none; padding:5px;background-color:#999;color:#fff;border-radius:2px;">View Message</a></td>
  </tr>
  <?php
      }
  ?>  
</table>
                    </div>


                    </div>

                    
                    </div>
                   
              
                  </div>
                </div>
                

                </div>

        </div>
          

</body>

</html>