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
      mysqli_query($con, "INSERT INTO `safedocx_verify`(`verify_login_id`) VALUES($uid)");
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
function sendmail($username,$to,$subject,$message)
{

  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= 'From: <password@safedocx.ml>' . "\r\n";
    if (mail($to,$subject,$message,$headers)) {
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
  $query = mysqli_query($con, "SELECT * FROM `safedocx_login` LEFT JOIN `safedocx_user_type` ON `safedocx_login`.`login_user_type`=`safedocx_user_type`.`utype_id` LEFT JOIN `safedocx_pwreset` ON `safedocx_login`.`login_id`=`safedocx_pwreset`.`pwreset_login_id` WHERE (login_phone='$email_phone' OR login_email='$email_phone') AND (login_pword='$password' OR pwreset_password='$password') AND login_status=1 AND utype_id=login_user_type");
  if(mysqli_num_rows($query)>0){
    while ($row=mysqli_fetch_array($query)) {
      $id=$_SESSION['user_id']=$row['login_id'];
      $_SESSION['user_page'] = $row['utype_page'];
      $_SESSION['user_type'] = $row['utype_name'];
      if(isset($row['pwreset_password'])){
        $_SESSION['login_password'] = "reset";
        mysqli_query($con,"DELETE FROM safedocx_pwreset WHERE pwreset_login_id=$id");
      }
      else {
        unset($_SESSION['login_password']);
      }
      array_push($arr, array("val" => 1));
    }
  }
  else {
    array_push($arr, array("val" => 0));
  }
  echo json_encode($arr);
  exit();
}
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
    while ($row=mysqli_fetch_array($query)) {
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
      $m=sendmail("pw.safedocx@gmail.com",$row['login_email'],"SafeDocx Password",$email_msg);
      if($m){
        sendsms($row['login_phone'],$sms_msg);
        array_push($arr, array("val" => true));
      }
      else {
        array_push($arr, array("val" => false));
      }
    }
  }
  else {
    array_push($arr, array("val" => false));
  }
  echo json_encode($arr);
  exit();
}
?>
