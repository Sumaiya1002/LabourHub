<?php
	include("session_a.php");

	if(isset($_POST['send'])){
        $message=$_POST['message'];
        $client_id=$_SESSION["client_id"];
        $labour_id=$_SESSION["labour_id"];

        if(empty($labour_id)){
            $query="INSERT INTO `message`(`message`, `message_sender_id`, `message_receiver_id`,`sender_designation`,`receiver_designation`) VALUES ('$message',1,'$client_id','Admin','Client')";
            if (mysqli_query($con, $query)){
                unset($_SESSION['client_id']);
                echo '<script language="javascript">';
                echo 'alert("Message Succesfully Send")';
                echo '</script>';
                echo "<script>location.href='client-profile.php';</script>";
            }else{
                echo $client_id;
                echo 'Die C';
            }
        }elseif(empty($client_id)){
            $query="INSERT INTO `message`(`message`, `message_sender_id`, `message_receiver_id`,`sender_designation`,`receiver_designation`) VALUES ('$message',1,'$labour_id','Admin','Labour')";
            if (mysqli_query($con, $query)){
                unset($_SESSION['labour_id']);
                echo '<script language="javascript">';
                echo 'alert("Message Succesfully Send")';
                echo '</script>';
                echo "<script>location.href='user-profile.php';</script>";
            }else{
                echo $labour_id;
                echo 'Die L';
            }
        }
	}
?>

<html>
<head>
	<title>--LabourHub--</title>
    <link rel="stylesheet" type="text/css" href="CSS/contact.css">
    <link rel="stylesheet" type="text/css" href="CSS/signup.css">
    <script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="signup-form">
		<form method="post" action="message_box.php" >
            
			<div class="signup-body">
                <div class="form-group">
                    <label>From,</label><br>
                    <p><b>Admin</b></p>	
                </div>
                <div class="form-group">
                    <!-- <label>Message</label><br> -->
                    <textarea rows="4" cols="50" name="message"></textarea>

                </div>
                <div class="form-group">
                    <label>To,</label><br>
                    <?php
                        if(isset($_GET['client_id']) || isset($_GET['labour_id'])){
                            $_SESSION['labour_id']='';
                            $_SESSION['client_id']='';
                            if(empty($_GET['client_id'])){
                                $labour_id=$_GET['labour_id'];
                                $_SESSION['labour_id']=$labour_id;
                                $query="SELECT labour_name FROM labour WHERE labour_id='$labour_id'";
                                $sql=mysqli_query($con,$query);
                                $row=mysqli_fetch_array($sql);
                                echo '<p><b>'.$row["labour_name"].'</b> as a Labour.</p>';
                            }elseif(empty($_GET['labour_id'])){
                                $client_id=$_GET['client_id'];
                                $_SESSION['client_id']=$client_id;
                                $query="SELECT client_name FROM client WHERE client_id='$client_id'";
                                $sql=mysqli_query($con,$query);
                                $row=mysqli_fetch_array($sql);
                                echo '<p><b>'.$row["client_name"].'</b> as a Client.</p>';
                            }
                        }
                    ?>
                </div>
                
				<div class="text-bar">
                    <div class="text-center" style="padding-left:275px;">
                        <button type="submit" class="btn-btn" name="send">Send Message</button>
                    </div>
                </div>
			</div>			
		</form>

</body>
</html>