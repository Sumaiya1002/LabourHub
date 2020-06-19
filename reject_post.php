<?php
    include("dbconnect.php");
    if(isset($_GET['job_id'])){
        $job_id= $_GET['job_id'];
        $query="DELETE FROM `job_post` WHERE job_id='$job_id'";
        if (mysqli_query($con, $query)){
            header("location:pending_post.php");
        }
    }
?>