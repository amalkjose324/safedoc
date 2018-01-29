<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="../asset/icons/android-icon-192x192.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Secure, verified and Faster Solution for Document Storage and Share">
  <meta name="keywords" content="SafeDoc, SafeDocx, Share documents, documents, Share doc, Docx">
  <meta name="author" content="SafeDocx">
  <title>SafeDocx : Secure Document Storage &amp; Share</title>
  <link rel="stylesheet" href="./css/doc_item_card.css" type="text/css">
  <link rel="stylesheet" href="./css/radio.scss" type="text/css">
  <link rel="stylesheet" href="./css/jquery.contextMenu.css">

  <?php
  include_once '../db_connect.php';
  include_once 'check_logout.php';
  include_once 'profile_check.php';
  include_once 'sidemenu.php';
  $page=$_SESSION['user_page'];
  if($page<>'users.php'){
    header("location: $page");
  }
  ?>
  <?php
  include_once 'lobibox.php'; ?>

  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- stats -->
          <div class="row card-head">
            <div class="col-xl-3 col-lg-6 col-xs-12">
              <div class="card">
                <div class="card-body">
                  <div class="card-block">
                    <div class="media">
                      <div class="media-body text-xs-left">
                        <h3 class="pink">28</h3>
                        <span>Toatal Documents</span>
                      </div>
                      <div class="media-right media-middle">
                        <i class="icon-bag2 pink font-large-2 float-xs-right"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-xs-12">
              <div class="card">
                <div class="card-body">
                  <div class="card-block">
                    <div class="media">
                      <div class="media-body text-xs-left">
                        <h3 class="teal">16</h3>
                        <span>Shared Links</span>
                      </div>
                      <div class="media-right media-middle">
                        <i class="icon-user1 teal font-large-2 float-xs-right"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-xs-12">
              <div class="card">
                <div class="card-body">
                  <div class="card-block">
                    <div class="media">
                      <div class="media-body text-xs-left">
                        <h3 class="deep-orange">24.89 %</h3>
                        <span>Space Usage</span>
                      </div>
                      <div class="media-right media-middle">
                        <i class="icon-diagram deep-orange font-large-2 float-xs-right"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-xs-12">
              <div class="card">
                <div class="card-body">
                  <div class="card-block">
                    <div class="media">
                      <div class="col-xl-6 col-lg-6 col-xs-6 media-right media-middle add_rm" id="doc_add_btn">
                        <i class="icon-cloud-upload green font-large-1"><br></i>Upload
                      </div>
                      <div class="divider"></div>
                      <div class="col-xl-6 col-lg-6 col-xs-6 media-right media-middle add_rm" id="directory_add_btn">
                        <i class="icon-folder-plus red font-large-1"></i><br>ShareBox
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="doc-list-div" class="col-xl-12 col-md-12 col-sm-12" oncontextmenu="return false;">
            <div class="card doc-list">
              <?php
              $items_count=0;
              $query2=mysqli_query($con,"SELECT * FROM safedocx_docs,safedocx_doc_status,safedocx_shares WHERE doc_status=doc_status_id AND share_doc_id=doc_id AND share_recipient_id=$user_id");
              while($row2=mysqli_fetch_array($query2)){
                $items_count++;
                ?>
                <div class="shared-with-me-document flip-container col-xl-2 col-md-3 col-sm-4" ontouchstart="this.classList.toggle('hover');">
                  <input type="hidden" class="idval" value="<?php echo $row2['doc_id'];?>">
                  <div class="flipper">
                    <div class="front">
                      <div class="media-center-file">
                        <i style="color:#3366cc; " class="icon-file-pdf-o font-large-4 "></i>
                      </div>
                      <div>
                        <p class="inner-flip"><?php echo $row2['doc_caption'];?></p>
                      </div>
                      <div class="doc_status_flip">
                        <?php echo $row2['doc_status_name'];?>
                      </div>
                    </div>
                    <div class="back">
                      <p class="inner-flip"><?php echo $row2['doc_description'];?></p>
                    </div>

                  </div>
                </div>
                <?php
              }
              if($items_count<1){
                ?>
                <div style="text-align:center;margin-top:230px;"><h3>No Documents Found..!</h3></div>
                <?php
              }
              ?>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="cd-popup" id="doc_add_pop" role="alert">
    <div class="cd-popup-container pasvs-pop">
      <h3>Select Documents</h3>
      <hr>
      <form method="post" id="doc_add_form" onsubmit="return false">
        <div class="form-group ">
          <p>You can upload one or more documents/certificates, which should be in pdf format</p>
          <input class="form-control" type="file" id="multiDocx" name="files[]" multiple="multiple" accept="application/pdf"/>
          <span class="cd-error-message" id="docx_upload_error" >Invalid Password</span>
        </div>
        <hr>
        <button id="upload-docx" class="btn btn-success" style="width:100%;">Upload</button>
        <a href="#0" class="cd-popup-close img-replace">Close</a>
      </div> <!-- cd-popup-container -->
    </form>
  </div> <!-- cd-popup -->


  <div class="cd-popup" id="add_directory_pop" role="alert">
    <div class="cd-popup-container pasvs-pop">
      <h3>Add New ShareBox</h3>
      <hr>
      <form method="post" id="directory_add_form" onsubmit="return false">
        <div class="form-group ">
          <input class="form-control" type="text" id="dir_name_add" placeholder="ShareBox Name" name="dir_name_add"/>
          <span class="cd-error-message" id="dir_name_add_error" >Invalid Name..!</span>
        </div>
        <div class="form-group ">
          <textarea class="form-control" id="dir_description_add" placeholder="ShareBox Description" name="dir_description_add"/></textarea>
          <span class="cd-error-message" id="dir_description_add_error" >Invalid Description..!</span>
        </div>
        <hr>
        <input type="submit" class="btn btn-success" style="width:100%;" value="Create ShareBox">
        <a href="#0" class="cd-popup-close img-replace">Close</a>
      </div> <!-- cd-popup-container -->
    </form>
  </div> <!-- cd-popup -->


  <div class="cd-popup" id="doc_share_pop" role="alert">
    <div class="cd-popup-container pasvs-pop">
      <h3>Share Document</h3>
      <hr>
      <form method="post" id="doc_share_form" onsubmit="return false">
        <div class="form-group ">
          <input class="form-control" type="text" id="doc_share_email_phone" placeholder="Recipient's Email / Phone" name="doc_share_email_phone"/>
          <span class="cd-error-message" id="doc_share_email_phone_error" >Invalid details..!</span>
        </div>
        <div class="common-div-share-doc">
        <div class="form-group ">
          <input class="form-control" type="text" id="doc_resp_name" disabled placeholder="Recipient Name" name="doc_resp_name"/>
        </div>
        <hr>
        <input type="hidden" name="share_doc_id" id="share_doc_id" class="share_doc_id">
        <input type="hidden" name="share_resp_id" id="share_resp_id" class="share_resp_id">
        <input type="submit" id="doc_share_submit" class="btn btn-success" style="width:100%;" value="Share Now">
      </div>
        <a href="#0" class="cd-popup-close img-replace">Close</a>
      </div> <!-- cd-popup-container -->
    </form>
  </div> <!-- cd-popup -->

  <div class="cd-popup" id="public_doc_link_pop" role="alert">
    <div class="cd-popup-container pasvs-pop">
      <h3>Public Link Generation</h3>
      <hr>
      <form method="post" id="public_doc_link_form" onsubmit="return false">
        <div class="form-group">
          <input class="form-control" type="text" id="public_doc_link" placeholder="Custom Link" name="public_doc_link"/>
          <span class="cd-error-message" id="public_doc_link_error" >Invalid details..!</span>
        </div>
        <hr>
        <div class="common-div-share-doc">
        <input type="hidden" name="public_link_doc_id" id="public_link_doc_id" class="public_link_doc_id">
        <input type="submit" id="public_doc_link_submit" class="btn btn-success" style="width:100%;" value="Generate Link">
      </div>
        <a href="#0" class="cd-popup-close img-replace">Close</a>
      </div> <!-- cd-popup-container -->
    </form>
  </div> <!-- cd-popup -->
  <!-- ////////////////////////////////////////////////////////////////////////////-->


  <footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank" class="text-bold-800 grey darken-2">SafeDocx </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="icon-heart5 pink"></i></span></p>
  </footer>

  <!-- BEGIN VENDOR JS-->
  <script src="js/jquery.contextMenu.js"></script>
  <script src="js/jquery.ui.position.js"></script>
  <script src="js/context.js"></script>
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

  <script src="js/core/app.js" type="text/javascript"></script>
  <!-- END ROBUST JS-->
  <!-- BEGIN PAGE LEVEL JS-->

  <script src="js/ajaxscripts.js"></script>
  <script src="js/popup.js"></script>
  <script src="js/core/app-menu.js" type="text/javascript"></script>
  <script>
  $(function(){
    $(document).attr("title", "New Title");
  });
  </script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>
