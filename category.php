<html>
<body>
<head>
	<title>LabourHub : Find Expert Cleaners, Handyman, Electricians for your Home and Office Tasks</title>
	 <link rel="stylesheet" type="text/css" href="CSS/about.css">
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

        <div class="content-section-a" >
            <div class="rowabout">
                <div class="col-sm-2"></div>

                <div class="col-sm-8"></div>
                <div class="col-sm-2"></div>

                   <div class="panel panel-default">
                   
                    <div class="panel-heading">
                   <h4>Category</h4>
                    </div>
                    <div class="panel-body">    
                    <div class=" features">
                        <h4></h4>
                        <ul>
                    <div class= "lit">  

                    <?php
                        include("dbconnect.php");
                        $sql="SELECT COUNT(category_id) AS id FROM job_category";
                        $query=mysqli_query($con,$sql);
                        $row=mysqli_fetch_assoc($query);
                    ?>

                <h3>We have <?php echo $row["id"]; ?> catgory available and this will be listed below</h3>
                             
                    <?php
                        $sql="SELECT * FROM job_category";
                        $query=mysqli_query($con, $sql);
                        while($row=mysqli_fetch_array($query)){
                    ?>
                    <li><?php echo $row["category_name"]; }?></li>
                             
                        </div>   
                         </ul>
                    </div>
                    
                    </div>
                  
            </div>

        </div>
          

</body>

</html>