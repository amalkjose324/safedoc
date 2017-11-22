<?php
include_once '../db_connect.php';
if(isset($_GET['user_id'])){
  $user_id=$_GET['user_id'];
  $query=mysqli_query($con,"SELECT * FROM safedocx_login,safedocx_users,safedocx_profile_pic WHERE login_id=user_id AND login_id=profile_pic_user_id AND login_id=$user_id");
  while ($row=mysqli_fetch_array($query)) {
    ?>
    <div style="max-width:210px;padding:2px;" class="col-xl-5 col-md-5 col-sm-5">
      <img src="<?php echo "images/profile_pics/".$row['profile_pic_image']; ?>">
    </div>
    <div style="display: inline-block !important;padding-top:30px;float: left; text-align:center" class="col-xl-7 col-md-7 col-sm-7">
        <h2><?php echo $row['user_name'];?></h2><br>
      <table class="col-xl-12 col-md-12 col-sm-12">
        <tr>
          <th>Phone</th>
          <td><?php echo $row['login_phone'];?></td>
        </tr>
        <tr>
          <th>Email</th>
          <td><?php echo $row['login_email'];?></td>
        </tr>
        <tr>
          <th>DOB</th>
          <td><?php echo $row['user_dob'];?></td>
        </tr>
        <tr>
          <th>Aadhaar</th>
          <td><?php echo $row['user_aadhaar_no'];?></td>
        </tr>
      </table>

    </div>
    <?php
  }
}
?>
