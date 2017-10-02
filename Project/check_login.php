<?php
if(isset($_SESSION['user_page'])){
  $page=$_SESSION['user_page'];
  header("location: ./dashboard/$page");
}
?>
 
