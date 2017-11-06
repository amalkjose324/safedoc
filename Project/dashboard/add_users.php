<?php
include_once '../db_connect.php';
include_once 'check_logout.php';
include_once 'profile_check.php';
include_once 'lobibox.php';
$page=$_SESSION['user_page'];
if($page<>'admin.php'){
  header("location: $page");
}
if(isset($_GET['user_type_id'])){
  $user_type_id=$_GET['user_type_id'];
  ?>
  <link rel="stylesheet" type="text/css" href="css/popup.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <form method="post" id="user_add_form" class="user_add_form" onsubmit="return false">
    <div class="form-group ">
      <input type="text" id="u_add_phone" class="u_add_phone form-control" placeholder="Phone Number" name="u_add_name">
      <span class="cd-error-message u_phone_add_error" id="u_phone_add_error" >Invalid Phone Number</span>
    </div>
    <div class="form-group ">
      <input type="text" id="u_add_email" class="u_add_email form-control" placeholder="Email Id" name="u_add_name">
      <span class="cd-error-message u_email_add_error" id="u_email_add_error" >Invalid Email Id</span>
    </div>
    <hr>
    <input type="hidden" id="user_type_id" class="user_type_id" value="<?php echo $user_type_id;?>">
    <input type="submit" class="btn btn-success" style="width:100%;" value="Submit">
    <a href="#0" class="cd-popup-close img-replace">Close</a>
  </div> <!-- cd-popup-container -->
</form>
<?php
}
?>
<script src="js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="js/ajaxscripts.js"></script>
<script src="js/popup.js"></script>
