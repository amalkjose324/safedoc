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

<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
  <div class="app-content content container-fluid">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body"><!-- stats -->
      <?php include_once 'admin_header.php';?>
        <div class="row">
          <div class="col-xl-8 col-lg-12">
            <div class="card">
              <div class="card-body">
                <ul class="list-inline text-xs-center pt-2 m-0">
                  <li class="mr-1">
                    <h6><i class="icon-circle warning"></i> <span class="grey darken-1">Remaining</span></h6>
                  </li>
                  <li class="mr-1">
                    <h6><i class="icon-circle success"></i> <span class="grey darken-1">Completed</span></h6>
                  </li>
                </ul>
                <div class="chartjs height-250">
                  <canvas id="line-stacked-area" height="250"></canvas>
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-xs-3 text-xs-center">
                    <span class="text-muted">Total Projects</span>
                    <h2 class="block font-weight-normal">18</h2>
                    <progress class="progress progress-xs mt-2 progress-success" value="70" max="100"></progress>
                  </div>
                  <div class="col-xs-3 text-xs-center">
                    <span class="text-muted">Total Task</span>
                    <h2 class="block font-weight-normal">125</h2>
                    <progress class="progress progress-xs mt-2 progress-success" value="40" max="100"></progress>
                  </div>
                  <div class="col-xs-3 text-xs-center">
                    <span class="text-muted">Completed Task</span>
                    <h2 class="block font-weight-normal">242</h2>
                    <progress class="progress progress-xs mt-2 progress-success" value="60" max="100"></progress>
                  </div>
                  <div class="col-xs-3 text-xs-center">
                    <span class="text-muted">Total Revenue</span>
                    <h2 class="block font-weight-normal">$11,582</h2>
                    <progress class="progress progress-xs mt-2 progress-success" value="90" max="100"></progress>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-12">
            <div class="card card-inverse bg-info">
              <div class="card-body">
                <div class="position-relative">
                  <div class="chart-title position-absolute mt-2 ml-2 white">
                    <h1 class="display-4">84%</h1>
                    <span>Employees Satisfied</span>
                  </div>
                  <canvas id="emp-satisfaction" class="height-400 block"></canvas>
                  <div class="chart-stats position-absolute position-bottom-0 position-right-0 mb-2 mr-3 white">
                    <a href="#" class="btn bg-info bg-darken-3 mr-1 white">Statistics <i class="icon-stats-bars"></i></a> for the last year.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
