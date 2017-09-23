<?php
  $con=mysqli_connect("localhost","root","","safedoc_db");
  if(session_status()==PHP_SESSION_NONE)
  {
    session_start();
  }
?>
