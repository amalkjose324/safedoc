<?php
include_once '../db_connect.php';
$userid=$_SESSION['user_id'];

/**
* Download document
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="doc_download"){
  $doc_id = $_POST['doc_id'];
  $query = mysqli_query($con, "SELECT * FROM safedocx_docs WHERE `doc_id`=$doc_id AND `doc_user_id`=$userid");
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
* priview document
* @var json
*/
if(isset($_POST['fun']) && $_POST['fun']=="doc_priview"){
  $doc_id = $_POST['doc_id'];
  $query = mysqli_query($con, "SELECT * FROM safedocx_docs WHERE `doc_id`=$doc_id AND `doc_user_id`=$userid");
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
?>
