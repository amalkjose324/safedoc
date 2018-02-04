<?php
if(isset($_SESSION['user_page'])){
  $page=$_SESSION['user_page'];
  echo "<script>window.location.href = './dashboard/$page';</script>";
}
?>
