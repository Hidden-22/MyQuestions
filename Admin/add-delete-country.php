<?php
include "../config.php";

$id = $_POST['id'];
$type= $_POST['type'];

if($type==0)
{
	$query = "update country set country_deletion_status = 0 where country_id = $id";
	mysqli_query($con,$query);
	echo true;
}	
else
{
	$query = "update country set country_deletion_status = 1 where country_id = $id";
	mysqli_query($con,$query);
	echo true;

}
	


// Delete record

// $query = "insert into users values(NULL,'shankarpruthvi@gmail.com',1234);";


?>
