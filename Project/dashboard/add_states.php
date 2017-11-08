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
  <link rel="stylesheet" type="text/css" href="css/popup.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <form method="post" id="state_add_form" class="state_add_form" onsubmit="return false">
    <div class="form-group ">
      <input type="text" id="s_add_id" class="s_add_id form-control" placeholder="State Id" name="s_add_id">
      <span class="cd-error-message s_add_id_error" id="s_add_id_error" >Invalid Id</span>
    </div>
    <div class="form-group ">
      <input type="text" id="s_add_name" class="s_add_name form-control" placeholder="State Name" name="s_add_name">
      <span class="cd-error-message s_add_name_error" id="s_add_name_error" >Invalid State Name</span>
    </div>

    <hr>
    <input type="hidden" id="user_type_id" class="user_type_id" value="<?php echo $user_type_id;?>">
    <input type="submit" class="btn btn-success" style="width:100%;" value="Submit">
    <a href="#0" class="cd-popup-close img-replace">Close</a>
  </div> <!-- cd-popup-container -->
</form>
<script src="js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="js/ajaxscripts.js"></script>
<script src="js/popup.js"></script>
