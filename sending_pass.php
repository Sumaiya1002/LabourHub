<?php
	include("dbconnect.php");

	if(isset($_POST["email"]) && isset($_POST["pass"])){
		$email=$_POST["email"];
        $pass=$_POST["pass"];
		require_once 'mail/PHPMailerAutoload.php';

		$mail = new PHPMailer();  // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true;  // authentication enabled
		$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
		$mail->SMTPAutoTLS = false;
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
	
		$mail->Username = 'sumaiya.neub@gmail.com';
		$mail->Password = 'mariyamjamila1234';
		$mail->SetFrom('sumaiya.neub@gmail.com','');
		$mail->addAddress($email);

		$mail->Subject = 'Labour Hub Code';
		$mail->msgHTML("This is your New Password $pass ."); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
		$mail->AltBody = 'HTML messaging not supported';
		if(!$mail->Send()) {
		// 	$error = 'Mail error: '.$mail->ErrorInfo; 
		// 	return false;
		} else {
            $sql="SELECT labour_email FROM labour WHERE labour_email='$email'";
            $query=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($query);
    
            if(empty($row)){
                $sql1="SELECT client_email FROM client WHERE client_email='$email'";
                $query1=mysqli_query($con,$sql1);
                $row1=mysqli_fetch_array($query1);
    
                if(empty($row1)){

                }else{
                    $query_c="UPDATE client SET `client_pass`='$pass' WHERE client_email='$email'";
                    mysqli_query($con,$query_c);
                }
            }else{
                $query_l="UPDATE labour SET `labour_pass`='$pass' WHERE labour_email='$email'";
                mysqli_query($con,$query_l);
            }
		}
	}
?>