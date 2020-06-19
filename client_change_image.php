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
			<form method="post" action="client_change_image.php" enctype="multipart/form-data">
				<?php
					include("session_c.php");
					$client_phone=$_SESSION['client_phone'];
					$sql="SELECT client_id FROM client WHERE client_phone='$client_phone'";
					$query=mysqli_query($con,$sql);
					$row=mysqli_fetch_array($query);
					if(isset($_POST['update'])){
                        $client_id=$row["client_id"];

                        $path=$_FILES["image_name"]["name"];
                        $target_dir="images/user_client_images/";
                        $target_file= $target_dir.basename($path);
                
                        $query="UPDATE `client` SET `image`='$path' WHERE client_id='$client_id'";
                        if (mysqli_query($con, $query)){
                            move_uploaded_file($_FILES["image_name"]["tmp_name"], $target_file);
                            echo '<script language="javascript">';
                            echo 'alert("New Picture Succesfully Updated")';
                            echo '</script>';
                            echo "<script>location.href='client-profile.php';</script>";
                        }
                    }
                ?>
                <table>
                	<tr>
						<td style="font-weight:bold;">Upload image</td>
						<td>
							<input type="file" name="image_name" class="form-control"/>
                        </td>
                    </tr>
                    <tr align ="center">
						<td colspan ="6">
							<button type="submit" name="update">Update</button>						 	
						</td>
					</tr>
                </table>					
			</form>			
		</div>
 

</div>

</body>
</html>