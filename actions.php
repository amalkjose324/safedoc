<?php include_once 'db_connect.php';
/**
* Signup-phone validating (existing or not)
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="signup-phone-validate"){
  $phone= $_POST['phone'];
  $q = mysqli_query($con, "SELECT * FROM safedoc_login where login_phone='$phone'");
  $arr = array();
  if(mysqli_num_rows($q)>0){
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
  $q = mysqli_query($con, "SELECT * FROM safedoc_login where login_email='$uemail'");
  $arr = array();
  if(mysqli_num_rows($q)>0){
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
  $q = mysqli_query($con, "INSERT INTO safedoc_login(login_phone,login_pword,login_email) VALUES('$phone','$password','$email')");
  if($q){
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
  $reg_password='safedoc2017';
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://smsapi.engineeringtgr.com/send/?Mobile=$reg_phone&Password=$reg_password&Message=$message&To=$to");
  curl_exec($ch);
  curl_close($ch);
}
/**
* Function to send mail
* @var json
*/
function sendmail($from,$to,$subject,$message)
{
  define("MAIL_FROM",$from);
  define("MAIL_USERNAME",$from);
  define("MAIL_PASSWORD","safedocx2017");
  require_once "mail_sms/class.phpmailer.php";
  //Set who the message is to be sent from
  $mail->setFrom($from, $from);
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
  $q = mysqli_query($con, "SELECT * FROM safedoc_login WHERE (login_phone='$email_phone' OR login_email='$email_phone') AND login_pword='$password'");
  if(mysqli_num_rows($q)>0){
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
  $q = mysqli_query($con, "SELECT * FROM safedoc_login WHERE (login_phone='$email_phone' OR login_email='$email_phone')");
  if(mysqli_num_rows($q)>0){
    // while ($row=mysqli_fetch_array($q)) {
    //   $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    //   $password = substr( str_shuffle( $chars ), 0, 8 );
    //   $query=mysqli_query($con,"INSERT INTO safedoc_pwreset (pwreset_login_id,pwreset_password) VALUES($row['login_id'],'$password')") or die(mysqli_error($con));
    //   sendmail("otp@safedocx.ml",$row['login_email'],"Reset SafeDocx Password","Your new password is $password . It is valid only for 1hrs and for one-time use.");
    //   sendsms($row['login_phone'],"Your new password is $password . It is valid only for 1hrs and for one-time use.");
      array_push($arr, array("val" => true));
  //  }
  }
  else {
    array_push($arr, array("val" => false));
  }
  echo json_encode($arr);
  exit();
}
?>
