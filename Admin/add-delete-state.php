<?php
include "../config.php";

$id = $_POST['id'];
$type= $_POST['type'];

if($type==0)
{
	$query = "update state set state_deletion_status = 0 where state_id = $id";
	mysqli_query($con,$query);
	echo $query;
}	
else
{
	$query = "update state set state_deletion_status = 1 where state_id = $id";
	mysqli_query($con,$query);
	echo $query;

}
	


// Delete record

// $query = "insert into users values(NULL,'shankarpruthvi@gmail.com',1234);";


?>
