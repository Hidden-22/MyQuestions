<!doctype html>
<?php
	session_start();
	if(isset($_SESSION['a_email']))
	{
		session_destroy();
		header('location:login.php');
	}
	else{
		header('location:login.php');
	}
?>

<html>
<head>
<meta charset="utf-8">
<title>logout</title>
</head>

<body>
</body>
</html>
