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
      $query=
      array_push($arr, array("val" => true));
    }
    else {
      array_push($arr, array("val" => false));
    }
    echo json_encode($arr);
    exit();
}
?>
