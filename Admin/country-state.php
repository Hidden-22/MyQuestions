<!DOCTYPE html>
<?php
	require_once('../config.php');
    require_once('session_check.php');
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
                            <li> <a class="waves-effect waves-dark " href="index.php" aria-expanded="false" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark " href="user-list.php" aria-expanded="false" ><i class="mdi mdi-account-multiple"></i><span class="hide-menu">User-List</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark " href="question-list.php" aria-expanded="false" ><i class="mdi mdi-comment-question-outline"></i><span class="hide-menu">Question-List</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark " href="answer-list.php" aria-expanded="false" ><i class="mdi mdi-comment-check-outline"></i><span class="hide-menu">Answer-List</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="tag-list.php" aria-expanded="false" ><i class="mdi mdi-tag-multiple"></i><span class="hide-menu">Tag-List</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark active" href="country-state.php" aria-expanded="false" ><i class="mdi mdi-plus-box-outline"></i><span class="hide-menu">Add</span></a>
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
                    
                    </div>
                    <div class="row"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- <div class="card"> -->
                                    <!-- <div class="card-block"> -->
                                        <center>
                                            <!-- <label> Select Action :  </label> -->
                                            <select id="sel_action" onclick="select_action();" style="border-style: none;" class="btn btn-success">
                                                <option value="">Select Country Action</option>
                                                <option value="0">Add Country</option>
                                                <option value="1">Delete Country</option>
                                            </select>
                                        </center>
                                    <!-- </div> -->
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="row"><div class="card"></div></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-block">
                                        
                                            <div class="table-responsive " >
                                            <h4 class="card-title">Country</h4>
                                                <table class="table">
                                                    <tbody id="country">
                                                        <tr>
                                                            <td style="width:20%;"><center>Select Country</center></td>
                                                            <td style="width:60%;">
                                                                <select style="border-style: none; width:70%; border-bottom-style:dashed; border-radius:50px;" class="btn-success">
                                                                    <option>Select Action</option>
                                                                </select>
                                                            </td >
                                                            <td style="width:20%;">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- <div class="card"> -->
                                    <!-- <div class="card-block"> -->
                                        <center>
                                            <!-- <label> Select Action :  </label> -->
                                            <select id="sel_action_state" onclick="select_action_state();" style="border-style: none;" class="btn btn-success">
                                                <option value="">Select State Action</option>
                                                <option value="0">Add State</option>
                                                <option value="1">Delete State</option>
                                            </select>
                                        </center>
                                    <!-- </div> -->
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="row"><div class="card"></div></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-block">
                                        
                                            <div class="table-responsive " >
                                            <h4 class="card-title">State</h4>
                                                <table class="table">
                                                    <tbody id="state">
                                                        <tr>
                                                            <td style="width:20%;"><center>Select State</center></td>
                                                            <td style="width:60%;">
                                                                <select style="border-style: none; width:70%; border-bottom-style:dashed; border-radius:50px;" class="btn-success">
                                                                    <option>Select Country</option>
                                                                </select>
                                                            </td >
                                                            <td style="width:20%;">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
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
                function set_id(){
                    $('#change_country').on('change',function(){
                        var get_id = $('#change_country').val();
                        var splitid = get_id.split("_");
                        var id=splitid[1];
                        $('#add_delete').val(id);
                    });
                }
            </script>
            <script>
                function set_state_id(){
                    $('#change_state').on('change',function(){
                        var get_id = $('#change_state').val();
                        var splitid = get_id.split("_");
                        var id=splitid[1];
                        $('#add_delete_state').val(id);
                    });
                }
            </script>
            <script>
                function select_action(){
                    $('#sel_action').on('change',function(){
                        var id = $(this).val();
                        $.ajax({
                            url: 'show-country.php',
                            type: 'POST',
                            data: { status_id:id },
                            success: function(msg){
                                    // alert(msg);
                                    $('#country').html(msg);
                                }
                        });

                    });

                }
            </script>
            <script>
                function select_action_state(){
                    $('#sel_action_state').on('change',function(){
                        var id = $('#change_country').val();
                        var splitid = id.split("_");
                        var id=splitid[1];
                        var type=$(this).val();
                        $.ajax({
                            url: 'show-state.php',
                            type: 'POST',
                            data: 'country_id='+id+'&type='+type+'&flag=1',
                            success: function(msg){
                                    // alert(msg);
                                    $('#state').html(msg);
                                }
                        });

                    });

                }
            </script>
            <script>
                function change_state(){
                    $('#change_country').on('change',function(){
                        var id = $(this).val();
                        var splitid = id.split("_");
                        var id=splitid[1];
                        var type=$('#sel_action').val();
                        $.ajax({
                            url: 'show-state.php',
                            type: 'POST',
                            data: 'country_id='+id+'&flag=0',
                            success: function(msg){
                                    // alert(msg);
                                    $('#state').html(msg);
                                }
                        });

                    });

                }
            </script>
            <script>
                function country_action(){
                    $('.delete').click(function(){
                        var id = $('#add_delete').val();

                        //type 0=add and 1=delete

                        var type = $('#sel_action').val();

                        // AJAX Request
                        $.ajax({
                            url: 'add-delete-country.php',
                            type: 'POST',
                            data: 'id='+id+'&type='+type,
                            success: function(msg){
                                $("#change_country option[value='del_"+id+"']").remove();
                                //change_state();
                                }
                        });

                    });

                }
            </script>
            <script>
                function state_action(){
                    $('.delete').click(function(){
                        var id = $('#add_delete_state').val();

                        //type 0=add and 1=delete

                        var type = $('#sel_action_state').val();

                        // AJAX Request
                        $.ajax({
                            url: 'add-delete-state.php',
                            type: 'POST',
                            data: 'id='+id+'&type='+type,
                            success: function(msg){
                                // alert(msg)
                                $("#change_state option[value='del_"+id+"']").remove();
                                //change_state();
                                }
                        });

                    });

                }
            </script>    
    </body>
</html>