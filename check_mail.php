<?php
    include("dbconnect.php");
    if(isset($_POST["email"])){
        $email=$_POST["email"];
        $sql="SELECT labour_email FROM labour WHERE labour_email='$email'";
        $query=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($query);

        if(empty($row)){
            $sql1="SELECT client_email FROM client WHERE client_email='$email'";
            $query1=mysqli_query($con,$sql1);
            $row1=mysqli_fetch_array($query1);

            if(empty($row1)){
                echo "<h3>This email doesnot exist</h3>";
                echo "<script>document.getElementById('sentbtn').disabled = true;</script>";
            }else{
                echo "<h3></h3>";
                echo "<script>document.getElementById('sentbtn').disabled = false;</script>";
            }
        }else{
            echo "<h3></h3>";
            echo "<script>document.getElementById('sentbtn').disabled = false;</script>";
        }
    }
?>