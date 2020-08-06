<?php  
	require_once('../config.php');
	if(! isset($_SESSION['u_email']))
    {
        header("location:login.php");
    }

	if(isset($_SESSION['u_email']))
	{
		header("location:index.php");
	}
	if(isset($_POST['btn_sub']))
	{
		$a_id=$_SESSION['u_id'];
		$a_name=$_POST['u_name'];	
		$u_email=$_POST['u_email'];
		$u_password=$_POST['u_password'];
		$u_description=$_POST['u_description'];
		$u_DOB=$_POST['u_DOB'];
        $u_designation=$_POST['u_designation'];
        $u_contry=$_POST['u_contry'];
        $u_state=$_POST['u_state'];

        $str="update users_details set u_name='$a_name',u_DOB='$u_DOB',u_contry='$u_contry',u_state='$u_state',u_description='$u_description',u_designation='$u_designation' where u_id=$a_id" ;
        $result = mysqli_query($con,$str);
        $str="update users set u_email='$u_email',u_password='$u_password' where u_id=$a_id ";
		$result = mysqli_query($con,$str);

		$_SESSION['u_email']=$u_email;
		$_SESSION['pwd']=$u_password;

       
        header("location:profile.php");
	}
?>