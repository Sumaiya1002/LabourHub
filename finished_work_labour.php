<?php
    include("dbconnect.php");
    if(isset($_GET['claimed_id'])){
        $claimed_id=$_GET['claimed_id'];
        $string="Finished";
        $query="UPDATE claimed SET `status`='$string' WHERE claimed_id='$claimed_id'";
        if (mysqli_query($con, $query)){
            header("Location: labour_pending_work.php");
        }
        else{
            header("Location: index.php");
        }
    }
?>