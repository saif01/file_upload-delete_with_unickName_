<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'123456');
define('DB_NAME', 'test');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection

if ($_GET['file_id']) {
	
$id=$_GET['file_id'];

$query2=mysqli_query($con,"SELECT * FROM `file_upload` WHERE `id`='$id' ");
while($row=mysqli_fetch_array($query2))
    {

    	$file=$row['file_name'];
    	unlink($file);

   	}

$query=mysqli_query($con,"DELETE FROM `file_upload` WHERE `id`='$id' ");

	
header('location:index.php');
}

?>
