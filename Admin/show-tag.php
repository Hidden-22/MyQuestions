<?php
	require_once('../config.php');
	require_once('session_check.php');

	if(isset($_POST['status_id']))
	{
		$status_id=$_POST['status_id'];

		if($status_id==0)
		{
                $str="select * from tag where t_deletion_status=0";
                $reuslt=mysqli_query($con,$str);
                while($row=mysqli_fetch_array($reuslt)){
                    $id=$row['t_id'];
        ?>
            <tr>
                <td> <?php echo "$row[0]"; ?> </td>
                <td> <?php echo "$row[1]"; ?> </td>
                <td> <?php echo "$row[2]"; ?> </td>
                <td> 
                    <div class="col-md-12 row text-center justify-content-md-left">

                        <span class="delete" id="del_<?php echo $id ;?>">
                            <div class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-delete" onclick="action();"></i></a></div>
                        </span>
                    </div>
                </td>
            </tr>
        <?php } 
		}
		else
		{
			$str="select * from tag where t_deletion_status=1";
                $reuslt=mysqli_query($con,$str);
                while($row=mysqli_fetch_array($reuslt)){
                    $id=$row['t_id'];
        ?>
            <tr>
                <td> <?php echo "$row[0]"; ?> </td>
                <td> <?php echo "$row[1]"; ?> </td>
                <td> <?php echo "$row[2]"; ?> </td>
                <td> 
                    <div class="col-md-12 row text-center justify-content-md-left">

                        <span class="delete" id="add_<?php echo $id ;?>">
                            <div class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-reply" onclick="action();"></i></a></div>
                        </span>
                    </div>
                </td>
            </tr>
        <?php }	
		}
	}
?>