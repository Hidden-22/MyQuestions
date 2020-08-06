<?php
 require('../config.php');
if(! isset($_SESSION['a_email']))
{
    header("location:login.php");
}
elseif($_SERVER['REQUEST_URI']=='/myquestions/Admin/session_check.php') {
     header("location:login.php");
 }
 ?>
