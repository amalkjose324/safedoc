<?php include_once 'db_connect.php';
/**
* Signup-phone validating (existing or not)
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="signup-phone-validate"){
  $phone= $_POST['phone'];
  $query = mysqli_query($con, "SELECT * FROM safedocx_login WHERE login_phone='$phone'");
  $arr = array();
  if(mysqli_num_rows($query)>0){
    array_push($arr, array("val" => true));
  }
  else {
    array_push($arr, array("val" => false));
  }
  echo json_encode($arr);
  exit();
}

/**
* Signup-email validating (existing or not)
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="signup-email-validate"){
  $uemail= $_POST['email'];
  $arr = array();
  $query = mysqli_query($con, "SELECT * FROM safedocx_login WHERE login_email='$uemail'");
  if(mysqli_num_rows($query)>0){
    array_push($arr, array("val" => true));
  }
  else {
    array_push($arr, array("val" => false));
  }
  echo json_encode($arr);
  exit();
}

/**
* Signup-submit first
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="signup-first-submit"){
  $email= $_POST['email'];
  $phone=$_POST['phone'];
  $password=SHA1($_POST['password']);
  $arr = array();
  $query = mysqli_query($con, "INSERT INTO safedocx_login (login_phone,login_pword,login_email) VALUES('$phone','$password','$email')");
  if($query){
    $query2=mysqli_query($con,"SELECT * FROM safedocx_login WHERE login_email='$email'");
    while ($row=mysqli_fetch_array($query2)) {
      $uid=$row['login_id'];
      mysqli_query($con, "INSERT INTO `safedocx_profile_pic`(`profile_pic_user_id`) VALUES($uid)");
      mysqli_query($con, "INSERT INTO `safedocx_varify`(`varify_login_id`) VALUES($uid)");
      mysqli_query($con, "INSERT INTO `safedocx_users`(`user_id`) VALUES($uid)");
    }
    array_push($arr, array("val" => true));
  }
  else{
    array_push($arr, array("val" => false));
  }
  echo json_encode($arr);
  exit();
}
/**
* Function to send sms
* @var json
*/
function sendsms($to,$message)
{
  $reg_phone='7012848331';
  $reg_password='safedocx2017';
  $message= preg_replace('/\s+/', '%20', $message);
  $link="http://smsapi.engineeringtgr.com/send/?Mobile=$reg_phone&Password=$reg_password&Message=$message&To=$to";
  $response = file_get_contents($link);
}
/**
* Function to send mail
* @var json
*/
function sendmail($username,$from,$to,$subject,$message)
{

  define("MAIL_FROM",$from);
  define("MAIL_USERNAME",$username);
  define("MAIL_PASSWORD","safedocx2017");
  require_once "mail_sms/class.phpmailer.php";
  $mail->IsSMTP();                // Sets up a SMTP connection
  $mail->SMTPAuth = true;         // Connection with the SMTP does require authorization
  $mail->SMTPSecure = "ssl";      // Connect using a TLS connection
  $mail->Host = "smtp.gmail.com";  //Gmail SMTP server address
  $mail->Port = 465;  //Gmail SMTP port
  //Set who the message is to be sent from
  $mail->setFrom($from, "SafeDocx - Password");
  //Set who the message is to be sent to
  $mail->addAddress($to);
  $mail->Subject = $subject;
  $mail->Body = $message;
  if ($mail->Send()) {
    return true;
  }
  else {
    return false;
  }
}
/**
* Login-submit
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="login-submit"){
  $email_phone= $_POST['email_phone'];
  $password=SHA1($_POST['password']);
  $arr = array();
  $query = mysqli_query($con, "SELECT * FROM `safedocx_login`,`safedocx_user_type` WHERE (login_phone='$email_phone' OR login_email='$email_phone') AND login_pword='$password' AND login_status=1 AND utype_id=login_user_type");
  if(mysqli_num_rows($query)>0){
    while ($row=mysqli_fetch_array($query)) {
      $id=$_SESSION['user_id']=$row['login_id'];
      $_SESSION['user_page'] = $row['utype_page'];
      $_SESSION['user_type'] = $row['utype_name'];
      array_push($arr, array("val" => 1));
    }
  }
  else {
    array_push($arr, array("val" => 0));
  }
  echo json_encode($arr);
  exit();
}
// /**
// * Varification process
// * @var json
// */
// if(isset($_POST['fun']) && $_POST['fun']=="varify-email-phone-sendotp"){
//   $email_phone= $_POST['email_phone'];
//   $query = mysqli_query($con, "SELECT * FROM safedocx_login WHERE (login_phone='$email_phone' OR login_email='$email_phone')");
//   while ($row=mysqli_fetch_array($query)) {
//     $id=$row['login_id'];
//     $chars = "012345678901234567890123456789";
//     $otp_mail = substr(str_shuffle( $chars ), 0, 6 );
//     $otp_phone = substr(str_shuffle( $chars ), 0, 6 );
//     $otp_m=SHA1($otp_mail);
//     $otp_p=SHA1($otp_phone);
//     $sms_msg   = "Varify your Mobile Number using otp: $otp_phone -SafeDocx";
//     $email_msg = "Varify your Email-ID using otp: $otp_mail -SafeDocx";
//     mysqli_query($con, "DELETE FROM `safedocx_otp` WHERE `otp_login_id`=$id");
//     mysqli_query($con, "INSERT INTO `safedocx_otp`(`otp_login_id`,`otp_type`,`otp_password`) VALUES($id,0,'$otp_p')");
//     mysqli_query($con, "INSERT INTO `safedocx_otp`(`otp_login_id`,`otp_type`,`otp_password`) VALUES($id,1,'$otp_m')");
//     sendmail("pw.safedocx@gmail.com","password@safedocx.ml",$row['login_email'],"SafeDocx Password",$email_msg);
//     sendsms($row['login_phone'],$sms_msg);
//   }
// }
// /**
// * Varify now
// * @var json
// */
// if(isset($_POST['fun']) && $_POST['fun']=="varify-email-phone"){
//   $otp_email=SHA1($_POST['otp_email']);
//   $otp_phone=SHA1($_POST['otp_phone']);
//   $email_phone=$_POST['email_phone'];
//   $arr = array();
//   $query = mysqli_query($con, "SELECT * FROM safedocx_login WHERE (login_phone='$email_phone' OR login_email='$email_phone')");
//   while ($row=mysqli_fetch_array($query)) {
//     $id=$row['login_id'];
//     $query2 = mysqli_query($con, "SELECT * FROM safedocx_otp WHERE otp_login_id=$id AND ((otp_type=0 AND otp_password='$otp_phone') OR (otp_type=1 AND otp_password='$otp_email'))");
//     if(mysqli_num_rows($query2)==2){
//       mysqli_query($con, "DELETE FROM `safedocx_otp` WHERE `otp_login_id`=$id");
//       mysqli_query($con, "DELETE FROM `safedocx_varify` WHERE `varify_login_id`=$id");
//       mysqli_query($con, "INSERT INTO `safedocx_varify` (varify_login_id,varify_phone,varify_email) VALUES($id,1,1)");
//       array_push($arr, array("val" => true));
//     }
//     else {
//       array_push($arr, array("val" => false));
//     }
//   }
//   echo json_encode($arr);
//   exit();
// }

