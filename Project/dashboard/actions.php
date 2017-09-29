<?php
include_once '../db_connect.php';
$userid=$_SESSION['user_id'];
if(isset($_POST['fun']) && $_POST['fun']=="change_profile_pic"){
  $data = $_POST['image'];
  list($type, $data) = explode(';', $data);
  list(, $data)      = explode(',', $data);
  $data = base64_decode($data);
  $imageName = time().'.png';
  file_put_contents('images/profile_pics/'.$imageName, $data);
  $query=mysqli_query($con,"UPDATE `safedocx_profile_pic` SET `profile_pic_image`='$imageName' WHERE `profile_pic_user_id`=$userid")
  echo 'done';
}

?>
