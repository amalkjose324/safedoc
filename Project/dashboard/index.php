<?php
  include_once '../db_connect.php';
  include_once 'check_logout.php';
  $page=$_SESSION['user_page'];
  header("location: $page");
 ?>
 
