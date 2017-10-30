<?php
  include_once '../db_connect.php';
  include_once 'check_logout.php';
  if(!isset($_SESSION['user_page'])){
    header("location: ../");
  }
  else{
    $page=$_SESSION['user_page'];
    header("location: $page");
  }

 ?>
