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
    <th>Client Name</th>
    <th>Client Email</th>
    <th>Work Title</th>
    <th>Job Budget</th>
    <th>Status</th>
  </tr>
  <?php
      include("dbconnect.php");

      $labour_id=$row['labour_id'];
      $query1="SELECT job_id,claimed_id,status FROM claimed WHERE status!='Beed' and labour_id='$labour_id'";
      $sql1=mysqli_query($con, $query1);
      while($row1=mysqli_fetch_array($sql1)){
          $claimed_id=$row1['claimed_id'];
          $job_id=$row1['job_id'];
          $status=$row1['status'];
  ?>
  <tr>
    <?php

        $query="SELECT job_name,job_date,job_budget,client_id FROM job_post WHERE job_status='approved' and job_id='$job_id'";
        $sql=mysqli_query($con,$query);
        while($row=mysqli_fetch_array($sql)){
            $client_id=$row['client_id'];

            $query2="SELECT client_name,client_email FROM client WHERE client_id='$client_id'";
            $sql2=mysqli_query($con, $query2);
            while($row2=mysqli_fetch_array($sql2)){
    ?>
    <td><?php echo $row2['client_name']; ?></td>
    <td><?php echo $row2['client_email']; }?></td>
    <td><?php echo $row['job_name']; ?></td>
    <td><?php echo $row['job_budget']; ?></td>
    <?php
        if($row1['status']=='Confirmed'){
    ?> 
        <td><a type="button" style="border-style:none; padding:5px;background-color:green;color:#fff" href="approve_work_labour.php?claimed_id=<?php echo $claimed_id;?>">Approve</a></td>
    <?php
        }elseif($row1['status']=='Ongoing'){
    ?>
        <td><a type="button" style="border-style:none; padding:5px;background-color:green;color:#fff" href="finished_work_labour.php?claimed_id=<?php echo $claimed_id;?>">Done</a></td>
    <?php
        }else{
    ?>
        <td><?php echo $row1['status']; ?></td>
    <?php
        }
    ?>
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