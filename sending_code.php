<?php
    session_start();
    include("dbconnect.php");

    if(isset($_POST["code"])){
        $email_l=$_SESSION["email_l"];
        $email_c=$_SESSION["email_c"];
        $code=$_POST["code"];

        require_once 'mail/PHPMailerAutoload.php';
    
        if(empty($email_c)){
            

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
            $mail->addAddress($email_l);
    
            $mail->Subject = 'Labour Hub Code';
            $mail->msgHTML("This is your one time verification code $code ."); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
            $mail->AltBody = 'HTML messaging not supported';
            if(!$mail->Send()) {
            // 	$error = 'Mail error: '.$mail->ErrorInfo; 
            // 	return false;
            } else {
                // header("location:home.php");
            // 	$error = 'Message sent!';
            // 	return true;
            }
            $query="UPDATE labour SET `status`='$code' WHERE labour_email='$email_l'";
            mysqli_query($con,$query);

        }elseif(empty($email_l)){
            

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
            $mail->addAddress($email_c);
    
            $mail->Subject = 'Labour Hub Code';
            $mail->msgHTML("This is your one time verification code $code ."); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
            $mail->AltBody = 'HTML messaging not supported';
            if(!$mail->Send()) {
            // 	$error = 'Mail error: '.$mail->ErrorInfo; 
            // 	return false;
            } else {
                // header("location:home.php");
            // 	$error = 'Message sent!';
            // 	return true;
            }
            $query="UPDATE client SET `status`='$code' WHERE client_email='$email_c'";
            mysqli_query($con,$query);
        }
    }
?>