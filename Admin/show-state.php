<?php
	require_once('../config.php');
	require_once('session_check.php');

	if(isset($_POST['country_id']))
	{
		$country_id=$_POST['country_id'];
        $flag=$_POST['flag'];

		if($flag==0)
        {
                $str="select * from state where country_id=$country_id;";
                $reuslt=mysqli_query($con,$str);
            ?>
            <tr>
                <td style="width:20%;"><center>Select State Action</center></td>
                <td style="width:60%;">
                    <select style="border-style: none; width:70%; border-bottom-style:dashed; border-radius:50px;" class="btn-success" onclick="" id="">
                    <?php                        
                        while($row=mysqli_fetch_array($reuslt)){
                            $id=$row['state_id'];
                    ?>
                        <option id="option" value=""><?php echo $row['state_name']; ?></option>
                    <?php } ?>
                    </select>
                </td >
            </tr>
            <?php
    }
    else
    {
        $type=$_POST['type'];
        if($type==1)
		{
                $str="select * from state where state_deletion_status=0 and country_id=$country_id;";
                $reuslt=mysqli_query($con,$str);
        ?>
            <tr>
                <td style="width:20%;"><center>Select Action</center></td>
                <td style="width:60%;">
                    <select style="border-style: none; width:70%; border-bottom-style:dashed; border-radius:50px;" class="btn-success" onclick="set_state_id();" id="change_state">
                    <?php                        
                        while($row=mysqli_fetch_array($reuslt)){
                            $id=$row['state_id'];
                    ?>
                        <option id="option" value="del_<?php echo $id; ?>"><?php echo $row['state_name']; ?></option>
                    <?php } ?>
                    </select>
                </td >
                <td style="width:20%;" >
                   <center> <div class="col-md-12 row text-center justify-content-md-left">

                            <span class="delete" id='add_delete_state'> 
                                <div class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-delete" onclick="state_action();"></i></a></div>
                            </span>
                        </div></center>
                </td>
            </tr>
        <?php 
		}
		else
		{
			$str="select * from state where state_deletion_status=1 and country_id=$country_id;";
                $reuslt=mysqli_query($con,$str);
        ?>
            <tr>
                <td style="width:20%;"><center>Select Action</center></td>
                <td style="width:60%;">
                    <select style="border-style: none; width:70%; border-bottom-style:dashed; border-radius:50px;" class="btn-success" onclick="set_state_id();" id="change_state">
                    <?php                        
                        while($row=mysqli_fetch_array($reuslt)){
                            $id=$row['state_id'];
                    ?>
                        <option id="option" value="del_<?php echo $id; ?>"><?php echo $row['state_name']; ?></option>
                    <?php } ?>
                    </select>
                </td >
                <td style="width:20%;">
                   <center> <div class="col-md-12 row text-center justify-content-md-left">

                            <span class="delete" id='add_delete_state'> 
                                <div class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-checkbox-marked-circle" onclick="state_action();"></i></a></div>
                            </span>
                        </div></center>
                </td>
            </tr>
        <?php 	
        }
	}
}
?>