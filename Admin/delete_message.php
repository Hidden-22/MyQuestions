<?php
include "../config.php";

$id = $_POST['id'];
$type=$_POST['type'];

// Delete record
if($type=="del")
{
	$query = "update message set m_deletion_status = 1 where m_id = $id ";
	// $query = "insert into users values(NULL,'shankarpruthvi@gmail.com',1234);";
	$flag=mysqli_query($con,$query);
	echo $query;
	if($flag)
	{
	    echo "true";
	}
	else {
	    echo "false";
	}
}
else
{
	$query = "update message set m_deletion_status = 0 where m_id = $id ";
	// $query = "insert into users values(NULL,'shankarpruthvi@gmail.com',1234);";
	$flag=mysqli_query($con,$query);
	echo $query;
	if($flag)
	{
	    echo "true";
	}
	else {
	    echo "false";
	}
}

?>
