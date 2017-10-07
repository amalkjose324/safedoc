<?php
include_once '../db_connect.php';
include_once 'check_logout.php';
include_once 'lobibox.php';
$query1=mysqli_query($con,"SELECT * FROM safedocx_varify WHERE varify_email=1 AND varify_phone=1 AND varify_login_id=$user_id");
$query2=mysqli_query($con,"SELECT * FROM safedocx_users WHERE user_aadhaar_no>0 AND user_id=$user_id");
if(isset($_SESSION['login_password'])){
  ?>
  <script>
  setTimeout(function() {
    Lobibox.notify('error', {
      delay:5000,
      title: 'Password must change',
      size: 'mini',
      msg: 'Now you are logged with one-time password. You must be changed your password.'
    });
  }, 1000);
  </script>
  <?php
}
if((mysqli_num_rows($query1)==0)||(mysqli_num_rows($query2)==0)){
  if(mysqli_num_rows($query1)==0){
    ?>
    <script>
    setTimeout(function() {
      Lobibox.notify('error', {
        delay:5000,
        title: 'Varification Failed',
        size: 'mini',
        msg: 'Please complete both phone and email varification'
      });
    }, 1000);
    </script>
    <?php

  }
  if(mysqli_num_rows($query2)==0){
    ?>
    <script>
    setTimeout(function() {
    Lobibox.notify('error', {
      delay:5000,
      size: 'mini',
      title: 'Incomplete Details',
      msg: 'Please fill all your profile details'

    });
  }, 3000);
    </script>
    <?php
  }
  ?>
  <script>
  setTimeout(function() {
  Lobibox.notify('warning', {
    delay:5000,
    title: 'Update profile',
    size: 'mini',
    msg: 'Now you will be redirected to Profile Management.'
  });
}, 5000);
  setTimeout(function() {
    window.location.replace("./profile.php");
  }, 12000);
  </script>
  <?php
  //header('location:./profile.php');
}
?>
