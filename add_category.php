
<?php
    include("session_a.php");
    if(isset($_POST['add'])){
        $category_name=$_POST['category_name'];
        $category_image=$_FILES["category_image"];

        $path=$_FILES["category_image"]["name"];
        $target_dir="images/";
        $target_file= $target_dir.basename($path);

        $query="INSERT INTO `job_category`(`category_name`, `category_image`) VALUES ('$category_name','$path')";

        if (mysqli_query($con, $query)){
            move_uploaded_file($_FILES["category_image"]["tmp_name"], $target_file);
            echo '<script language="javascript">';
            echo 'alert("New Category Saved")';
            echo '</script>';
            echo "<script>location.href='add_category.php';</script>";
        }else{
            echo '<script language="javascript">';
            echo 'alert("Not Saved")';
            echo '</script>';
            echo "<script>location.href='add_category.php';</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add New Category</title>
    <link rel="stylesheet" type="text/css" href="CSS/admin_message.css">
</head>
<body>
	<div class="header">
		<center><img src="images/admin_icon.png" alt="adminicon" id="image">
		<br> Welcome To Admin Panel....!</center>
	</div>
<div class="main-content">
	<div class="sidebar">
		<ul>
            <a href="admin_message.php"><li>Check Message</li></a>
			<a href="pending_post.php"><li>Pending Post</li></a>
			<a href="admin_approved_post.php"><li>Approved Post</li></a>
			<a href="add_category.php"><li>Category</li></a>
			<a href="sending_message_labour.php"><li>Labour List</li></a>
            <a href="sending_message_client.php"><li>Client List</li></a>
			<a href="logout_a.php"><li>Logout</li></a>
		</ul>
	</div>
	<div class="content">
        <form method="post" action="add_category.php" enctype="multipart/form-data">
            Category Name:
            <input type="text" class="form-control" required name="category_name" placeholder="Category Name" autocomplete="off" >
            <br>
            <br>
            Category Image:
            <input type="file" class="form-control" required name="category_image">
            <br>
            <br>
            <button type="submit" name="add" style="border-style:none; margin-bottom:4px;padding:10px;background-color:#5cb85c;color:#fff;border-radius:2px;">Add New</button>
        </form>
    <br>
	<table>
  <tr>
    <th>Serial No. </th>
    <th>Category Name</th>
    <th>Category Image</th>   
    <th></th> 
  </tr>
    <?php
        $sql="SELECT * FROM job_category";
        $query=mysqli_query($con, $sql);
        $i=0;
        while($row=mysqli_fetch_array($query)){
            $i++;
            $c_id=$row['category_id'];
    ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['category_name']; ?></td>
    <td><img style="max-height:50px;" src="images/<?php echo $row["category_image"]; ?>" ></td>
    <td><a href="delete_category.php?c_id=<?php echo $c_id; ?>" style="border-style:none; padding:8px;background-color:#999;color:#fff;border-radius:2px;">Delete</a></td>
  </tr>  
    <?php }?>
</table>
		</div>
		
	</div>
</div>
</body> 
</html>