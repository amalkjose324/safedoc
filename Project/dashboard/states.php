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
  <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="css/popup.css">
  <div id="datatable_data">
    <table id="datatable1" class="datatable display dataTable no-footer" role="grid" aria-describedby="datatable_info">
      <thead>
        <tr>
          <th>Id</th>
          <th>State</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $row_count=0;
        $query=mysqli_query($con,"SELECT * FROM safedocx_states ORDER BY state_id");
        while($row=mysqli_fetch_array($query)){
          $row_count++;
          ?>
          <tr>
            <td><?php echo $row['state_id']; ?></td>
            <td><?php echo $row['state_name']; ?></td>
            <td style="text-align:center;">
              <form class="form_state_edit" method="post"  onsubmit="return false;" style="display:inline-block;margin: 0px;">
                <input type="hidden" id="state_id" value="<?php echo $row['state_id'];?>">
                <button type="submit" class="btn btn-primary datatable_button" style="background:orange;" name="state_edit"><i class='icon-edit '></i>  Edit</button>
              </form>
              <form class="form_state_delete" method="post"  onsubmit="return false;" style="display:inline-block;margin: 0px;">
                  <input type="hidden" id="state_id" value="<?php echo $row['state_id'];?>">
                  <button type="submit" class="btn btn-primary datatable_button" style="background:red;" name="state_delete"><i class='icon-remove '></i>  Delete</button>
              </form>
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
<script src="js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="js/ajaxscripts.js"></script>
<script src="js/popup.js"></script>
<script>
$(document).ready( function () {
  $('#datatable1').DataTable();
});
</script>
