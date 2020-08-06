<?php
	require_once('../config.php');
	require_once('session_check.php');

	if(isset($_POST['status_id']))
	{
		$status_id=$_POST['status_id'];

		if($status_id==0)
		{
			$res=mysqli_query($con, "SELECT p.u_id as u_id,p.p_creation_date as p_creation_date,p.p_upvote_count as p_upvote_count,p.p_downvote_count as p_downvote_count , q.* FROM question q,post p where (p.q_a_c_id=q.q_id and p.p_type='q') and p.p_deletion_status=0");
            while($questionRow=mysqli_fetch_assoc($res))
            {
                $t_ids_array = explode(',',$questionRow['q_related_tag_ids']);
                // $t_names;
                //print_r($t_ids_array);

                echo"<tr>";
                echo"<td><center>".$questionRow['q_id']."<cneter></td>";
                echo"<td><center>".$questionRow['u_id']."<cneter></td>";
                echo"<td><center>".$questionRow['q_title']."<cneter></td>";
                echo"<td><center>";
                foreach($t_ids_array as $t_id)
                {
                    //echo"$t_id";

                    $res1=mysqli_query($con,"select t_name from tag where t_id= $t_id and t_deletion_status=0");
                    $tag_row= mysqli_fetch_assoc($res1);
                    echo"$tag_row[t_name]";

                    if(next($t_ids_array)==NULL)
                    {
                        break;
                    }
                    echo"<span style=\"font-size:30px\">, </span>";
                }
                echo"<cneter></td>";
                echo"<td><center>".$questionRow['p_upvote_count']."<cneter></td>";
                echo"<td><center>".$questionRow['p_downvote_count']."<cneter></td>";
                echo"<td><center>".$questionRow['q_total_view']."<cneter></td>";
                echo"<td><center>".$questionRow['p_creation_date']."<cneter></td>";
                echo"<td>";
                $u_id =  $questionRow['u_id'];
                $q_id =  $questionRow['q_id'];
                ?>

                    <div class="col-md-12 row text-center justify-content-md-left">

                        <span class="delete" id="del_<?php echo $q_id ;?>">
                            <span class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-delete" onclick="action();" ></i></a></span>
                        </span>
                        <button style="border:0px; background-color:Transparent; background-repeat:no-repeat;border:none; cursor:pointer; overflow:hidden;" data-toggle="modal" data-target="#modalForm" onclick="set_id(<?php echo $u_id.",".$q_id;?>);" >
                            <span class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-send"></i></a></span>
                        </button>
                    </div>
                <?php
                echo"</td>";
                echo"</tr>";

            }
		}
		else
		{
			$res=mysqli_query($con, "SELECT p.u_id as u_id,p.p_creation_date as p_creation_date,p.p_upvote_count as p_upvote_count,p.p_downvote_count as p_downvote_count , q.* FROM question q,post p where (p.q_a_c_id=q.q_id and p.p_type='q') and p.p_deletion_status=1");
            while($questionRow=mysqli_fetch_assoc($res))
            {
                $t_ids_array = explode(',',$questionRow['q_related_tag_ids']);
                // $t_names;
                //print_r($t_ids_array);

                echo"<tr>";
                echo"<td><center>".$questionRow['q_id']."<cneter></td>";
                echo"<td><center>".$questionRow['u_id']."<cneter></td>";
                echo"<td><center>".$questionRow['q_title']."<cneter></td>";
                echo"<td><center>";
                foreach($t_ids_array as $t_id)
                {
                    //echo"$t_id";

                    $res1=mysqli_query($con,"select t_name from tag where t_id= $t_id and t_deletion_status=0");
                    $tag_row= mysqli_fetch_assoc($res1);
                    echo"$tag_row[t_name]";

                    if(next($t_ids_array)==NULL)
                    {
                        break;
                    }
                    echo"<span style=\"font-size:30px\">, </span>";
                }
                echo"<cneter></td>";
                echo"<td><center>".$questionRow['p_upvote_count']."<cneter></td>";
                echo"<td><center>".$questionRow['p_downvote_count']."<cneter></td>";
                echo"<td><center>".$questionRow['q_total_view']."<cneter></td>";
                echo"<td><center>".$questionRow['p_creation_date']."<cneter></td>";
                echo"<td>";
                $u_id =  $questionRow['u_id'];
                $q_id =  $questionRow['q_id'];
                ?>

                    <div class="col-md-12 row text-center justify-content-md-left">

                        <span class="delete" id="add_<?php echo $q_id ;?>">
                            <span class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-reply" onclick="action();" ></i></a></span>
                        </span>
                        <button style="border:0px; background-color:Transparent; background-repeat:no-repeat;border:none; cursor:pointer; overflow:hidden;" data-toggle="modal" data-target="#modalForm" onclick="set_id(<?php echo $u_id.",".$q_id;?>);" >
                            <span class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-send"></i></a></span>
                        </button>
                    </div>
                <?php
                echo"</td>";
                echo"</tr>";

            }
		}
	}
?>
