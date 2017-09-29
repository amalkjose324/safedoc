<?php
include_once '../db_connect.php';
$userid=$_SESSION['user_id'];
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
  $query = mysqli_query($con, "SELECT * FROM safedocx_login WHERE login_phone='$phone' AND login_id<>$userid");
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
  $arr = array();
  $query = mysqli_query($con, "SELECT * FROM safedocx_login WHERE login_email='$uemail' AND login_id<>$userid");
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
  $query1 = mysqli_query($con, "UPDATE safedocx_login SET login_email='$email',login_phone='$phone' WHERE login_id=$userid");
  $rows=mysqli_affected_rows($con);
  $query2 = mysqli_query($con, "UPDATE safedocx_users SET user_name='$name',user_dob='$dob',user_aadhaar_no='$aadhaar',user_district_id=$district WHERE user_id=$userid");
  $rows+=mysqli_affected_rows($con);
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

?>
