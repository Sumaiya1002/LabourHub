<?php
    include("dbconnect.php");
    if(isset($_GET['job_id'])){
        $job_id=$_GET['job_id'];
        $string="approved";
        $query="UPDATE job_post SET `job_status`='$string' WHERE job_id='$job_id'";
        if (mysqli_query($con, $query)){
            header("Location: admin_approved_post.php");
        }
        else{
            header("Location: pending_post.php");
        }
    }
?>