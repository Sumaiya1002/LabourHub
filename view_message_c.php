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
            <?php
                include("session_c.php");
                $client_phone=$_SESSION['client_phone'];
                $sql="SELECT client_id,client_name FROM client WHERE client_phone='$client_phone'";
                $query=mysqli_query($con,$sql);
                $row=mysqli_fetch_array($query);
            ?>
            <li><a href=user-profile.php><?php echo $row["client_name"]; ?></li>
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
                    </div>
                    <div class="panel-body">    
                    <div class=" features" style="width:500px;height:300px;margin-left:250px;">
                        <?php
                            include("dbconnect.php");

                            if(isset($_GET['message_id'])){
                                $message_id=$_GET['message_id'];
                                $query ="SELECT message,message_receiver_id,sender_designation,receiver_designation FROM message WHERE message_id='$message_id'";
                                $sql=mysqli_query($con,$query);
                                $row=mysqli_fetch_array($sql);
                                $r_id=$row['message_receiver_id'];
                                echo '<h3>From: </h3>';
                                echo '<p>'.$row["sender_designation"].'</p>';

                                if($row["receiver_designation"]=='Client'){
                                    $query1="SELECT client_name FROM client WHERE client_id='$r_id'";
                                    $sql1=mysqli_query($con,$query1);
                                    $row1=mysqli_fetch_array($sql1);
                                    echo '<h3>To: </h3>';
                                    echo '<p>'.$row1["client_name"].'</p>';
                        ?>
                        <h3>Message Details: </h3>

                        <div class="mini" >
                            <pre><?php echo $row['message'];?></pre>
                        </div>
                        <?php
                                    echo '<a href="contact_client.php">Reply</a>';
                                }
                            }
                        ?>
                    </div>


                    </div>

                    
                    </div>
                   
              
                  </div>
                </div>
                

                </div>

        </div>
          

</body>

</html>