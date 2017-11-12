<?php
if(!isset($_SESSION['user_page'])){
  header("location: ../");
}
else {
  $user_page=$_SESSION['user_page'];
  $user_id=$_SESSION['user_id'];
  $user_type=$_SESSION['user_type'];
  $head_query=mysqli_query($con,"SELECT * FROM safedocx_login LEFT JOIN safedocx_users ON  user_id=login_id LEFT JOIN safedocx_districts ON user_district_id=district_id WHERE user_id=$user_id");
}
?>
