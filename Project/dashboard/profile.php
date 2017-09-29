<?php
include_once '../db_connect.php';
include_once 'check_logout.php';
?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title>Basic Forms - Robust Free Bootstrap Admin Template</title>
  <link rel="apple-touch-icon" sizes="60x60" href="images/ico/apple-icon-60.png">
  <link rel="apple-touch-icon" sizes="76x76" href="images/ico/apple-icon-76.png">
  <link rel="apple-touch-icon" sizes="120x120" href="images/ico/apple-icon-120.png">
  <link rel="apple-touch-icon" sizes="152x152" href="images/ico/apple-icon-152.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/ico/favicon.ico">
  <link rel="shortcut icon" type="image/png" href="images/ico/favicon-32.png">
  <link rel="stylesheet" href="css/croppie.css">

  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <!-- font icons-->
  <link rel="stylesheet" type="text/css" href="fonts/icomoon.css">
  <link rel="stylesheet" type="text/css" href="fonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" type="text/css" href="vendors/css/extensions/pace.css">
  <link rel="stylesheet" href="../css/lobibox.min.css"/>
  <!-- END VENDOR CSS-->
  <!-- BEGIN ROBUST CSS-->
  <link rel="stylesheet" type="text/css" href="css/bootstrap-extended.css">
  <link rel="stylesheet" type="text/css" href="css/app.css">
  <link rel="stylesheet" type="text/css" href="css/colors.css">

  <!-- END ROBUST CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="css/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <link rel="stylesheet" type="text/css" href="css/core/menu/menu-types/vertical-overlay-menu.css">
  <link href="../css/login_css.css" rel="stylesheet">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <!-- END Custom CSS-->
