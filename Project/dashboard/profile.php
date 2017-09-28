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
  <!-- END VENDOR CSS-->
  <!-- BEGIN ROBUST CSS-->
  <link rel="stylesheet" type="text/css" href="css/bootstrap-extended.css">
  <link rel="stylesheet" type="text/css" href="css/app.css">
  <link rel="stylesheet" type="text/css" href="css/colors.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <!-- END ROBUST CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="css/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="css/core/menu/menu-types/vertical-overlay-menu.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- END Custom CSS-->
</head>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

  <?php include_once 'sidemenu.php'; ?>

  <div class="app-content content container-fluid">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
          <h2 class="content-header-title">Manage Profile</h2>
        </div>
      </div>
      <div class="cd-popup" role="alert">
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
                  <h4 class="card-title" id="basic-layout-square-controls">Donation</h4>
                  <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                  <div class="card-block">
                    <form class="form">
                      <div class="form-body">
                        <input type="file" id="upload" accept="image/*" hidden="hidden">
                        <div class="form-group">
                          <label for="donationinput1">Profile Picture</label>
                        <center>  <div id="upload-demo-i" style="border-radius: 360px;width:202px;height:202px;box-shadow: 1px 1px 10px 3px #888888;"></div></center>
                        </div>
                        <div class="form-group">
                          <label for="donationinput1">Phone Number</label>
                          <input type="text" id="donationinput1" class="form-control square" placeholder="name" name="fullname">
                        </div>

                        <div class="form-group">
                          <label for="donationinput2">Email ID</label>
                          <input type="email" id="donationinput2" class="form-control square" placeholder="email" name="email">
                        </div>

                        <div class="form-group">
                          <label for="donationinput3">Password</label>
                          <input type="tel" id="donationinput3" class="form-control square" name="contact">
                        </div>

                      </div>

                      <div class="form-actions right">
                        <button type="button" class="btn btn-warning mr-1">
                          <i class="icon-cross2"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                          <i class="icon-check2"></i> Save
                        </button>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6" style="z-index: 0;" >
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-square-controls">Donation</h4>
                  <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                  <div class="card-block">

                    <form class="form">
                      <div class="form-body">

                        <div class="form-group">
                          <label for="donationinput1">Full Name</label>
                          <input type="text" id="donationinput1" class="form-control square" placeholder="name" name="fullname">
                        </div>

                        <div class="form-group">
                          <label for="donationinput2">Aadhaar Number</label>
                          <input type="email" id="donationinput2" class="form-control square" placeholder="email" name="email">
                        </div>

                        <div class="form-group">
                          <label for="donationinput3">Date of Birth</label>
                          <input type="tel" id="donationinput3" class="form-control square" name="contact">
                        </div>

                        <div class="form-group">
                          <label for="donationinput4">State</label>
                          <input type="text" id="donationinput4" class="form-control square" placeholder="type of donation" name="donationtype">
                        </div>

                        <div class="form-group">
                          <label for="donationinput4">District</label>
                          <input type="text" id="donationinput4" class="form-control square" placeholder="type of donation" name="donationtype">
                        </div>

                      </div>

                      <div class="form-actions right">
                        <button type="button" class="btn btn-warning mr-1">
                          <i class="icon-cross2"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                          <i class="icon-check2"></i> Save
                        </button>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- // Basic form layout section end -->
      </div>
    </div>
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

  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN ROBUST JS-->
  <script src="js/core/app-menu.js" type="text/javascript"></script>
  <script src="js/core/app.js" type="text/javascript"></script>
  <script src="js/custom.js" type="text/javascript"></script>
  <!-- END ROBUST JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <!-- END PAGE LEVEL JS-->
  <script type="text/javascript">
  $uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
      width: 202,
      height: 202,
      type: 'circle'
    },
    boundary: {
      width: 300,
      height: 300
    }
  });

  $('#upload').on('change', function () {
    try{
      var reader = new FileReader();
      reader.onload = function (e) {
        $uploadCrop.croppie('bind', {
          url: e.target.result
        }).then(function(){
        });
      }
      reader.readAsDataURL(this.files[0]);
    }
    catch(e){
      $('.cd-popup').removeClass('is-visible');
    }

  });

  $('.upload-result').on('click', function (ev) {
    $uploadCrop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function (resp) {
      $.ajax({
        url: "./ajaxpro.php",
        type: "POST",
        data: {"image":resp},
        success: function (data) {
          html = '<img src="' + resp + '" />';
          $("#upload-demo-i").html(html);
          $('.cd-popup').removeClass('is-visible');
        }
      });
    });
  });
  $('#upload-demo-i').on('click', function (ev) {
    $('#upload').click();
    $('.cd-popup-trigger').click();
  });
  $('.upload-select').on('click', function (ev) {
    $('#upload').click();
    $('.cd-popup-trigger').click();
  });

  </script>
</body>
</html>
