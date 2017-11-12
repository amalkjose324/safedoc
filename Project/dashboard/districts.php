<?php
include_once '../db_connect.php';
include_once 'check_logout.php';
include_once 'profile_check.php';
include_once 'lobibox.php';
$page=$_SESSION['user_page'];
$state_query="";
if($page<>'admin.php'){
  if($page<>'s_nodal.php'){
    header("location: $page");
  }
}
if(isset($_GET['state_id'])){
  $sid=$_GET['state_id'];
  if($sid==0){
    $state_query="AND district_state_id<>0";
  }
  else{
    $state_query="AND district_state_id= ".$sid;
  }

}
?>
  <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="css/popup.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <div id="datatable_data">
    <table id="datatable" class="datatable display dataTable no-footer" role="grid" aria-describedby="datatable_info">
      <thead>
        <tr>
          <th>Id</th>
          <th>District</th>
          <th>State</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $row_count=0;
        $query=mysqli_query($con,"SELECT * FROM safedocx_districts,safedocx_states WHERE district_state_id=state_id $state_query ORDER BY district_id");
        while($row=mysqli_fetch_array($query)){
          $row_count++;
          ?>
          <tr>
            <td><?php echo $row_count; ?></td>
            <td><?php echo $row['district_name']; ?></td>
            <td><?php echo $row['state_name']; ?></td>
            <td style="text-align:center;">
              <form class="form_district_edit" method="post"  onsubmit="return false;" style="display:inline-block;margin: 0px;">
                <input type="hidden" id="district_id" value="<?php echo $row['district_id'];?>">
                <button type="submit" class="btn btn-primary datatable_button" style="background:orange;" name="district_edit"><i class='icon-edit '></i>  Edit</button>
              </form>
              <form class="form_district_delete" method="post"  onsubmit="return false;" style="display:inline-block;margin: 0px;">
                  <input type="hidden" id="district_id" value="<?php echo $row['district_id'];?>">
                  <button type="submit" class="btn btn-primary datatable_button" style="background:red;" name="district_delete"><i class='icon-remove '></i>  Delete</button>
              </form>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <div class="cd-popup edit_district" id="edit_district" role="alert">
    <div class="cd-popup-container pasvs-pop">
      <h3>Edit District Details</h3>
      <hr>
      <div class="district_edit_area">
      </div>
    </div> <!-- cd-popup -->
  </div>

  <div class="cd-popup add_district" id="add_district" role="alert">
    <div class="cd-popup-container pasvs-pop">
      <h3>Add District Details</h3>
      <hr>
      <div class="district_add_area">
      </div>
    </div> <!-- cd-popup -->
  </div>
<script src="js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="js/ajaxscripts.js"></script>
<script src="js/popup.js"></script>
<script>
$(document).ready( function () {
  $('#datatable').DataTable();
});
</script>
