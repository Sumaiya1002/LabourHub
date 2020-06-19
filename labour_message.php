<html>
<body>
<head>
	<title>LabourHub : Find Expert Cleaners, Handyman, Electricians for your Home and Office Tasks</title>
     <link rel="stylesheet" type="text/css" href="CSS/policy.css">
     <link rel="stylesheet" type="text/css" href="CSS/labour_message.css">
</head>


	<header>
		<div class="logo">

			<h1 class="logo-text"><span>Labour</span>Hub</h1>
		</div>
    <ul>
        <?php
          include("session_l.php");
          $labour_phone=$_SESSION['labour_phone'];
          $sql="SELECT labour_id,labour_name FROM labour WHERE labour_phone='$labour_phone'";
          $query=mysqli_query($con,$sql);
          $row=mysqli_fetch_array($query);
        ?>
        <li><a href=user-profile.php><?php echo $row["labour_name"]; ?></li>
        <li><a href="tasks.php">Home</a></li>
        <li><a href="category.php">Category</a></li>
        <li><a href="labour_pending_work.php">Work</a></li>
        <li><a href="contact_labour.php">Contact</a></li>
        <li><a href="labour_message.php">Message</a></li>
        <li><a href="logout_l.php">Logout</a></li>
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
      $labour_id=$row["labour_id"];
      $s='Labour';
      $query="SELECT message_id FROM message WHERE receiver_designation='$s' and message_receiver_id='$labour_id'";
      $sql=mysqli_query($con,$query);
      $i=0;
      while($row=mysqli_fetch_array($sql)){
          $i++;
  ?>
  <tr>

    <td><?php echo $i; ?></td>
    <td>Admin</td>
    <td><a href="view_message_l.php?message_id=<?php echo $row['message_id'];?>" style="border-style:none; padding:5px;background-color:#999;color:#fff;border-radius:2px;">View Message</a></td>
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