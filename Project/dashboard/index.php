<?php
  include_once '../db_connect.php';
  include_once 'check_logout.php';
  if(!isset($_SESSION['user_page'])){
    echo "<script>window.location.href = '../';</script>";;
  }
  else{
    $page=$_SESSION['user_page'];
    echo "<script>window.location.href = '$page';</script>";
  }

 ?>
