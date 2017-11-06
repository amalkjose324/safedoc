<?php
include_once '../db_connect.php';
include_once 'check_logout.php';
include_once 'profile_check.php';
include_once 'lobibox.php';
$page=$_SESSION['user_page'];
if($page<>'admin.php'){
  header("location: $page");
}
?>

<?php include_once 'sidemenu.php'; ?>

<body  data-open="click" data-menu="vertical-menu" data-col="2-columns" class=" vertical-layout vertical-menu 2-columns  fixed-navbar">
  <div class="app-content content container-fluid">
    <div class="content-wrapper ">
      <div class="content-header row">
      </div>
      <div class="content-body dt_body"><!-- stats -->
        <?php include_once 'admin_header.php';?>
        <div id="doc-list-div" class="col-xl-7 col-md-7 col-sm-7" oncontextmenu="return false;">
          <div class="card doc-list dt_body ">
              <p class="dist_state">Districts Details</p>
            <form class="form_user_add" method="post"  onsubmit="return false;" style="display:inline-block;margin: 0px;float:right;">
              <input type="hidden" id="user_type_id" class="user_type_id" value="4">
              <button type="submit" class="btn btn-primary " style="margin:-14px;margin-left:0px;"><i class='icon-plus'></i>  Add New District</button>
            </form>
            <div id="district_data" class="col-xl-12 col-md-12 col-sm-12">
            </div>
          </div>
        </div>
        <div id="doc-list-div" class="col-xl-5 col-md-5 col-sm-5" oncontextmenu="return false;">
          <div class="card doc-list dt_body">
            <p class="dist_state">State Details </p>
            <form class="form_user_add" method="post"  onsubmit="return false;" style="display:inline-block;margin: 0px;">
              <input type="hidden" id="user_type_id" class="user_type_id" value="4">
              <button type="submit" class="btn btn-primary " style="margin:-14px;margin-left:0px;"><i class='icon-plus'></i>  Add New State</button>
            </form>
            <div id="state_data" class="col-xl-12 col-md-12 col-sm-12">
            </div>
          </div>
        </div>
        <script>
        $(document).ready( function () {
          $('#state_data').load('./states.php');
          $('#district_data').load('./districts.php');
        });
        </script>
      </div>
    </div>
  </div>

  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank" class="text-bold-800 grey darken-2">SafeDocx </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="icon-heart5 pink"></i></span></p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="vendors/js/ui/tether.min.js" type="text/javascript"></script>
  <script src="js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
  <script src="vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
  <script src="vendors/js/ui/unison.min.js" type="text/javascript"></script>
  <script src="vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
  <script src="vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
  <script src="vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
  <script src="vendors/js/extensions/pace.min.js" type="text/javascript"></script>
  <script src="../js/ajaxscripts.js"></script>
  <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="vendors/js/charts/chart.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN ROBUST JS-->
  <script src="js/core/app-menu.js" type="text/javascript"></script>
  <script src="js/core/app.js" type="text/javascript"></script>
  <!-- END ROBUST JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
  <script src="js/ajaxscripts.js"></script>
  <script src="js/popup.js"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>
