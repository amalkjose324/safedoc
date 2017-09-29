<?php
if(!isset($_SESSION['user_page'])){
  header("location: ../");
}
else {
  $user_page=$_SESSION['user_page'];
  $user_id=$_SESSION['user_id'];
  $user_type=$_SESSION['user_type'];
}
?>
