<?php
    include("dbconnect.php");
    if(isset($_GET['claimed_id']) && isset($_GET['client_id'])){
        $claimed_id=$_GET['claimed_id'];
        $client_id=$_GET['client_id'];

        $query="SELECT job_name,job_date,job_budget FROM job_post WHERE job_status='approved' and client_id='$client_id'";
        $sql=mysqli_query($con,$query);
        while($row=mysqli_fetch_array($sql)){

          $query1="SELECT * FROM claimed WHERE claimed_id='$claimed_id'";
          $sql1=mysqli_query($con, $query1);
          while($row1=mysqli_fetch_array($sql1)){
              $labour_id=$row1['labour_id'];
  
              $query2="SELECT labour_name,labour_email FROM labour WHERE labour_id='$labour_id'";
              $sql2=mysqli_query($con, $query2);
              while($row2=mysqli_fetch_array($sql2)){

                    require_once 'mail/PHPMailerAutoload.php';

                    $mail = new PHPMailer();  // create a new object
                    $mail->IsSMTP(); // enable SMTP
                    $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
                    $mail->SMTPAuth = true;  // authentication enabled
                    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
                    $mail->SMTPAutoTLS = false;
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 587;
                
                    $mail->Username = 'sumaiya.neub@gmail.com';
                    $mail->Password = 'mariyamjamila1234'; 
                    $mail->SetFrom('sumaiya.neub@gmail.com','');
                    $mail->addAddress($row2["labour_email"]);

                    $mail->Subject = 'Confirmation Work';
                    $mail->msgHTML("Congratulations, ".$row2['labour_name']."! You are selected for this ".$row['job_name']." job.
                                    This job was posted in ".$row['job_date']." and it's budget is ".$row['job_budget'].". ");
                                    //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
                    $mail->AltBody = 'HTML messaging not supported';
                    if(!$mail->Send()) {
                    // 	$error = 'Mail error: '.$mail->ErrorInfo; 
                    // 	return false;
                    } else {
                        // header("location:home.php");
                    // 	$error = 'Message sent!';
                    // 	return true;
                    }
                }
            }
        }

        $string="Confirmed";

        $query_u="UPDATE claimed SET `status`='$string' WHERE claimed_id='$claimed_id'";
        if (mysqli_query($con, $query_u)){
            header("Location: all_post_work.php");
        }
        else{
            header("Location: beeding_work.php");
        }
    }
?>