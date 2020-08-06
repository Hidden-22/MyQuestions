<?php
	require_once('../config.php');
	require_once('session_check.php');

	if(isset($_POST['status_id']))
	{
		$status_id=$_POST['status_id'];

		if($status_id==0)
		{
			$res=mysqli_query($con, "SELECT a.*,p.u_id as u_id,p.p_creation_date as p_creation_date,p.p_upvote_count as p_upvote_count,p.p_downvote_count as p_downvote_count,a.a_accepted as a_acceptance_status from answer a,post  p where a.a_id=p.q_a_c_id and p.p_type='a' and p.p_deletion_status=0");
			while($AnswerRow=mysqli_fetch_assoc($res))
            {

                echo"<tr>";
                echo"<td><center>".$AnswerRow['a_id']."<cneter></td>";
                echo"<td><center>".$AnswerRow['q_id']."<cneter></td>";
                echo"<td><center>".$AnswerRow['u_id']."<cneter></td>";
                echo"<td><center>".$AnswerRow['p_upvote_count']."<cneter></td>";
                echo"<td><center>".$AnswerRow['p_downvote_count']."<cneter></td>";
                echo"<td><center>".$AnswerRow['p_creation_date']."<cneter></td>";
                if ($AnswerRow['a_acceptance_status']==0)
                    echo"<td><center> No <cneter></td>";
                else {
                    echo"<td><center> Yes <cneter></td>";
                }
                echo"<td><center>";
                $u_id =  $AnswerRow['u_id'];
                $a_id = $AnswerRow['a_id'];
                ?>
                    <div class="col-md-12 row text-center justify-content-md-left">

                        <span class="delete" id="del_<?php echo $a_id ;?>">
                            <div class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-delete" onclick="action();"></i></a></div>
                        </span>&nbsp;&nbsp;
                        <button style="border:0px; background-color:Transparent; background-repeat:no-repeat;border:none; cursor:pointer; overflow:hidden;" data-toggle="modal" data-target="#modalForm" onclick="set_id(<?php echo $u_id.",".$a_id;?>);" >
                            <span class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-send"></i></a></span>
                        </button>
                    </div>
                <?php
                echo"<cneter></td>";
            	echo"</tr>";
        	}
		}
		else
		{
			$res=mysqli_query($con, "SELECT a.*,p.u_id as u_id,p.p_creation_date as p_creation_date,p.p_upvote_count as p_upvote_count,p.p_downvote_count as p_downvote_count,a.a_accepted as a_acceptance_status from answer a,post  p where a.a_id=p.q_a_c_id and p.p_type='a' and p.p_deletion_status=1");
			while($AnswerRow=mysqli_fetch_assoc($res))
            {

                echo"<tr>";
                echo"<td><center>".$AnswerRow['a_id']."<cneter></td>";
                echo"<td><center>".$AnswerRow['q_id']."<cneter></td>";
                echo"<td><center>".$AnswerRow['u_id']."<cneter></td>";
                echo"<td><center>".$AnswerRow['p_upvote_count']."<cneter></td>";
                echo"<td><center>".$AnswerRow['p_downvote_count']."<cneter></td>";
                echo"<td><center>".$AnswerRow['p_creation_date']."<cneter></td>";
                if ($AnswerRow['a_acceptance_status']==0)
                    echo"<td><center> No <cneter></td>";
                else {
                    echo"<td><center> Yes <cneter></td>";
                }
                echo"<td><center>";
                $u_id =  $AnswerRow['u_id'];
                $a_id = $AnswerRow['a_id'];
                ?>
                    <div class="col-md-12 row text-center justify-content-md-left">

                        <span class="delete" id="add_<?php echo $a_id ;?>">
                            <div class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-reply" onclick="action();"></i></a></div>
                        </span>&nbsp;&nbsp;
                        <button style="border:0px; background-color:Transparent; background-repeat:no-repeat;border:none; cursor:pointer; overflow:hidden;" data-toggle="modal" data-target="#modalForm" onclick="set_id(<?php echo $u_id.",".$a_id;?>);" >
                            <span class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-send"></i></a></span>
                        </button>
                    </div>
                <?php
                echo"<cneter></td>";
            	echo"</tr>";
        	}
		}
	}
?>
