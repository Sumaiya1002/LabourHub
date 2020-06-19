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
			<form method="post" action="change_image.php" enctype="multipart/form-data">
				<?php
					include("session_l.php");
					$labour_phone=$_SESSION['labour_phone'];
					$sql="SELECT labour_id FROM labour WHERE labour_phone='$labour_phone'";
					$query=mysqli_query($con,$sql);
					$row=mysqli_fetch_array($query);
					if(isset($_POST['update'])){
						$labour_id=$row["labour_id"];

                        $path=$_FILES["image_name"]["name"];
                        $target_dir="images/user_client_images/";
                        $target_file= $target_dir.basename($path);
                
                        $query="UPDATE `labour` SET `image`='$path' WHERE labour_id='$labour_id'";
                        if (mysqli_query($con, $query)){
                            move_uploaded_file($_FILES["image_name"]["tmp_name"], $target_file);
                            echo '<script language="javascript">';
                            echo 'alert("New Picture Succesfully Updated")';
                            echo '</script>';
                            echo "<script>location.href='user-profile.php';</script>";
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