<?php
include "../config.php";

$id = $_POST['id'];
$type=$_POST['type'];

// Delete record
if($type=="del")
{
	$query = "update post set p_deletion_status=1 where q_a_c_id =  $id and p_type= 'q' ";
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
	$query = "update post set p_deletion_status=0 where q_a_c_id =  $id and p_type= 'q' ";
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

// Delete record

?>
