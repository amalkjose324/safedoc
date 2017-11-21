<?php
include_once '../db_connect.php';
$userid=$_SESSION['user_id'];

/**
* Download document
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="doc_download"){
  $doc_id = $_POST['doc_id'];
  $query = mysqli_query($con, "SELECT * FROM safedocx_docs WHERE `doc_id`=$doc_id");
  $arr = array();
  if(mysqli_num_rows($query)>0){
    while ($row = mysqli_fetch_array($query)) {
      $filename = $row["doc_file"];
      $caption=$row["doc_caption"].".pdf";
      if(file_exists("docs/pdf/$filename")){
        array_push($arr, array("val" => true));
        array_push($arr, array("doc" => $filename));
        array_push($arr, array("cap" => $caption));
      }
      else{
        array_push($arr, array("val" => false));
      }
    }
  }
  else{
    array_push($arr, array("val" => false));
  }
  echo json_encode($arr);
  exit();
}

/**
* check_doc_share_email_phone document
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="check_doc_share_email_phone"){
  $email_phone= $_POST['email_phone'];
  $query = mysqli_query($con, "SELECT * FROM safedocx_login LEFT JOIN safedocx_users ON `safedocx_login`.`login_id`=`safedocx_users`.`user_id` WHERE `login_id`<>$userid AND login_user_type=1 AND (`login_phone`='$email_phone' OR `login_email`='$email_phone')");
  $arr = array();
  if(mysqli_num_rows($query)>0){
    while ($row = mysqli_fetch_array($query)) {
      $user_name = $row["user_name"];
      $user_id=$row["login_id"];
      if(strlen($user_name)==0 || $user_name==NULL){
        $user_name="Unknown User";
      }
      array_push($arr, array("val" => true));
      array_push($arr, array("u_name" => $user_name));
      array_push($arr, array("resp_id" => $user_id));
    }
  }
  else{
    array_push($arr, array("val" => false));
  }
  echo json_encode($arr);
  exit();
}
/**
* priview document
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="doc_priview"){
  $doc_id = $_POST['doc_id'];
  $query = mysqli_query($con, "SELECT * FROM safedocx_docs WHERE `doc_id`=$doc_id");
  $arr = array();
  if(mysqli_num_rows($query)>0){
    while ($row = mysqli_fetch_array($query)) {
      $filename = $row["doc_file"];
      if(file_exists("docs/pdf/$filename")){
        array_push($arr, array("val" => true));
        array_push($arr, array("doc" => $filename));
      }
      else{
        array_push($arr, array("val" => false));
      }
    }
  }
  else{
    array_push($arr, array("val" => false));
  }
  echo json_encode($arr);
  exit();
}
/**
* delete document
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="doc_delete"){
  $doc_id = $_POST['doc_id'];
  $query = mysqli_query($con, "SELECT * FROM safedocx_docs WHERE `doc_id`=$doc_id AND `doc_user_id`=$userid");
  $arr = array();
  if(mysqli_num_rows($query)>0){
    mysqli_query($con,"DELETE FROM safedocx_docs WHERE `doc_id`=$doc_id");
    if(mysqli_affected_rows($con)>0){
      array_push($arr, array("val" => true));
    }
    else {
      array_push($arr, array("val" => false));
    }
  }
  else{
    array_push($arr, array("val" => false));
  }
  echo json_encode($arr);
  exit();
}

/**
* rename document
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="doc_rename"){
  $doc_id = $_POST['doc_id'];
  $name = $_POST['name'];
  $query = mysqli_query($con, "SELECT * FROM safedocx_docs WHERE `doc_id`=$doc_id AND `doc_user_id`=$userid");
  $arr = array();
  if(mysqli_num_rows($query)>0){
    mysqli_query($con,"UPDATE safedocx_docs SET `doc_caption`= '$name' WHERE `doc_id`=$doc_id");
    if(mysqli_affected_rows($con)>0){
      array_push($arr, array("val" => true));
    }
    else {
      array_push($arr, array("val" => false));
    }
  }
  else{
    array_push($arr, array("val" => false));
  }
  echo json_encode($arr);
  exit();
}

/**
* description change document
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="doc_change_desc"){
  $doc_id = $_POST['doc_id'];
  $desc = $_POST['desc'];
  $query = mysqli_query($con, "SELECT * FROM safedocx_docs WHERE `doc_id`=$doc_id AND `doc_user_id`=$userid");
  $arr = array();
  if(mysqli_num_rows($query)>0){
    mysqli_query($con,"UPDATE safedocx_docs SET `doc_description`= '$desc' WHERE `doc_id`=$doc_id");
    if(mysqli_affected_rows($con)>0){
      array_push($arr, array("val" => true));
    }
    else {
      array_push($arr, array("val" => false));
    }
  }
  else{
    array_push($arr, array("val" => false));
  }
  echo json_encode($arr);
  exit();
}


/**
* delete document
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="doc_share_submit"){
  $doc_id = $_POST['doc_id'];
  $user_id = $_POST['resp_id'];

  $query = mysqli_query($con, "SELECT * FROM safedocx_shares WHERE `share_doc_id`=$doc_id AND `share_recipient_id`=$user_id");
  $arr = array();
  if(mysqli_num_rows($query)<1){
    mysqli_query($con,"INSERT INTO safedocx_shares (`share_recipient_id`,`share_doc_id`) VALUES($user_id,$doc_id)");
    if(mysqli_affected_rows($con)>0){
      array_push($arr, array("val" => true));
    }
    else {
      array_push($arr, array("val" => false));
    }
  }
  else{
    array_push($arr, array("val" => false));
  }
  echo json_encode($arr);
  exit();
}

/**
* public link check
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="check_doc_share_link"){
  $link = $_POST['link'];
  $query = mysqli_query($con, "SELECT * FROM safedocx_links WHERE `link_name`='$link'");
  $arr = array();
  if(mysqli_num_rows($query)<1){
    array_push($arr, array("val" => true));
  }
  else{
    array_push($arr, array("val" => false));
  }
  echo json_encode($arr);
  exit();
}

/**
* public link generation
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="public_doc_link_submit"){
  $doc_id = $_POST['doc_id'];
  $link_text = $_POST['link_text'];
  $query = mysqli_query($con, "SELECT * FROM safedocx_docs WHERE `doc_id`=$doc_id AND `doc_user_id`=$userid");
  $arr = array();
  if(mysqli_num_rows($query)>0){
    mysqli_query($con,"INSERT INTO safedocx_links (`link_doc_id`,`link_name`) VALUES($doc_id,'$link_text')");
    if(mysqli_affected_rows($con)>0){
      array_push($arr, array("val" => true));
    }
    else {
      array_push($arr, array("val" => false));
    }
  }
  else{
    array_push($arr, array("val" => false));
  }
  echo json_encode($arr);
  exit();
}

?>
