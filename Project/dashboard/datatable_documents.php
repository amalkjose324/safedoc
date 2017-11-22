<?php
include_once '../db_connect.php';
include_once 'check_logout.php';
include_once 'profile_check.php';
include_once 'lobibox.php';
$page=$_SESSION['user_page'];
$doc_type=0;
if($page<>'attestor.php' || !isset($_GET['doc_type'])){
  header("location: $page");
}
else {
  $doc_type=$_GET['doc_type'];
}

?>
  <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="css/popup.css">
  <div id="datatable_data">
    <table id="datatable" class="datatable display dataTable no-footer" role="grid" aria-describedby="datatable_info">
      <thead>
        <tr>
          <th>Id</th>
          <th>Document</th>
          <th>Owner</th>
          <th>Description</th>
          <th>Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $row_count=0;
        $query=mysqli_query($con,"SELECT * FROM safedocx_docs LEFT JOIN safedocx_users ON  user_id=doc_user_id LEFT JOIN safedocx_districts ON user_district_id=district_id WHERE user_district_id=(SELECT user_district_id FROM safedocx_users WHERE user_id=$user_id) AND doc_status=$doc_type ORDER BY `safedocx_docs`.`created_on`") or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
          $row_count++;
          ?>
          <tr>
            <td><?php echo $row_count; ?></td>
            <td><?php echo $row['doc_caption']; ?></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['doc_description']; ?></td>
            <td><?php echo $row['created_on']; ?></td>
            <td>
              <form class="form_doc_user_view" method="post"  onsubmit="return false;" style="display:inline-block;margin: 0px;">
                <input type="hidden" id="user_id" value="<?php echo $row['user_id'];?>">
                <button type="submit" class="btn btn-primary datatable_button" style="background:orange;" name="user_view"><i class='icon-user '></i></button>
              </form>
              <form class="form_doc_view" method="post"  onsubmit="return false;" style="display:inline-block;margin: 0px;">
                <input type="hidden" id="doc_id" value="<?php echo $row['doc_id'];?>">
                <button type="submit" class="btn btn-primary datatable_button"  name="state_node_edit"><i class='icon-file-pdf-o '></i></button>
              </form>
              <?php
              if($doc_type==1){
                ?>
                <form class="form_doc_reject" method="post"  onsubmit="return false;" style="display:inline-block;margin: 0px;">
                  <input type="hidden" id="doc_id" value="<?php echo $row['doc_id'];?>">
                  <input type="hidden" id="doc_type" value="<?php echo $doc_type ?>">
                  <button type="submit" class="btn btn-primary datatable_button" style="background:red;" name="state_node_disable"><i class='icon-times '></i></button>
                </form>
                <?php
              }
              else if($doc_type==2){
                ?>
                <form class="form_doc_varify" method="post"  onsubmit="return false;" style="display:inline-block;margin: 0px;">
                  <input type="hidden" id="doc_id" value="<?php echo $row['doc_id'];?>">
                  <input type="hidden" id="doc_type" value="<?php echo $doc_type ?>">
                  <button type="submit" class="btn btn-primary datatable_button" style="background:green;" name="state_node_disable"><i class='icon-check '></i></button>
                </form>
                <form class="form_doc_reject" method="post"  onsubmit="return false;" style="display:inline-block;margin: 0px;">
                  <input type="hidden" id="doc_id" value="<?php echo $row['doc_id'];?>">
                  <input type="hidden" id="doc_type" value="<?php echo $doc_type ?>">
                  <button type="submit" class="btn btn-primary datatable_button" style="background:red;" name="state_node_disable"><i class='icon-times '></i></button>
                </form>
                <?php
              }
              else if($doc_type==3){
                ?>
                <form class="form_doc_varify" method="post"  onsubmit="return false;" style="display:inline-block;margin: 0px;">
                  <input type="hidden" id="doc_id" value="<?php echo $row['doc_id'];?>">
                  <input type="hidden" id="doc_type" value="<?php echo $doc_type ?>">
                  <button type="submit" class="btn btn-primary datatable_button" style="background:green;" name="state_node_disable"><i class='icon-check '></i></button>
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
<script src="js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="js/ajaxscripts.js"></script>
<script src="js/popup.js"></script>
<script>
$(document).ready( function () {
  $('#datatable').DataTable();
});
</script>
