<?php
	include("session_l.php");
	$labour_phone=$_SESSION['labour_phone'];
	$sql="SELECT labour_id FROM labour WHERE labour_phone='$labour_phone'";
	$query=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($query);
    if(isset($_POST["update"])){
        $labour_id=$row["labour_id"];
        $labour_name=$_POST['l_name'];
		$labour_email=$_POST['l_email'];
		$labour_pass=$_POST['l_pass'];
		$labour_phone=$_POST['l_phone'];
		$labour_qua=$_POST['l_qua'];
		$labour_skill=$_POST['l_skill'];

        $query="UPDATE `labour` SET `labour_name`='$labour_name',`labour_email`='$labour_email',`labour_pass`='$labour_pass',`labour_phone`='$labour_phone',`qualification`='$labour_qua',`skill`='$labour_skill' WHERE labour_id='$labour_id'";
        if (mysqli_query($con, $query)){
            echo '<script language="javascript">';
            echo 'alert("Profile Succesfully Updated")';
            echo '</script>';
            echo "<script>location.href='user-profile.php';</script>";
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
			<form method="post" action="account_settings.php">
			
				<table>
				<?php
					if(isset($_GET['labour_id'])){
						$labour_id=$_GET['labour_id'];
						$query="SELECT * FROM labour WHERE labour_id='$labour_id'";
						$sql=mysqli_query($con,$query);
						while($row=mysqli_fetch_array($sql)){
				?>
					<tr>
						<td style="font-weight:bold;">Change Your Username</td>
						<td>
							<input type="text" name="l_name" class="form-control" value="<?php echo $row['labour_name']; ?>"/>
						</td>

					</tr>
					<tr>
						<td style="font-weight:bold;">Change Your Email</td>
						<td>
							<input type="eamil" name="l_email" class="form-control" value="<?php echo $row['labour_email']; ?>"/>
						</td>
					</tr>
					<tr>
						<td style="font-weight:bold;">Change Your Password</td>
						<td>
							<input type="text" name="l_pass" class="form-control" value="<?php echo $row['labour_pass']; ?>"/>
						</td>
					</tr>
					<tr>
						<td style="font-weight:bold;">Change Your Phone</td>
						<td>
							<input type="phone" name="l_phone" class="form-control" value="<?php echo $row['labour_phone']; ?>"/>
						</td>
					</tr>
					<tr>
						<td style="font-weight:bold;">Add Qualification</td>
						<td>
							<input type="text" name="l_qua" class="form-control" value="<?php echo $row['qualification'];?>"/>
						</td>
					</tr>
					<tr>
						<td style="font-weight:bold;">Add Skill</td>
						<td>
							<input type="text" name="l_skill" class="form-control" value="<?php echo $row['skill'];?>"/>
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