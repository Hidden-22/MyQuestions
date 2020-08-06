<!DOCTYPE html>
<?php
	require_once('../config.php');
    require_once('session_check.php');

    // if(isset($_POST['btnSub']))
    // {
    //     $t_name=$_POST['t_name'];
    //     $t_description=$_POST['t_description'];
    //     // $t_creation_date=date('y-m-d h:i:s');
    //     // $t_modification_date=date('y-m-d h:i:s');

    //     $str="insert into tag(t_name,t_description,t_deletion_status) values($t_name,$t_description,0);";
    //     // echo "<script> alert($str) </script>";
    //     $result=mysql_query($str,$con);
    //     header("location:index.php");
    // }
?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>MyQuestions</title>
        <!-- <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png"> -->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
        <link href="assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
        <link href="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
        <link href="assets/plugins/c3-master/c3.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/coustm.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
        <link href="css/colors/blue.css" id="theme" rel="stylesheet">

        <script type="text/javascript">
            function add_tag(){
                var t_name = $('#t_name').val();
                var t_description = $('#t_description').val();
                $.ajax({
                        type:'POST',
                        url:'add_tag.php',
                        data:'flag=1&t_name='+t_name+'&t_description='+t_description,
                        beforeSend: function () {
                            $('.submitBtn').attr("disabled","disabled");
                            $('.modal-body').css('opacity', '.5');
                        },
                        success:function(msg){
                            // alert(msg);
                            if(msg == 'ok'){
                                // $('#t_name').val('');
                                // $('#t_description').val('');
                                // $('.statusMsg').html('<span style="color:green;">Thanks for contacting us, we\'ll get back to you soon.</p>');
                                location.reload();
                            }else{
                                $('.statusMsg').html('<span style="color:red;">Some problem occurred, please try again.</span>');
                            }
                            $('.submitBtn').removeAttr("disabled");
                            $('.modal-body').css('opacity', '');
                        }
                });
            }
        </script>
         
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
                            </ul>                    
                        <ul class="navbar-nav my-lg-0">
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
                                	<img src=<?php echo "$imgpath" ?> alt="user" class="profile-pic m-r-10" />
                                    <span class="hide-name"><?php echo "$a_name"; ?></span>
                                </a>
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
                            <li> <a class="waves-effect waves-dark " href="index.php" aria-expanded="false" >
                                    <i class="mdi mdi-gauge"></i>
                                    <span class="hide-menu">Dashboard</span>
                                </a>
                            </li>
                            <li> <a class="waves-effect waves-dark " href="user-list.php" aria-expanded="false" ><i class="mdi mdi-account-multiple"></i><span class="hide-menu">User-List</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark " href="question-list.php" aria-expanded="false" ><i class="mdi mdi-comment-question-outline"></i><span class="hide-menu">Question-List</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark " href="answer-list.php" aria-expanded="false" ><i class="mdi mdi-comment-check-outline"></i><span class="hide-menu">Answer-List</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark active" href="tag-list.php" aria-expanded="false" ><i class="mdi mdi-tag-multiple"></i><span class="hide-menu">Tag-List</span></a>
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

                            <div class=" col-3 col-sm-2 col-md-2 col-lg-2">
                                <button class="btn btn-success" data-toggle="modal" data-target="#modalForm" > Add Tag </button>
                            </div>
                            <div class=" col-3 col-sm-2 col-md-2 col-lg-2">
                            
                                <select style="border-style: none;" class="btn btn-success" id="sel_tag">
                                    <option id="sel_active" value="0">Active</option>
                                    <option id="sel_block" value="1">Block</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row"></div>
                     <!-- Modal -->
                     <div class="container-fluid">
                        <div class="modal fade" id="modalForm" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Tag Form </h4>
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
                                                <label for="inputName">Tag Name</label>
                                                <input type="text" class="form-control" id="t_name" placeholder="Enter your Tag name" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="inputDescription">Descriptions</label>
                                                <textarea class="form-control"  placeholder="Enter your Tag Descriptions" id="t_description"></textarea>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Modal Footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary submitBtn" onclick="add_tag();" >Add Tag</button>
                                    </div>

                                </div>
                            </div>
                        </div>

              			<div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <h4 class="card-title">Tags</h4>
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th><b>id</b></th>
                                                            <th><b>Name</b></th>
                                                            <th><b>Discription</b></th>
                                                            <th><b>Actions</b></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="active-block">
                                                        <?php
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
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                        </div>
                                    </div>
	        		 	       </div>

		                  </div>
              	         </div>
                </div>
            </div>
            <script src="assets/plugins/jquery/jquery.min.js"></script>
            <script src="assets/plugins/bootstrap/js/tether.min.js"></script>
		    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		    <script src="js/jquery.slimscroll.js"></script>
		    <script src="js/waves.js"></script>
		    <script src="js/sidebarmenu.js"></script>
		   	<script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
		    <script src="js/custom.min.js"></script>
		    <script src="assets/plugins/chartist-js/dist/chartist.min.js"></script>
		    <script src="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
		    <script src="assets/plugins/d3/d3.min.js"></script>
		    <script src="assets/plugins/c3-master/c3.min.js"></script>
		    <script src="js/dashboard1.js"></script>
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
                    url: 'delete_tag.php',
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
            <script>
                $(document).ready(function(){
                    $('#sel_tag').on('change',function(){
                        var id = $(this).val();
                        $.ajax({
                            url: 'show-tag.php',
                            type: 'POST',
                            data: { status_id:id },
                            success: function(msg){
                                    $('#active-block').html(msg);
                                }
                        });

                    });

                });
            </script>
            
    </body>
</html>
