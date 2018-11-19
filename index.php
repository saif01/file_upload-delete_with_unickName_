<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'123456');
define('DB_NAME', 'test');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (isset($_POST['submit'])) {

	$file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['img']['name']);
	$storeFile="fileStore/".$file_name;
	$fileName=$_FILES['img']['tmp_name'];

	move_uploaded_file($fileName,$storeFile);
	//move_uploaded_file($_FILES["img"]["tmp_name"],"p_img/driverimg/".$file_name);

$query=mysqli_query($con,"INSERT INTO `file_upload`(`file_name`) VALUES ('$storeFile')");

		if ($query) 
		{
			echo "Upload Completed";
		}
		else
		{
			echo "Not uploaded";
		}
 
}



?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
	<form method="post" enctype="multipart/form-data">
<input type="file" name="img">
<input type="submit" name="submit">
</form>

<table>

	<thead>
		<tr>
			<th>ID</th>
			<th>IMG</th>
			<th>Delete</th>
			

		</tr>


	</thead>


<?php

$query2=mysqli_query($con,"SELECT * FROM `file_upload`");
while($row=mysqli_fetch_array($query2))
    {
?>
<tr>  
<td><?php echo($row['id']);?></td>
<td><img src="<?php echo($row['file_name']);?>"  alt="Image" height="42" width="42"/></td>

<td><a href="delete.php?file_id=<?php echo htmlentities($row['id']);?>" >Delete </a> </td>

</tr>
 

<?php } ?>

</table>
</body>
</html>
