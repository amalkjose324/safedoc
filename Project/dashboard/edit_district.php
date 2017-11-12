<?php
include_once '../db_connect.php';
include_once 'check_logout.php';
include_once 'profile_check.php';
include_once 'lobibox.php';
$page=$_SESSION['user_page'];
if($page<>'admin.php'){
  header("location: $page");
}
if(isset($_GET['district_def_id'])){
  $district_def_id=$_GET['district_def_id'];
  ?>
  <link rel="stylesheet" type="text/css" href="css/popup.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <?php
    $query=mysqli_query($con,"SELECT * FROM safedocx_districts,safedocx_states WHERE state_id=district_state_id AND district_def_id=$district_def_id");
    while($row=mysqli_fetch_array($query)){
      ?>
      <form method="post" id="district_edit_form" class="district_edit_form" onsubmit="return false">
        <div class="form-group ">
          <input type="text" id="d_edit_id" class="d_edit_id form-control" placeholder="district Id" value="<?php echo $row['district_id'];?>" name="d_edit_id">
          <span class="cd-error-message d_edit_id_error" id="d_edit_id_error" >Invalid district Id</span>
        </div>
        <div class="form-group ">
          <input type="text" id="d_edit_name" class="d_edit_name form-control" placeholder="district Name" value="<?php echo $row['district_name'];?>" name="d_edit_name">
          <span class="cd-error-message d_edit_name_error" id="d_edit_name_error" >Invalid district Name</span>
        </div>
        <div class="form-group ">
          <select id="d_edit_sname" class="d_edit_sname form-control" name="d_edit_sname">
            <option selected value="<?php echo $st_id=$row['state_id'];?>"><?php echo $row['state_name'];?></option>
          <?php
            $query2=mysqli_query($con,"SELECT * FROM safedocx_states WHERE state_id<>$st_id");
            while ($row2=mysqli_fetch_array($query2)) {
              ?>
              <option value="<?php echo $row2['state_id'];?>"><?php echo $row2['state_name'];?></option>
              <?php
            }
           ?>
         </select>
          <span class="cd-error-message d_edit_sname_error" id="d_edit_sname_error" >Select State</span>
        </div>
        <hr>
        <input type="hidden" id="district_def_id" class="district_def_id" value="<?php echo $district_def_id;?>">
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
