<?php
    include("dbconnect.php");
    if(isset($_GET['c_id'])){
        $c_id= $_GET['c_id'];
        $query="DELETE FROM `job_category` WHERE category_id='$c_id'";
        if (mysqli_query($con, $query)){
            echo '<script language="javascript">';
            echo 'alert("Category Succesfully Deleted")';
            echo '</script>';
            echo "<script>location.href='add_category.php';</script>";
        }
    }
?>