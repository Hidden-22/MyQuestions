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
                            <li class="nav-item dropdown"><a href="" class="link nav-link dropdown-toggle text-muted waves-effect waves-dark" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a></li>                
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
                            <li> <a class="waves-effect waves-dark " href="user-list.php" aria-expanded="false" ><i class="mdi mdi-account-multiple"></i><span class="hide-menu">User-List</span></a>
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
                            <li> <a class="waves-effect waves-dark active" href="profile.php" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Profile</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
             </aside> 
             

             <!-- get admin other details php code -->

                                    <?php
                                        $str="select * from users_details where u_id= $a_id ";
                                            $result = mysqli_query($con,$str);
                                            $row=mysqli_fetch_assoc($result);
                                            $u_description=$row['u_description'];
                                            $u_DOB=$row['u_DOB'];
                                            $u_designation=$row['u_designation'];
                                            $u_contry=$row['u_contry'];
                                            $u_state=$row['u_state'];
                                            $u_type=$row['u_type'];
                                    
                                    ?>

            <div class="page-wrapper">
         		<div class="container-fluid">
                    <div class="row page-titles "></div>
                    <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <center class="m-t-30"> <img src=<?php  echo $imgpath ?> class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?php  echo $a_name?> </h4>
                                    <h6 class="card-subtitle"><?php  echo $u_type?></h6>
                                </center>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Column -->
                    <!-- Column -->

                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <form class="form-horizontal form-material" action="update.php" method="post">
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="u_name" value="<?php  echo $a_name ?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" value="<?php  echo $_SESSION['a_email'] ?> " class="form-control form-control-line" name="u_email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input type="password"  name="u_password" value="<?php  echo $_SESSION['pwd'] ?> " class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Date Of Birth</label>
                                        <div class="col-md-12">
                                            <input type="text" name="u_DOB" value="<?php  echo $u_DOB?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Country</label>
                                        <div class="col-md-12">
                                            <select class="form-control form-control-line" name="u_contry">

                                                <?php
                                                  $all_country = mysqli_query($con,"select * from country where country_deletion_status=0;");
                                    
                                                  while ($country_row=mysqli_fetch_array($all_country)) { ?>
                                                        <option  <?php if($country_row['country_name']==$u_contry){?> selected <?php } ?> value= <?php echo $country_row['country_name']; ?> > <?php echo $country_row['country_name']; ?> </option>
                                                   <?php }  
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">state</label>
                                        <div class="col-md-12">
                                            <select class="form-control form-control-line" name="u_state">

                                                <?php
                                                  $all_state = mysqli_query($con,"select * from state where state_deletion_status=0;");
                                    
                                                  while ($state_row=mysqli_fetch_array($all_state)) { ?>
                                                        <option  <?php if($state_row['state_name']==$u_state){?> selected <?php } ?> value= <?php echo $state_row['state_name']; ?> > <?php echo $state_row['state_name']; ?> </option>
                                                   <?php }  
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Designation</label>
                                        <div class="col-md-12">
                                            <input type="text" name="u_designation" value="<?php  echo $u_designation ?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Description</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" name="u_description" class="form-control form-control-line"><?php echo $u_description;?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" value="submit" name="btn_sub" class="btn btn-success">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
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
    </body>
</html>