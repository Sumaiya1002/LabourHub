<!DOCTYPE html>

<html>
<head>
	<title>LabourHub : Find Expert Cleaners, Handyman, Electricians for your Home and Office Tasks</title>
	
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body id="homepage">
	<header>
		<nav>
			<div class="logo"><h1>LabourHub</h1></div>
			<div class="menu">
				  <a href="index.html">Home</a>
                  
                  <a href="about.html">About</a>
                  <a href="policy.html">Policy</a>
                  <a href="contact.html">Contact</a>
                  <a href="category.php">Category</a>
                  <a href="signin.php">Login</a>
                  <a href="signup.php">Register</a>
			</div>
		</nav>
			<main>
				<section>
					<h1> Welcome To LabourHub</h1>
					<p>Book helper's for domestic help such as shifting cleaning etc..</p>
					<a href="post_tasks.php" class="btnone">Post A Task</a>
					<a href="tasks.php" class="btntwo">Earn Money</a>
				</section>
			</main>

		
	</header>
	<section>
	<div class="body-box">
        <h3>What do you need done?</h3>
        <div class="categories-container">
        <?php
            include("dbconnect.php");
            $sql="SELECT * FROM job_category";
            $query=mysqli_query($con, $sql);
            while($row=mysqli_fetch_array($query)){
        ?>
			<div class="column">
                <a href="">
                   <img src="images/<?php echo $row["category_image"]; ?>" >
                    <p><?php echo $row["category_name"]; ?></p>
                </a>
             </div>
        <?php
            }
        ?>
        </div>
	</div>
	<div class="container">
		<div class="row">
			<h3>What is LabourHub?</h3>
			 <p>LabourHub is a trusted marketplace for people and businesses to outsource their tasks, whether you are looking for work or you need someone to do a specific task we are here to help you hire. Skilled people can earn extra income through our website.<br>
            It works in 3 simple steps. Just post the required task to be done, chose the right person for your job by checking ratings, and wait for it to be done.</p>
		</div>

	</div>
	<div class="container row2">
		 <div id="col" >
            <img src="images/post_task_icon.png">
            <a href=""><h2>Post Your Task</h2></a>
            <p id="des">Tell us what you need. It's FREE to post.</p>
                     
        </div>
                     
        <div id="col">
                        
            <img src="images/hire_icon.png">
            <a href=""><h2>Hire The Right Tasker</h2></a>
            <p id="des"style="margin-left:2px;">Choose the right person for your task and get it done.</p>
        </div>

	</div>
</section>
<footer>
	<div class="navbar-footer">
		
			 <div class="row3">
                <div class="col2">
                    <h3>Discover</h3>
                    <ul>
                        <li><a href="#">How It Works</a></li>
                        <li><a href="#">Earn Money</a></li>
                        
                    </ul>
                </div>
                <div class="col2">
                    <h3>LabourHub</h3>
                    <ul>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="policy.html">Terms and Condition</a></li>
                         <li><a href="contact.html">Contact Us</a></li>
                          <li><a href="policy.html">Privacy Policy </a></li>
                        
                    </ul>
                </div>
               
                 <div class="col2">
                    <h3>Existing Members</h3>
                    <ul>
                        <li><a href="#">Post a task</a></li>
                        <li><a href="#">Earn Money</a></li>
                         <li><a href="signin.php">Login</a></li>
                         
                        
                    </ul>
                </div>

            </div>
		</div>
	<div class="copy">
         &copy; All Reserverd By Labourhub | Designed By Sumaiya & Sweety
    </div>
	
</footer>
</body>
</html>