/**
* Check mail or phone validate (exist)
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="check_mail_phone"){
  $email_phone= $_POST['email_phone'];
  $arr = array();
  $query = mysqli_query($con, "SELECT * FROM safedocx_login WHERE (login_phone='$email_phone' OR login_email='$email_phone')");
  if(mysqli_num_rows($query)>0){
    array_push($arr, array("val" => true));
  }
  else {
    array_push($arr, array("val" => false));
  }
  echo json_encode($arr);
  exit();
}

/**
* ResetPw-submit
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="resetpw-submit"){
  $email_phone= $_POST['email_phone'];
  $arr = array();
  $query = mysqli_query($con, "SELECT * FROM safedocx_login WHERE (login_phone='$email_phone' OR login_email='$email_phone')");
  if(mysqli_num_rows($query)>0){
    while ($row=mysqli_fetch_array($query['rows'])) {
      $id=$row['login_id'];
      $name="User";
      $query2 = mysqli_query($con, "SELECT * FROM safedocx_users WHERE user_id=$id");
      while ($row2=mysqli_fetch_array($query2)) {
        $name=$row2['user_name'];
      }
      $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      $password = substr( str_shuffle( $chars ), 0, 8 );
      $password2=SHA1($password);
      $sms_msg   = "Hello $name, You can now login with the password : $password  .This password is valid only for 30 minutes and for one-time use. -SafeDocx";
      $email_msg = "Hello $name, <br>&nbsp;&nbsp;&nbsp;&nbsp;You can now login with the password : <b>$password</b>. This password is valid only for 30 minutes and for one-time use.You should change your password immediately after this login.";
      mysqli_query($con, "DELETE FROM `safedocx_pwreset` WHERE `pwreset_login_id`=$id");
      mysqli_query($con, "INSERT INTO `safedocx_pwreset`(`pwreset_login_id`,`pwreset_password`) VALUES($id,'$password2')");
      sendmail("pw.safedocx@gmail.com","password@safedocx.ml",$row['login_email'],"SafeDocx Password",$email_msg);
      sendsms($row['login_phone'],$sms_msg);
      array_push($arr, array("val" => true));
    }
  }
  else {
    array_push($arr, array("val" => false));
  }
  echo json_encode($arr);
  exit();
}
?>
