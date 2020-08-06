<?php
	require_once('../config.php');
	require_once('session_check.php');

	if(isset($_POST['status_id']))
	{
		$status_id=$_POST['status_id'];

		if($status_id==0)
		{
			$res=mysqli_query($con, "SELECT u_id,u_name,u_reputation,u_DOB FROM users_details where u_type='user' and u_deletion_status=0");
			while($userRow=mysqli_fetch_assoc($res))
            {
            	echo"<tr>";
                echo"<td>".$userRow['u_id']."</td>";
                echo"<td><a href='u_profile.php?id=".$userRow['u_id']."' class='link'>".$userRow['u_name']."</a></td>";
                echo"<td>".$userRow['u_reputation']."</td>";
                echo"<td>".$userRow['u_DOB']."</td>";
                echo"<td>";
                $id=$userRow['u_id'];
         	?> 
                <!-- <span class="get_u_id" id=<?php echo "$id";?></span> -->
                    <div class="col-md-12 row text-center justify-content-md-left">
                        <span class="delete" id="del_<?php echo $id ;?>">
                            <div class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-delete" onclick="action();"></i></a></div>
                        </span>
                        <button style="border:0px; background-color:Transparent; background-repeat:no-repeat;border:none; cursor:pointer; overflow:hidden;" data-toggle="modal" data-target="#modalForm" onclick="get_u_id(<?php echo $id;?>);" >
                            <div class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-send"></i></a></div>
                        </button>
                    </div>
                <?php
                echo"</td>";
            	echo"</tr>";
            }
		}
		else
		{
			$res=mysqli_query($con, "SELECT u_id,u_name,u_reputation,u_DOB FROM users_details where u_type='user' and u_deletion_status=1");
			while($userRow=mysqli_fetch_assoc($res))
            {
            	echo"<tr>";
                echo"<td>".$userRow['u_id']."</td>";
                echo"<td><a href='u_profile.php?id=".$userRow['u_id']."' class='link'>".$userRow['u_name']."</a></td>";
                echo"<td>".$userRow['u_reputation']."</td>";
                echo"<td>".$userRow['u_DOB']."</td>";
                echo"<td>";
                $id=$userRow['u_id'];
         	?> 
                <!-- <span class="get_u_id" id=<?php echo "$id";?></span> -->
                    <div class="col-md-12 row text-center justify-content-md-left">
                        <span class="delete" id="add_<?php echo $id ;?>">
                            <div class="6"><a href="javascript:void(0)" class="link" ><i class="mdi mdi-reply" onclick="action();"></i></a></div>
                        </span>
                        <button style="border:0px; background-color:Transparent; background-repeat:no-repeat;border:none; cursor:pointer; overflow:hidden;" data-toggle="modal" data-target="#modalForm" onclick="get_u_id(<?php echo $id;?>);" >
                            <div class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-send"></i></a></div>
                        </button>
                    </div>
                <?php
                echo"</td>";
            	echo"</tr>";
            }
		}
	}
?>
