<?php
include_once '../db_connect.php';
include_once 'check_logout.php';
include_once 'profile_check.php';
include_once 'lobibox.php';
$page=$_SESSION['user_page'];
if($page<>'admin.php'){
  echo "<script>window.location.href = '$page';</script>";
}
if(isset($_GET['state_def_id'])){
  $state_def_id=$_GET['state_def_id'];
  ?>
  <link rel="stylesheet" type="text/css" href="css/popup.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <?php
    $query=mysqli_query($con,"SELECT * FROM safedocx_states WHERE state_def_id=$state_def_id");
    while($row=mysqli_fetch_array($query)){
      ?>
      <form method="post" id="state_edit_form" class="state_edit_form" onsubmit="return false">
        <div class="form-group ">
          <input type="text" id="s_edit_id" class="s_edit_id form-control" placeholder="State Id" value="<?php echo $row['state_id'];?>" name="s_edit_id">
          <span class="cd-error-message s_edit_id_error" id="s_edit_id_error" >Invalid State Id</span>
        </div>
        <div class="form-group ">
          <input type="text" id="s_edit_name" class="s_edit_name form-control" placeholder="State Name" value="<?php echo $row['state_name'];?>" name="s_edit_name">
          <span class="cd-error-message s_edit_name_error" id="s_edit_name_error" >Invalid State Name</span>
        </div>
        <hr>
        <input type="hidden" id="state_def_id" class="state_def_id" value="<?php echo $state_def_id;?>">
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
