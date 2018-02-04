<?php
include_once '../db_connect.php';
include_once 'check_logout.php';
include_once 'profile_check.php';
include_once 'lobibox.php';
$page=$_SESSION['user_page'];
if($page<>'admin.php'){
  if($page<>'s_nodal.php'){
    if($page<>'d_nodal.php'){
      echo "<script>window.location.href = '$page';</script>";
    }
  }
}
$state_nodal_select="";
if($page=='s_nodal.php'){
  while ($h_row=mysqli_fetch_array($head_query)) {
    $state_nodal_select= "district_state_id=".$h_row['district_state_id']." and ";
  }
}
else if($page=='d_nodal.php'){
  while ($h_row=mysqli_fetch_array($head_query)) {
    $state_nodal_select= "user_district_id=".$h_row['user_district_id']." and ";
  }
}
$user_type_id=0;
$user_text="User";
if(isset($_GET['user'])){
  $user_type_id=$_GET['user'];
  if($user_type_id==1){
    $user_text="User";
  }
  elseif ($user_type_id==2) {
    $user_text="Admin";
  }
  elseif ($user_type_id==3) {
    $user_text="State Nodal";
  }
  elseif ($user_type_id==4) {
    $user_text="District Nodal";
  }
  elseif ($user_type_id==5) {
    $user_text="Attester";
  }
  ?>
  <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="css/popup.css">
  <div id="datatable_data">
    <table id="datatable" class="datatable display dataTable no-footer" role="grid" aria-describedby="datatable_info">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Aadhaar</th>
          <th>District</th>
          <th>Date of Birth</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $row_count=0;
        $query=mysqli_query($con,"SELECT * FROM safedocx_login LEFT JOIN safedocx_users ON  user_id=login_id LEFT JOIN safedocx_districts ON user_district_id=district_id WHERE $state_nodal_select login_user_type=$user_type_id ORDER BY user_name");
        while($row=mysqli_fetch_array($query)){
          $row_count++;
          ?>
          <tr>
            <td><?php echo $row_count; ?></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['login_phone']; ?></td>
            <td><?php echo $row['login_email']; ?></td>
            <td><?php echo $row['user_aadhaar_no']; ?></td>
            <td><?php echo $row['district_name']; ?></td>
            <td><?php echo $row['user_dob']; ?></td>
            <td>
              <form class="form_user_edit" method="post"  onsubmit="return false;" style="display:inline-block;margin: 0px;">
                <input type="hidden" id="user_id" value="<?php echo $row['login_id'];?>">
                <input type="hidden" id="user_type_id" value="<?php echo $user_type_id;?>">
                <button type="submit" class="btn btn-primary datatable_button" style="background:orange;" name="state_node_edit"><i class='icon-edit '></i></button>
              </form>
              <form class="form_user_reset_pw" method="post"  onsubmit="return false;" style="display:inline-block;margin: 0px;">
                <input type="hidden" id="user_id" value="<?php echo $row['login_id'];?>">
                <button type="submit" class="btn btn-primary datatable_button"  name="state_node_edit"><i class='icon-key '></i></button>
              </form>
              <?php
              if($row['login_status']==1){
                ?>
                <form class="form_user_disable" method="post"  onsubmit="return false;" style="display:inline-block;margin: 0px;">
                  <input type="hidden" id="user_id" value="<?php echo $row['login_id'];?>">
                  <input type="hidden" id="user_val" value="<?php echo $user_text;?>">
                  <input type="hidden" id="user_type_id" value="<?php echo $user_type_id;?>">
                  <button type="submit" class="btn btn-primary datatable_button" style="background:green;" name="state_node_disable"><i class='icon-unlock '></i></button>
                </form>
                <?php
              }
              else{
                ?>
                <form class="form_user_enable" method="post"  onsubmit="return false;" style="display:inline-block;margin: 0px;">
                  <input type="hidden" id="user_id" value="<?php echo $row['login_id'];?>">
                  <input type="hidden" id="user_val" value="<?php echo $user_text;?>">
                  <input type="hidden" id="user_type_id" value="<?php echo $user_type_id;?>">
                  <button type="submit" class="btn btn-primary datatable_button" style="background:red;" name="state_node_enable"><i class='icon-lock'></i></button>
                </form>
                <?php
              }
              ?>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <div class="cd-popup edit_user" id="edit_user" role="alert">
    <div class="cd-popup-container pasvs-pop">
      <h3>Edit User Details</h3>
      <hr>
      <div class="user_area">
      </div>
    </div> <!-- cd-popup -->
  </div>

  <div class="cd-popup add_user" id="add_user" role="alert">
    <div class="cd-popup-container pasvs-pop">
      <h3>Add User Details</h3>
      <hr>
      <div class="user_add_area">
      </div>
    </div> <!-- cd-popup -->
  </div>
<?php } ?>
<script src="js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="js/ajaxscripts.js"></script>
<script src="js/popup.js"></script>
<script>
$(document).ready( function () {
  $('#datatable').DataTable();
});
</script>
