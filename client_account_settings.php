<?php
	include("session_c.php");
	$client_phone=$_SESSION['client_phone'];
	$sql="SELECT * FROM client WHERE client_phone='$client_phone'";
	$query=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($query);

    if(isset($_POST["update"])){
        $client_id=$row["client_id"];
        $client_name=$_POST['c_name'];
		$client_email=$_POST['c_email'];
		$client_pass=$_POST['c_pass'];
		$client_phone=$_POST['c_phone'];

        $query="UPDATE `client` SET `client_name`='$client_name',`client_email`='$client_email',`client_pass`='$client_pass',`client_phone`='$client_phone' WHERE client_id='$client_id'";
        if (mysqli_query($con, $query)){
            echo '<script language="javascript">';
            echo 'alert("Profile Succesfully Updated")';
            echo '</script>';
            echo "<script>location.href='client-profile.php';</script>";
        }else{
            echo 'Die';
        }
  	}
?>

<!DOCTYPE html>

<html>
<head>
	<title>Account Settings</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/account_setting.css">

</head>
<body>
	<div class="row">
		
		
		<div class="container">
			<h2 align="center">Change Account Settings</h2>
			<form method="post" action="client_account_settings.php">
			
				<table>
				<?php
					include("dbconnect.php");
					if(isset($_GET['client_id'])){
						$client_id=$_GET['client_id'];
						$query="SELECT * FROM client WHERE client_id='$client_id'";
						$sql=mysqli_query($con,$query);
						while($row=mysqli_fetch_array($sql)){
				?>
					<tr>
						<td style="font-weight:bold;">Change Your Username</td>
						<td>
							<input type="text" name="c_name" class="form-control" value="<?php echo $row['client_name']; ?>"/>
						</td>

					</tr>
					<tr>
						<td style="font-weight:bold;">Change Your Email</td>
						<td>
							<input type="eamil" name="c_email" class="form-control" value="<?php echo $row['client_email']; ?>"/>
						</td>
					</tr>
					<tr>
						<td style="font-weight:bold;">Change Your Password</td>
						<td>
							<input type="text" name="c_pass" class="form-control" value="<?php echo $row['client_pass']; ?>"/>
						</td>
					</tr>
					<tr>
						<td style="font-weight:bold;">Change Your Phone</td>
						<td>
							<input type="phone" name="c_phone" class="form-control" value="<?php echo $row['client_phone']; ?>"/>
						</td>
					</tr>
					<tr align ="center">
						<td colspan ="6">
							<button type="submit" name="update">Update</button>						 	
						</td>
					</tr>
				<?php
						}
					}
				?>
				</table>
			</form>			
		</div>
 

</div>

</body>
</html>