</head>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
  <?php include_once 'sidemenu.php'; ?>
  <div class="app-content content container-fluid">
    <div class="content-wrapper">
      <form class="form" id="profile_form" onsubmit="return false;" method="post">
        <div class="content-header row">
          <button type="submit" class="btn btn-primary profile_save">
            <i class="icon-check"></i> Save
          </button>
          <button type="button" id="cpass-btn" class="btn btn-warning mr-1 profile_save">
            <i class="icon-edit"></i> Change Password.
          </button>
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Manage Profile</h2>
          </div>
        </div>
        <div class="cd-popup" id="profile-pic" role="alert">
          <div class="cd-popup-container">
            <center><div id="upload-demo" style="width:350px"></div></center>
            <button class="btn btn-success upload-select" style="margin-top: -40px;width:150px;">Change Picture</button>
            <button class="btn btn-success upload-result" style="margin-top: -40px;width:150px;">Set Picture</button>
            <a href="#0" class="cd-popup-close img-replace">Close</a>
          </div> <!-- cd-popup-container -->
        </div> <!-- cd-popup -->

        <a href="#0" class="cd-popup-trigger" hidden="hidden">View Pop-up</a>
        <div class="content-body"><!-- Basic form layout section start -->
          <section id="basic-form-layouts">
            <div class="row match-height">
              <div class="col-md-6" style="z-index: 0;">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title" id="basic-layout-square-controls">Account Details</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                  </div>
                  <div class="card-body collapse in">
                    <div class="card-block">
                      <div class="form-body">
                        <input type="file" id="upload" accept="image/*" hidden="hidden">
                        <div class="form-group">
                          <label for="donationinput1">Profile Picture</label>
                          <?php
                          $query=mysqli_query($con,"SELECT * FROM safedocx_login WHERE `login_id`=$user_id ");
                          $login=mysqli_fetch_array($query);
                          $query=mysqli_query($con,"SELECT * FROM safedocx_users WHERE `user_id`=$user_id ");
                          $users=mysqli_fetch_array($query);
                          $query=mysqli_query($con,"SELECT * FROM safedocx_profile_pic WHERE profile_pic_user_id=$user_id");
                          $profile=mysqli_fetch_array($query);
                          $default_state=0;
                          if(isset($users['user_district_id'])){
                            $default_district =$users['user_district_id'];
                            $q=mysqli_query($con,"SELECT * FROM safedocx_districts WHERE district_id=$default_district");
                            while($r=mysqli_fetch_array($q)){
                              $default_state =$r['district_state_id'];
                            }
                          }
                          ?>
                          <center style="margin:18px !important;">  <div id="upload-demo-i" style="border-radius: 360px;width:202px;height:202px;box-shadow: 1px 1px 10px 3px #888888;"><img src="<?php echo('images/profile_pics/'.$profile[2]);?>" alt="No Image"></div></center>
                        </div>
                        <div class="form-group">
                          <label for="profile-phone">Phone Number</label>
                          <input type="text" id="profile-phone" class="in_icon form-control square" placeholder="Phone Number" name="profile-phone" value="<?php echo $login['login_phone']; ?>">
                          <span class="cd-error-message" id="profile-phone-error" >Invalid Phone number!</span>
                        </div>

                        <div class="form-group">
                          <label for="profile-email">Email ID</label>
                          <input type="text" id="profile-email" class="in_icon form-control square" placeholder="Email ID" name="profile-email" value="<?php echo $login['login_email']; ?>">
                          <span class="cd-error-message" id="profile-email-error" >Invalid Email id!</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6" style="z-index: 0;" >
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title" id="basic-layout-square-controls">Personal Details</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                  </div>
                  <div class="card-body collapse in">
                    <div class="card-block">

                      <div class="form-body">

                        <div class="form-group ">
                          <label for="profile-name">Full Name</label>
                          <input type="text" id="profile-name" class="form-control square" placeholder="Full Name" name="profile-name" value="<?php echo $users['user_name']?>">
                          <span class="cd-error-message" id="profile-name-error" >Name must have 3-30 Charectors</span>
                        </div>

                        <div class="form-group">
                          <label for="profile-aadhaar">Aadhaar Number</label>
                          <input type="text" id="profile-aadhaar" class="form-control square" placeholder="Aadhaar Number" name="profile-aadhaar" value="<?php echo $users['user_aadhaar_no']?>">
                          <span class="cd-error-message" id="profile-aadhaar-error" >Invalid Aadhaar Number</span>
                        </div>

                        <div class="form-group">
                          <label for="profile-dob">Date of Birth</label>
                          <input type="date" id="profile-dob" class="form-control square dob" placeholder="Date of Birth" name="profile-dob" value="<?php echo $users['user_dob']?>">
                          <span class="cd-error-message" id="profile-dob-error" >Invalid Date</span>
                        </div>

                        <div class="form-group">
                          <label for="profile-state">State</label>
                          <select id="profile-state" class="form-control square" placeholder="State" name="profile-state">
                            <option selected="true" disabled="disabled">Choose State</option>
                            <?php
                            $query=mysqli_query($con,"SELECT * FROM safedocx_states");
                            while ($row=mysqli_fetch_array($query)) {
                              ?><option value="<?php echo $row['state_id'];?>" <?php echo ($row['state_id'] == $default_state) ? " selected" : ""; ?>><?php echo $row['state_name'];?></option><?php
                            }
                            ?>
                          </select>
                          <span class="cd-error-message" id="profile-state-error" >Select a state</span>
                        </div>

                        <div class="form-group">
                          <label for="profile-district">District</label>
                          <select id="profile-district" class="form-control square" placeholder="District" name="profile-district">
                            <option selected="true" disabled="disabled">Choose District</option>
                            <?php
                            $query=mysqli_query($con,"SELECT * FROM safedocx_districts WHERE district_state_id=$default_state");
                            while ($row=mysqli_fetch_array($query)) {
                              ?><option value="<?php echo $row['district_id'];?>" <?php echo ($row['district_id'] == $default_district) ? " selected" : ""; ?>><?php echo $row['district_name'];?></option><?php
                            }
                            ?>
                          </select>
                          <span class="cd-error-message" id="profile-district-error" >Select a district</span>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- // Basic form layout section end -->
        </div>
      </div>
    </form>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->


  <footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank" class="text-bold-800 grey darken-2">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="icon-heart5 pink"></i></span></p>
  </footer>

  <!-- BEGIN VENDOR JS-->
  <script src="js/core/libraries/jquery.min.js" type="text/javascript"></script>
  <script src="vendors/js/ui/tether.min.js" type="text/javascript"></script>
  <script src="js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
  <script src="vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
  <script src="vendors/js/ui/unison.min.js" type="text/javascript"></script>
  <script src="vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
  <script src="vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
  <script src="vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
  <script src="vendors/js/extensions/pace.min.js" type="text/javascript"></script>
  <script src="js/croppie.js"></script>
  <script src="js/core/app-menu.js" type="text/javascript"></script>
  <script src="js/core/app.js" type="text/javascript"></script>
  <script src="js/popup.js" type="text/javascript"></script>
  <script src="../js/lobibox.min.js"></script>
  <script src="js/ajaxscripts.js"></script>
  <script src="js/profile_pic.js"></script>


</body>
</html>
