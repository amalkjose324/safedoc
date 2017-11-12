<?php
include_once '../db_connect.php';
include_once 'check_logout.php';
include_once 'profile_check.php';
include_once 'lobibox.php';
$page=$_SESSION['user_page'];
if($page<>'admin.php'){
  if($page<>'s_nodal.php'){
    header("location: $page");
  }
}
?>
  <link rel="stylesheet" type="text/css" href="css/popup.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <form method="post" id="district_add_form" class="district_add_form" onsubmit="return false">
    <div class="form-group ">
      <input type="text" id="d_add_id" class="d_add_id form-control" placeholder="District Id" name="d_add_id">
      <span class="cd-error-message d_add_id_error" id="d_add_id_error" >Invalid Id</span>
    </div>
    <div class="form-group ">
      <input type="text" id="d_add_name" class="d_add_name form-control" placeholder="District Name" name="d_add_name">
      <span class="cd-error-message d_add_name_error" id="d_add_name_error" >Invalid District Name</span>
    </div>
    <div class="form-group ">
    <?php if($page=='s_nodal.php'){
      $userid=$_SESSION['user_id'];
      $q=mysqli_query($con,"SELECT * FROM safedocx_users WHERE user_id=$userid");
      while ($r=mysqli_fetch_array($q)) {
      ?>
        <input type="hidden" id="d_add_sname" class="d_add_sname form-control" name="d_add_sname" value="<?php echo $r['user_district_id'];?>">
      <?php
      }
      ?>
      <input type="hidden" id="d_add_sname" class="d_add_sname form-control" name="d_add_sname" value="">
        </div><?php
    }
    else{
      ?>
      <div class="form-group ">
        <select id="d_add_sname" class="d_add_sname form-control" name="d_add_sname">
          <option selected disabled>Select State</option>
        <?php
          $query=mysqli_query($con,"SELECT * FROM safedocx_states");
          while ($row=mysqli_fetch_array($query)) {
            ?>
            <option value="<?php echo $row['state_id'];?>"><?php echo $row['state_name'];?></option>
            <?php
          }
         ?>
       </select>
        <span class="cd-error-message d_add_sname_error" id="d_add_sname_error" >Select State</span>
      </div>
      <?php
    }
    ?>
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
