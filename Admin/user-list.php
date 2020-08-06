<?php
// session_start();
include_once '../config.php';
require_once('session_check.php');
//
// if(!isset($_SESSION['user']))
// {
// header("Location:../../login/index.php");
// }
$res=mysqli_query($con, "SELECT u_id,u_name,u_reputation,u_DOB FROM users_details where u_type='user' and u_deletion_status=0");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>My Questions</title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <script src="assets/plugins/jquery/jquery.min.js"></script>
</head>

<body class="fix-header fix-sidebar card-no-border">
<div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
            <header class="topbar">
                <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">
                            <p style="height: 50px; color: white">  <b><i>My Questions</i></b></p>
                        </a>
                    </div>
                    <div class="navbar-collapse">
                        <ul class="navbar-nav mr-auto mt-md-0">
                            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)">
                                <i class="mdi mdi-menu"> </i> </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav my-lg-0">
                            <?php
                                    $str="select count(m_new_entry_status) from message where m_new_entry_status=0";
                                    $result = mysqli_query($con,$str);
                                    $row=mysqli_fetch_array($result);
                                    $new_message=$row[0];
                                ?>
                            <li class="nav-item dropdown"><a href="message.php" class="link nav-link dropdown-toggle text-muted waves-effect waves-dark" data-toggle="tooltip" title="message"><i class="fas fa-envelope"></i><span class="badge badge-info" style="color: yellow;"><?php if($new_message != 0) {echo $new_message;} ?></span></a></li>
                            <li class="nav-item dropdown" style="margin-right: 5px;">
                                <a class="nav-link  text-muted waves-effect waves-dark" href="Profile.php">
                                        <?php
                                            $a_id=$_SESSION['a_id'];
                                            $str="select u_name,u_photo_path from users_details where u_id= $a_id ";
                                            $result = mysqli_query($con,$str);
                                            $row=mysqli_fetch_array($result);
                                            $imgpath=$row['u_photo_path'];
                                            $a_name=$row['u_name'];
                                        ?>
                                    <img src=<?php echo "$imgpath" ?> alt="user" class="profile-pic m-r-10" /><?php echo "$a_name"; ?></a>
                            </li>

                            <li class="nav-item dropdown"><a href="logout.php" class="link nav-link dropdown-toggle text-muted waves-effect waves-dark" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a></li>
                        </ul>
                    </div>
                </nav>
            </header>

            <aside class="left-sidebar">

                <div class="scroll-sidebar">

                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li> <a class="waves-effect waves-dark" href="index.php" aria-expanded="false" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark active" href="user-list.php" aria-expanded="false" ><i class="mdi mdi-account-multiple"></i><span class="hide-menu">User-List</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark " href="question-list.php" aria-expanded="false" ><i class="mdi mdi-comment-question-outline"></i><span class="hide-menu">Question-List</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark " href="answer-list.php" aria-expanded="false" ><i class="mdi mdi-comment-check-outline"></i><span class="hide-menu">Answer-List</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="tag-list.php" aria-expanded="false" ><i class="mdi mdi-tag-multiple"></i><span class="hide-menu">Tag-List</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="country-state.php" aria-expanded="false" ><i class="mdi mdi-plus-box-outline"></i><span class="hide-menu">Add</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="feedback.php" aria-expanded="false"><i class="mdi mdi-help-circle"></i><span class="hide-menu">Feed Back</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
             </aside>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="card"></div>
                    <div class="row">
                    <div class=" col-3 col-sm-2 col-md-2 col-lg-1">
                            
                                <select style="border-style: none;" class="btn btn-success" id="sel_tag">
                                    <option id="sel_active" value="0">Active</option>
                                    <option id="sel_block" value="1">Block</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="container-fluid">
                <!-- Modal -->
                   <div class="modal fade" id="modalForm" role="dialog">
                       <div class="modal-dialog">
                           <div class="modal-content">
                               <!-- Modal Header -->
                               <div class="modal-header">
                                   <h4 class="modal-title" id="myModalLabel">Notification To User </h4>
                                   <button type="button" class="close" data-dismiss="modal">
                                       <span aria-hidden="false">&times;</span>
                                       <span class="sr-only">Close</span>
                                   </button>

                               </div>

                               <!-- Modal Body -->
                               <div class="modal-body">
                                   <p class="statusMsg"></p>
                                   <form role="form">
                                       <div class="form-group">
                                           <label for="inputName">Subject</label>
                                           <input type="text" class="form-control" id="notification_name" placeholder="Enter your Subject" required />
                                       </div>
                                       <div class="form-group">
                                           <label for="inputDescription">Description</label>
                                           <textarea class="form-control"  placeholder="Enter Description" id="notification_description"></textarea>
                                       </div>
                                   </form>
                               </div>

                               <!-- Modal Footer -->
                               <div class="modal-footer">
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                   <button type="button" class="btn btn-primary submitBtn" onclick="send_notification();" >Send</button>
                               </div>

                           </div>
                       </div>
                   </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Users</h4>
                                <div class="table-responsive">

                                    <table class="table table-hover" >
                                        <thead>
                                            <tr>
                                                <th>User Id</th>
                                                <th>User Name</th>
                                                <th>Reputation</th>
                                                <th>Date Of Joining</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="active-block">
                                            <?php while($userRow=mysqli_fetch_assoc($res))
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
                                                            <div class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-delete" onclick="action();"> </i></a></div>
                                                        </span>
                                                        <button style="border:0px; background-color:Transparent; background-repeat:no-repeat;border:none; cursor:pointer; overflow:hidden;" data-toggle="modal" data-target="#modalForm" onclick="get_u_id(<?php echo $id;?>);" >
                                                            <div class="6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-send"></i></a></div>
                                                        </button>
                                                    </div>
                                                <?php
                                                echo"</td>";
                                            echo"</tr>";
                                        }?>
                                        </tbody>
                                    </table>
                                    <input type="hidden" id='uid' value="" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function action(){

                    // Delete
                    $('.delete').click(function(){
                    var el = this;
                    var id = this.id;
                    var splitid = id.split("_");

                    // Delete id
                    var id = splitid[1];
                    var type=splitid[0];

                    // AJAX Request
                    $.ajax({
                    url: 'delete_user.php',
                    type: 'POST',
                    data: 'id='+id+'&type='+type,
                    success: function(response){
                        // alert(response);
                    // Removing row from HTML Table
                    $(el).closest('tr').css('background','tomato');
                    $(el).closest('tr').fadeOut(800, function(){
                     $(this).remove();
                    });

                    }
                    });

                    });

                    }

    </script>
    <script type="text/javascript">

    function get_u_id(u_id) {
        $("#uid").val(u_id);
        // global id = this.u_id;
    }
    function send_notification(){
        var notification_name = $('#notification_name').val();
        var notification_description = $('#notification_description').val();
        var id = $("#uid").val();
        $.ajax({
                type:'POST',
                url:'add_notification_u.php',
                data:'flag=1&notification_name='+notification_name+'&notification_description='+notification_description+'&u_id='+id,
                beforeSend: function () {
                    $('.submitBtn').attr("disabled","disabled");
                    $('.modal-body').css('opacity', '.5');
                },
                success:function(msg){
                    // alert(msg);
                    if(msg == 'ok'){
                        $('#notification_name').val('');
                        $('#notification_description').val('');
                        $('.statusMsg').html('<span style="color:green;">Notification Send successfully!</p>');
                        // location.reload();
                    }else{
                        $('.statusMsg').html('<span style="color:red;">Some problem occurred, please try again.</span>');
                    }
                    $('.submitBtn').removeAttr("disabled");
                    $('.modal-body').css('opacity', '');
                    }
                });
            }
    </script>
    <script>
                $(document).ready(function(){
                    $('#sel_tag').on('change',function(){
                        var id = $(this).val();
                        $.ajax({
                            url: 'show-user-list.php',
                            type: 'POST',
                            data: { status_id:id },
                            success: function(msg){
                                    $('#active-block').html(msg);
                                }
                        });

                    });

                });
            </script>
    <script src="assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
</body>

</html>
