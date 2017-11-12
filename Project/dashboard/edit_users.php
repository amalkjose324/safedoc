<?php
include_once '../db_connect.php';
include_once 'check_logout.php';
include_once 'profile_check.php';
include_once 'lobibox.php';
$page=$_SESSION['user_page'];
if($page<>'admin.php'){
  if($page<>'s_nodal.php'){
    if($page<>'d_nodal.php'){
      header("location: $page");
    }
  }
}
if(isset($_GET['user_id'])){
  $user_id=$_GET['user_id'];
  $user_type_id=$_GET['user_type_id'];
  ?>
  <link rel="stylesheet" type="text/css" href="css/popup.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <?php
    $query=mysqli_query($con,"SELECT * FROM safedocx_login WHERE login_id=$user_id");
    while($row=mysqli_fetch_array($query)){
      ?>
      <form method="post" id="user_edit_form" class="user_edit_form" onsubmit="return false">
        <div class="form-group ">
          <input type="text" id="u_edit_phone" class="u_edit_phone form-control" placeholder="Phone Number" value="<?php echo $row['login_phone'];?>" name="u_edit_name">
          <span class="cd-error-message u_phone_edit_error" id="u_phone_edit_error" >Invalid Phone Number</span>
        </div>
        <div class="form-group ">
          <input type="text" id="u_edit_email" class="u_edit_email form-control" placeholder="Email Id" value="<?php echo $row['login_email'];?>" name="u_edit_name">
          <span class="cd-error-message u_email_edit_error" id="u_email_edit_error" >Invalid Email Id</span>
        </div>
        <hr>
        <input type="hidden" id="user_id" class="user_id" value="<?php echo $user_id;?>">
        <input type="hidden" id="user_type_id" class="user_type_id" value="<?php echo $user_type_id;?>">
        <input type="submit" class="btn btn-success" style="width:100%;" value="Submit">
        <a href="#0" class="cd-popup-close img-replace">Close</a>
      </div> <!-- cd-popup-container -->
    </form>
    <?php
    }
}
?>
<script src="js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="js/ajaxscripts.js"></script>
<script src="js/popup.js"></script>
