<?php
if(session_status()==PHP_SESSION_NONE)
{
  session_start();
}
$con=mysqli_connect("localhost","amalkjo1_amal","sh1lj@0652","amalkjo1_akj_db");
if(!$con){
  die("Error: ".mysqli_error());
}
if($_SERVER['REQUEST_METHOD']=='POST'){
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $password = substr( str_shuffle( $chars ), 0, 8 );
  $email=$_POST['email'];

  $query = mysqli_query($con,"select * from oms_users where usr_email='".$email."'  and usr_status='0'");
  if(!mysqli_num_rows($query)=='1'){
    $_SESSION['msg']="This email is not registerd with any account..!";
    header('location:../');
  }
  else{
    mysqli_query($con,"update oms_users set usr_rst_pword='".sha1($password)."' where usr_email='".$email."'");
    define("MAIL_FROM","omsajce@gmail.com");
    define("MAIL_USERNAME","omsajce@gmail.com");
    define("MAIL_PASSWORD","omsajce2016");
    require_once "class.phpmailer.php";
    //Set who the message is to be sent from
    $mail->setFrom($from, $from);
    //Set who the message is to be sent to
    $mail->addAddress("$email");
    $mail->Subject = "OMS Reset Password";
    $mail->Body = "Hai User,<br>Your One Time Password is <b> $password </b>.<br> Please note that, you should change your password immediately after login with this OTP.";
    if ($mail->Send()) {
      $_SESSION['msg']="Your One Time Password(OTP) has been sent to your email address..!";
      header('location:../');
    }
    else {
      $_SESSION['msg']="Email with OTP can't be send right now..!";
      header('location:../');
    }
  }
}
?>
