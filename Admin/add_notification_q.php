<?php
	require_once('../config.php');
    require_once('session_check.php');
    if(isset($_POST['flag']) && !empty($_POST['notification_description']) && !empty($_POST['u_id']) && !empty($_POST['q_id']) )
    {
    	$notification_description=$_POST['notification_description'];
		$u_id = $_POST['u_id'];
        $q_id = $_POST['q_id'];
		$a_c_adm_id = $_SESSION['a_id'];
		$a_c_adm_type = "adm";
        // $notification_creation_date=date("y-m-d h:i:s");
    	// $notification_modification_date=date("y-m-d h:i:s");

		$str1="select q.q_title as q_title from question q,post p where q.q_id = p.q_a_c_id and p.p_type='q' and q.q_id = $q_id and p.p_deletion_status=0 ";
		$res1=mysqli_query($con,$str1);

		$questionRow=mysqli_fetch_assoc($res1);
		if(mysqli_num_rows($res1)==1){
			$notification_title = $questionRow['q_title'];
    	$str="insert into notification values(NULL,$a_c_adm_id,'$a_c_adm_type','$notification_title','$notification_description',$u_id,now(),0,0);";
    	$result=mysqli_query($con,$str);
        $status="";
		if($result)
    	{
    		$status = 'ok';
    	}
    	else
        {
    		$status = 'err';
	    }

	// echo $str;
	echo $status;
}
	}
   // echo mysqli_error($con);
?>
