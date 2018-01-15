<?php
include_once '../db_connect.php';
$userid=$_SESSION['user_id'];
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
* Function to encryption
* @var json
*/
function encrypt($plain)
{
  $cipher="";
  $key="O87dRQzn2gi=INqPpkSDyZvGuFm3wcfaCEbTjtl6Wxh9YLe15sJH4BMr0XAoKV_U";
  $bin= decbin($plain);
  $count= strlen((string)$bin);    // 11
  $number = ceil($count / 6) * 6;//12
  $fullno=sprintf("%0".$number."d", $bin); // 011101001000
  $arr = str_split($fullno, 6); // 011101 001000
  $set_count= count($arr);
  for ($i=0; $i < $set_count; $i++) {
    $no=bindec($arr[$i]);
    $char=$key[$no];
    $cipher=$cipher.$char;
  }
  return $cipher;
}

/**
* Changing Profile picture
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="change_profile_pic"){
  if(isset( $_POST['image'])){
    $data = $_POST['image'];
    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $data = base64_decode($data);
    $imageName = time().'.png';
    file_put_contents('images/profile_pics/'.$imageName, $data);
    $query=mysqli_query($con,"UPDATE `safedocx_profile_pic` SET `profile_pic_image`='$imageName' WHERE `profile_pic_user_id`=$userid");
    $arr = array();
    if(mysqli_affected_rows($con)>0){
      array_push($arr, array("val" => true));
    }
    else {
      array_push($arr, array("val" => false));
    }
    echo json_encode($arr);
    exit();
  }
  else {
    $arr = array();
    array_push($arr, array("val" => false));
    echo json_encode($arr);
    exit();
  }
}
/**
* Select district
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="select_district"){
  $state = $_POST['state'];
  $query = mysqli_query($con, "SELECT * FROM safedocx_districts where district_state_id=$state");
  $arr = array();
  while ($row = mysqli_fetch_array($query)) {
    array_push($arr, array("district_id"=>$row['district_id'], "district_name"=>$row['district_name']));
  }
  echo json_encode($arr);
  exit();
}

/**
* Profile-phone validating (existing or not)
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="profile-phone-validate"){
  $phone= $_POST['phone'];
  $uid=$userid;
  if(isset($_POST['user_id'])){
    $uid=$_POST['user_id'];
  }
  $query = mysqli_query($con, "SELECT * FROM safedocx_login WHERE login_phone='$phone' AND login_id<>$uid");
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
* Profile-aadhaar validating (existing or not)
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="profile-aadhaar-validate"){
  $aadhaar= $_POST['aadhaar'];
  $query = mysqli_query($con, "SELECT * FROM safedocx_users WHERE user_aadhaar_no='$aadhaar' AND user_id<>$userid");
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
* profile-email validating (existing or not)
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="profile-email-validate"){
  $uemail= $_POST['email'];
  $uid=$userid;
  if(isset($_POST['user_id'])){
    $uid=$_POST['user_id'];
  }
  $arr = array();
  $query = mysqli_query($con, "SELECT * FROM safedocx_login WHERE login_email='$uemail' AND login_id<>$uid");
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
* profile updation
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="profile-submit"){
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $name=$_POST['name'];
  $dob=$_POST['dob'];
  $aadhaar=$_POST['aadhaar'];
  $state=$_POST['state'];
  $district=$_POST['district'];
  $arr = array();
  $rows=0;
  $query1 = mysqli_query($con, "UPDATE safedocx_login SET login_email='$email' WHERE login_id=$userid");
  if(mysqli_affected_rows($con)>0){
    $rows=1;
    mysqli_query($con, "UPDATE safedocx_varify SET varify_email=0 WHERE varify_login_id=$userid");
  }
  $query3 = mysqli_query($con, "UPDATE safedocx_login SET login_phone='$phone' WHERE login_id=$userid");
  if(mysqli_affected_rows($con)>0){
    $rows=1;
    mysqli_query($con, "UPDATE safedocx_varify SET varify_phone=0 WHERE varify_login_id=$userid");
  }
  $query2 = mysqli_query($con, "UPDATE safedocx_users SET user_name='$name',user_dob='$dob',user_aadhaar_no='$aadhaar',user_district_id=$district WHERE user_id=$userid");
  if(mysqli_affected_rows($con)>0){
    $rows=1;
  }
  if($rows>0){
    array_push($arr, array("val" => true));
  }
  else {
    array_push($arr, array("val" => false));
  }
  echo json_encode($arr);
  exit();
}
/**
* Password change
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="change-password-submit"){
  $pass_new = SHA1($_POST['pass_new']);
  $pass_old = SHA1($_POST['pass_old']);
  $query = mysqli_query($con, "UPDATE safedocx_login SET login_pword='$pass_new' WHERE login_id=$userid AND login_pword='$pass_old'");
  $arr = array();
  $rows=mysqli_affected_rows($con);
  if($rows>0){
    array_push($arr, array("val" => true));
  }
  else {
    array_push($arr, array("val" => false));
  }
  echo json_encode($arr);
  exit();
}
/**
* Varification otp send to phone  process
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="varify-phone-otpsend"){
  $query = mysqli_query($con, "SELECT * FROM safedocx_login WHERE login_id=$userid");
  while ($row=mysqli_fetch_array($query)) {
    $phone=$row['login_phone'];
    $chars = "012345678901234567890123456789";
    $otp = substr(str_shuffle( $chars ), 0, 6 );
    $otp_code=SHA1($otp);
    $sms_msg   = "Varify your Mobile Number using otp: $otp -SafeDocx";
    mysqli_query($con, "DELETE FROM `safedocx_otp` WHERE `otp_login_id`=$userid AND otp_type=0");
    mysqli_query($con, "INSERT INTO `safedocx_otp`(`otp_login_id`,`otp_type`,`otp_password`) VALUES($userid,0,'$otp_code')");
    sendsms($phone,$sms_msg);
    $arr = array();
    array_push($arr, array("val" => true));
    echo json_encode($arr);
    exit();
  }
}
/**
* Varification link send to email  process
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="varify-email-otpsend"){
  $query = mysqli_query($con, "SELECT * FROM safedocx_login WHERE login_id=$userid");
  while ($row=mysqli_fetch_array($query)) {
    $email=$row['login_email'];
    $chars = "012345678901234567890123456789";
    $otp = substr(str_shuffle( $chars ), 0, 6 );
    $enc_otp=$otp_code=SHA1($otp);
    $enc_user=encrypt($userid);
    $count= strlen((string)$enc_user);
    $step=floor(40/($count+1));
    for ($i=1; $i <= $count; $i++) {
      $position = $i*$step;
      $enc_otp = substr($enc_otp, 0, $position) . $enc_user[$i-1] . substr($enc_otp, $position);
    }
    $email_msg = "Hi, Help us secure your SafeDocx account by verifying your email address ($email). This will let you receive notifications and password resets from SafeDocx. <br><br><center><a style='border:1px solid black;background:blue;color:white;text-decoration:none;padding:5px;padding-left:30px;padding-right:30px;font-size:18px;font-weight:bold' href='http://localhost/safedocx/Project/dashboard/varify_email.php?otp=$enc_otp'>Varify Email Id</a></center><br><hr>Button not working? Paste the following link into your browser: <br><center>http://localhost/safedocx/Project/dashboard/varify_email.php?otp=$enc_otp</center><hr>You’re receiving this email because you recently created a new GitHub account or added a new email address. If this wasn’t you, please ignore this email.";
      mysqli_query($con, "DELETE FROM `safedocx_otp` WHERE `otp_login_id`=$userid AND otp_type=1");
      mysqli_query($con, "INSERT INTO `safedocx_otp`(`otp_login_id`,`otp_type`,`otp_password`) VALUES($userid,1,'$otp_code')");
      $m=sendmail("pw.safedocx@gmail.com",$email,"SafeDocx Password",$email_msg);
      $arr = array();
      if($m){
        array_push($arr, array("val" => true));
      }
      else {
        array_push($arr, array("val" => false));
      }

      echo json_encode($arr);
      exit();
    }
  }
  /**
  * Varification phoneno
  * @var json
  */
  if(isset($_POST['fun']) && $_POST['fun']=="varify-phone-submit"){
    $otp=SHA1($_POST['otp']);
    $arr = array();
    $query = mysqli_query($con, "SELECT * FROM safedocx_otp WHERE otp_login_id=$userid AND otp_type=0 AND otp_password='$otp'");
    if(mysqli_num_rows($query)>0){
      mysqli_query($con, "DELETE FROM `safedocx_otp` WHERE `otp_login_id`=$userid AND otp_type=0");
      mysqli_query($con, "UPDATE `safedocx_varify` SET `varify_phone`=1 WHERE `varify_login_id`=$userid");
      array_push($arr, array("val" => true));
    }
    else {
      array_push($arr, array("val" => false));
    }
    echo json_encode($arr);
    exit();
  }
  /**
  * Add new directory
  * @var json
  */
  if(isset($_POST['fun']) && $_POST['fun']=="add-new-directory"){
    $dir_name = $_POST['dir_name'];
    $dir_description = $_POST['dir_description'];
    $arr = array();
    $query = mysqli_query($con, "INSERT INTO `safedocx_shareboxs` (`sharebox_user_id`,`sharebox_caption`,`sharebox_description`) VALUES($userid,'$dir_name','$dir_description')") or die(mysqli_error($con));
    if(mysqli_affected_rows($con)>0){
      array_push($arr, array("val" => true));
    }
    else {
      array_push($arr, array("val" => false));
    }
    echo json_encode($arr);
    exit();
  }

  /**
  * Add documents
  * @var json
  */
  if(isset($_POST['fun']) && $_POST['fun']=="safedocx-add-docs"){
    if (isset($_FILES['files']) && !empty($_FILES['files'])) {
      $no_files = count($_FILES["files"]['name']);
      $success_count=0;
      for ($i = 0; $i < $no_files; $i++) {
        $extn=pathinfo($_FILES["files"]["name"][$i], PATHINFO_EXTENSION);
        $file=pathinfo($_FILES["files"]["name"][$i])['filename'];

        if(strtolower($extn)=='pdf'){
          if ($_FILES["files"]["error"][$i] > 0) {
            echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
          }
          else {
            $fp = fopen($_FILES["files"]["tmp_name"][$i], 'r');
            fseek($fp, 0);
            $data = fread($fp, 5);
            if(strcmp($data,"%PDF-")==0)
            {
              $temp_name=basename($_FILES["files"]["tmp_name"][$i]);
              $temp_name=str_replace('php','',$temp_name);
              $time=str_replace('.','',microtime(TRUE));
              $file_store=$temp_name.''. $time.'.'.$extn;
              move_uploaded_file($_FILES["files"]["tmp_name"][$i], 'docs/pdf/'.$file_store);
              $file_name = preg_replace('/[^A-Za-z0-9\. -]/', '', $_FILES["files"]["name"][$i]);
              mysqli_query($con,"INSERT INTO `safedocx_docs` (`doc_user_id`,`doc_caption`,`doc_file`) VALUES($userid,'$file','$file_store')") or die(mysqli_error($con));
              $success_count++;
            }
            fclose($fp);
          }
        }
      }
      echo $success_count;
    }
  }

  /**
  * Enable user
  * @var json
  */
  if(isset($_POST['fun']) && $_POST['fun']=="enable_user"){
    $id = $_POST['id'];
    $arr = array();
    $query = mysqli_query($con, "UPDATE safedocx_login SET login_status = 1 WHERE login_id=$id") or die(mysqli_error($con));
    if(mysqli_affected_rows($con)>0){
      array_push($arr, array("val" => true));
    }
    else {
      array_push($arr, array("val" => false));
    }
    echo json_encode($arr);
    exit();
  }
  /**
  * Disable user
  * @var json
  */
  if(isset($_POST['fun']) && $_POST['fun']=="disable_user"){
    $id = $_POST['id'];
    $arr = array();
    $query = mysqli_query($con, "UPDATE safedocx_login SET login_status = 0 WHERE login_id=$id") or die(mysqli_error($con));
    if(mysqli_affected_rows($con)>0){
      array_push($arr, array("val" => true));
    }
    else {
      array_push($arr, array("val" => false));
    }
    echo json_encode($arr);
    exit();
  }

  /**
  * reset_user_pw
  * @var json
  */
  if(isset($_POST['fun']) && $_POST['fun']=="reset_user_pw"){
    $id = $_POST['id'];
    $arr = array();
    mysqli_query($con,"DELETE FROM safedocx_pwreset WHERE pwreset_login_id=$id");
    $password=SHA1("Qwerty@123");
    $query = mysqli_query($con, "INSERT INTO `safedocx_pwreset`(`pwreset_login_id`,`pwreset_password`) VALUES($id,'$password')");
    if(mysqli_affected_rows($con)>0){
      array_push($arr, array("val" => true));
    }
    else {
      array_push($arr, array("val" => false));
    }
    echo json_encode($arr);
    exit();
  }
  /**
  * edit user details
  * @var json
  */
  if(isset($_POST['fun']) && $_POST['fun']=="edit_user_admin"){
    $id = $_POST['id'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $arr = array();
    $query = mysqli_query($con, "UPDATE safedocx_login SET login_phone='$phone',login_email='$email' WHERE login_id=$id");
    if(mysqli_affected_rows($con)>0){
      array_push($arr, array("val" => true));
    }
    else {
      array_push($arr, array("val" => false));
    }
    echo json_encode($arr);
    exit();
  }

  /**
  * Add new user details
  * @var json
  */
  if(isset($_POST['fun']) && $_POST['fun']=="add_user_admin"){
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $dist="NULL";
    if(isset($_POST['dist'])){
      $dist=$_POST['dist'];
    }
    $user_type=$_POST['user_type'];
    $password=SHA1("Qwerty@123");
    $arr = array();
    $query = mysqli_query($con, "INSERT INTO safedocx_login (login_phone,login_pword,login_email,login_user_type) VALUES('$phone','$password','$email',$user_type)");
    if($query){
      $query2=mysqli_query($con,"SELECT * FROM safedocx_login WHERE login_email='$email'");
      while ($row=mysqli_fetch_array($query2)) {
        $uid=$row['login_id'];
        mysqli_query($con, "INSERT INTO `safedocx_profile_pic`(`profile_pic_user_id`) VALUES($uid)");
        mysqli_query($con, "INSERT INTO `safedocx_varify`(`varify_login_id`) VALUES($uid)");
        mysqli_query($con, "INSERT INTO `safedocx_users`(`user_id`,`user_district_id`) VALUES($uid,$dist)");
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
  * State id validating (existing or not)
  * @var json
  */
  if(isset($_POST['fun']) && $_POST['fun']=="state-id-validate"){
    $id= $_POST['id'];
    $cur_id=0;
    if(isset($_POST['cur_id'])){
      $cur_id=$_POST['cur_id'];
    }
    $query = mysqli_query($con, "SELECT * FROM safedocx_states WHERE state_id=$id AND state_def_id<>$cur_id");
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
  * State name validating (existing or not)
  * @var json
  */
  if(isset($_POST['fun']) && $_POST['fun']=="state-name-validate"){
    $name= $_POST['name'];
    $cur_id=0;
    if(isset($_POST['cur_id'])){
      $cur_id=$_POST['cur_id'];
    }
    $query = mysqli_query($con, "SELECT * FROM safedocx_states WHERE state_name='$name' AND state_def_id<>$cur_id");
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
  * District name validating (existing or not)
  * @var json
  */
  if(isset($_POST['fun']) && $_POST['fun']=="district-name-validate"){
    $name= $_POST['name'];
    $cur_id=0;
    if(isset($_POST['cur_id'])){
      $cur_id=$_POST['cur_id'];
    }
    $query = mysqli_query($con, "SELECT * FROM safedocx_districts WHERE district_name='$name' AND district_id<>$cur_id");
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
  * Add new state details
  * @var json
  */
  if(isset($_POST['fun']) && $_POST['fun']=="add_state_admin"){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $arr = array();
    $query = mysqli_query($con, "INSERT INTO safedocx_states (state_id,state_name) VALUES($id,'$name')");
    if($query){
      array_push($arr, array("val" => true));
    }
    else{
      array_push($arr, array("val" => false));
    }
    echo json_encode($arr);
    exit();
  }
  /**
  * Add new district details
  * @var json
  */
  if(isset($_POST['fun']) && $_POST['fun']=="add_district_admin"){
    $name=$_POST['name'];
    $state=$_POST['state'];
    $arr = array();
    $query = mysqli_query($con, "INSERT INTO safedocx_districts (district_name,district_state_id) VALUES('$name',$state)");
    if($query){
      array_push($arr, array("val" => true));
    }
    else{
      array_push($arr, array("val" => false));
    }
    echo json_encode($arr);
    exit();
  }
  /**
  * edit user details
  * @var json
  */
  if(isset($_POST['fun']) && $_POST['fun']=="edit_state_admin"){
    $id = $_POST['id'];
    $name=$_POST['name'];
    $def_id=$_POST['def_id'];
    $arr = array();
    $query = mysqli_query($con, "UPDATE safedocx_states SET state_id=$id,state_name='$name' WHERE state_def_id=$def_id");
    if(mysqli_affected_rows($con)>0){
      array_push($arr, array("val" => true));
    }
    else {
      array_push($arr, array("val" => false));
    }
    echo json_encode($arr);
    exit();
  }

  /**
  * edit district details
  * @var json
  */
  if(isset($_POST['fun']) && $_POST['fun']=="edit_district_admin"){
    $id = $_POST['id'];
    $name=$_POST['name'];
    $state=$_POST['state'];
    $arr = array();
    $query = mysqli_query($con, "UPDATE safedocx_districts SET district_name='$name',district_state_id=$state WHERE district_id=$id");
    if(mysqli_affected_rows($con)>0){
      array_push($arr, array("val" => true));
    }
    else {
      array_push($arr, array("val" => false));
    }
    echo json_encode($arr);
    exit();
  }
  /**
  * delete state
  * @var json
  */
  if(isset($_POST['fun']) && $_POST['fun']=="delete_state"){
    $id = $_POST['id'];
    $arr = array();
    $query = mysqli_query($con, "DELETE FROM safedocx_states WHERE state_def_id=$id") or die(mysqli_error($con));
    if(mysqli_affected_rows($con)>0){
      array_push($arr, array("val" => true));
    }
    else {
      array_push($arr, array("val" => false));
    }
    echo json_encode($arr);
    exit();
  }

  /**
  * delete districts
  * @var json
  */
  if(isset($_POST['fun']) && $_POST['fun']=="delete_district"){
    $id = $_POST['id'];
    $arr = array();
    $query = mysqli_query($con, "DELETE FROM safedocx_districts WHERE district_id=$id") or die(mysqli_error($con));
    if(mysqli_affected_rows($con)>0){
      array_push($arr, array("val" => true));
    }
    else {
      array_push($arr, array("val" => false));
    }
    echo json_encode($arr);
    exit();
  }

  /**
  * Doc varify -submit first
  * @var json
  */
  if(isset($_POST['fun']) && $_POST['fun']=="doc_varify"){
    $doc_id= $_POST['doc_id'];
    $arr = array();
    $query = mysqli_query($con, "UPDATE safedocx_docs SET doc_status=1 WHERE doc_id=$doc_id");
    if(mysqli_affected_rows($con)>0){
      array_push($arr, array("val" => true));
    }
    else{
      array_push($arr, array("val" => false));
    }
    echo json_encode($arr);
    exit();
  }

  /**
  * Doc reject -submit first
  * @var json
  */
  if(isset($_POST['fun']) && $_POST['fun']=="doc_reject"){
    $doc_id= $_POST['doc_id'];
    $arr = array();
    $query = mysqli_query($con, "UPDATE safedocx_docs SET doc_status=3 WHERE doc_id=$doc_id");
    if(mysqli_affected_rows($con)>0){
      array_push($arr, array("val" => true));
    }
    else{
      array_push($arr, array("val" => false));
    }
    echo json_encode($arr);
    exit();
  }
  ?>
