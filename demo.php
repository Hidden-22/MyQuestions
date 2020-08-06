<?php
	include('connection.php');
	$str="select * from feedback order by ase";
	$reuslt=mysqli_query($con,$str);
	while($row=mysqli_fetch_array($reuslt)){
		echo "$row[0]";
		echo "$row[1]";
		echo "$row[2]";
		echo "$row[3]";
	}



	//venish shiyani
	//alvis vadaliya

?>
