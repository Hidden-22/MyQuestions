<?php
	require_once('../config.php');
	if(! isset($_SESSION['a_email']))
    {
        header("location:login.php");
    }
    if(isset($_POST['flag']) && !empty($_POST['t_name']) && !empty($_POST['t_description']) )
    {
    	$t_name=$_POST['t_name'];
    	$t_description=$_POST['t_description'];
    	$t_creation_date=date("y-m-d h:i:s");
    	$t_modification_date=date("y-m-d h:i:s");
    	$str="insert into tag (t_name,t_description,t_creation_date, t_modification_date,t_deletion_status,u_Follower_count) values ('".$t_name."','".$t_description."','".$t_creation_date."','".$t_modification_date."',0,0)";
    	$result=mysqli_query($con,$str);
    	if($result)
    	{
    		$status = 'ok';
    	}
    	else
    		$status='err';
    }
    echo $status;
     // echo $str;
   // echo mysqli_error($con);
?>
