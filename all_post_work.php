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
            include("session_c.php");
            $client_phone=$_SESSION['client_phone'];
            $sql="SELECT client_id,client_name FROM client WHERE client_phone='$client_phone'";
            $query=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($query);
          ?>
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
    <th>Labour Name</th>
    <th>Labour Email</th>
    <th>Post Title</th>
    <th>Job Budget</th>
    <th>Status</th>
  </tr>
  <?php
      include("dbconnect.php");

      $client_id=$row['client_id'];
      $query="SELECT job_id,job_name,job_date,job_budget FROM job_post WHERE job_status='approved' and client_id='$client_id'";
      $sql=mysqli_query($con,$query);
      while($row=mysqli_fetch_array($sql)){
        $job_id=$row['job_id'];
  ?>
  <tr>
    <?php
        $query1="SELECT * FROM claimed WHERE status!='Beed' and job_id='$job_id'";
        $sql1=mysqli_query($con, $query1);
        while($row1=mysqli_fetch_array($sql1)){
            $claimed_id=$row1['claimed_id'];
            $labour_id=$row1['labour_id'];

            $query2="SELECT labour_name,labour_email FROM labour WHERE labour_id='$labour_id'";
            $sql2=mysqli_query($con, $query2);
            while($row2=mysqli_fetch_array($sql2)){
    ?>
    <td><?php echo $row2['labour_name']; ?></td>
    <td><?php echo $row2['labour_email']; }?></td>
    <td><?php echo $row['job_name']; ?></td>
    <td><?php echo $row['job_budget']; ?></td>
    <td><?php echo $row1['status']; ?></td>
  </tr>
  <?php
        }
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