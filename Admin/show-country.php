<?php
	require_once('../config.php');
	require_once('session_check.php');

	if(isset($_POST['status_id']))
	{
		$status_id=$_POST['status_id'];

		if($status_id==1)
		{
                $str="select * from country where country_deletion_status=0";
                $reuslt=mysqli_query($con,$str);
        ?>
            <tr>
                <td style="width:20%;"><center>Select Action</center></td>
                <td style="width:60%;">
                    <select style="border-style: none; width:70%; border-bottom-style:dashed; border-radius:50px;" class="btn-success" onclick="set_id();change_state();" id="change_country">
                    <?php                        
                        while($row=mysqli_fetch_array($reuslt)){
                            $id=$row['country_id'];
                    ?>
                        <option id="option" value="del_<?php echo $id; ?>"><?php echo $row['country_name']; ?></option>
                    <?php } ?>
                    </select>
                </td >
                <td style="width:20%;" >
                   <center> <div class="col-md-12 row text-center justify-content-md-left">

                            <span class="delete" id='add_delete'> 
                                <div class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-delete" onclick="country_action();"></i></a></div>
                            </span>
                        </div></center>
                </td>
            </tr>
        <?php 
		}
		else
		{
			$str="select * from country where country_deletion_status=1";
                $reuslt=mysqli_query($con,$str);
        ?>
            <tr>
                <td style="width:20%;"><center>Select Action</center></td>
                <td style="width:60%;">
                    <select style="border-style: none; width:70%; border-bottom-style:dashed; border-radius:50px;" class="btn-success" onclick="set_id();change_state();" id="change_country">
                    <?php                        
                        while($row=mysqli_fetch_array($reuslt)){
                            $id=$row['country_id'];
                    ?>
                        <option id="option" value="del_<?php echo $id; ?>"><?php echo $row['country_name']; ?></option>
                    <?php } ?>
                    </select>
                </td >
                <td style="width:20%;">
                   <center> <div class="col-md-12 row text-center justify-content-md-left">

                            <span class="delete" id='add_delete'> 
                                <div class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-checkbox-marked-circle" onclick="country_action();"></i></a></div>
                            </span>
                        </div></center>
                </td>
            </tr>
        <?php 	
        }
	}
?>