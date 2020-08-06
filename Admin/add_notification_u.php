<?php
	require_once('../config.php');
    require_once('session_check.php');
    if(isset($_POST['flag']) && !empty($_POST['notification_name']) && !empty($_POST['notification_description']) && !empty($_POST['u_id']) )
    {
    	$notification_name=$_POST['notification_name'];
    	$notification_description=$_POST['notification_description'];
		$id = $_POST['u_id'];
		$a_c_adm_id = $_SESSION['a_id'];
		$a_c_adm_type = "adm";
		// $notification_creation_date=date("y-m-d h:i:s");
    	// $notification_modification_date=date("y-m-d h:i:s");
    	$str="insert into notification values(NULL,$a_c_adm_id,'$a_c_adm_type','$notification_name','$notification_description',$id,now(),0,0);";
    	$result=mysqli_query($con,$str);

		if($result)
    	{
    		$status = 'ok';
    	}
    	else
    		$status = 'err';
	}
    // echo $status;
	// echo $str;
	echo $status;
	// echo $result;
   // echo mysqli_error($con);
?>
