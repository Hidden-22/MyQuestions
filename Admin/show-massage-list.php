<?php
	require_once('../config.php');
	require_once('session_check.php');

	if(isset($_POST['status_id']))
	{
		$status_id=$_POST['status_id'];

		if($status_id==0)
		{
			$res=mysqli_query($con, "SELECT * FROM message where m_deletion_status=0");
			while($massageRow=mysqli_fetch_assoc($res))
            {
            	echo"<tr>";
                echo"<td>".$massageRow['m_id']."</td>";
                echo"<td>".$massageRow['u_id']."</td>";
                echo"<td>".$massageRow['m_description']."</td>";
                echo"<td>".$massageRow['m_creation_date']."</td>";
                echo"<td>";
                $id=$massageRow['u_id'];
                ?>
                <!-- <span class="get_u_id" id=<?php echo "$id";?></span> -->
                    <div class="col-md-12 row text-center justify-content-md-left">
                        <span class="delete" id="del_<?php echo $massageRow['m_id'] ;?>">
                            <div class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-delete" onclick="action();"> </i></a></div>
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
			$res=mysqli_query($con, "SELECT * FROM message where m_deletion_status=1");
			while($massageRow=mysqli_fetch_assoc($res))
            {
            	echo"<tr>";
                echo"<td>".$massageRow['m_id']."</td>";
                echo"<td>".$massageRow['u_id']."</td>";
                echo"<td>".$massageRow['m_description']."</td>";
                echo"<td>".$massageRow['m_creation_date']."</td>";
                echo"<td>";
                $id=$massageRow['u_id'];
                ?>
                <!-- <span class="get_u_id" id=<?php echo "$id";?></span> -->
                    <div class="col-md-12 row text-center justify-content-md-left">
                        <span class="delete" id="add_<?php echo $massageRow['m_id'] ;?>">
                            <div class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-reply" onclick="action();"> </i></a></div>
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