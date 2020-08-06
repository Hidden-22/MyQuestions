<?php
include "../config.php";

$id = $_POST['id'];
$type=$_POST['type'];

if($type=="add")
{
	$query = "update tag set t_deletion_status = 0 where t_id = $id";
	mysqli_query($con,$query);
	echo true;
}
else
{
	$query = "update tag set t_deletion_status = 1 where t_id = $id";
	mysqli_query($con,$query);
	echo true;
}


// Delete record

// $query = "insert into users values(NULL,'shankarpruthvi@gmail.com',1234);";


?>
