<?php
  $con=mysqli_connect("localhost","root","","safedoc_db");

  // Function for select with condition
  function select()
  {
    global $con;
    $arg_count=func_num_args();
    $arg_list = func_get_args();
    $table=$arg_list[0];
    if($arg_count==2){
      $condition=$arg_list[1];
      $query = mysqli_query($con, "SELECT * FROM `$table` WHERE $condition");
      $count = mysqli_num_rows($query);
      return array('rows' => $query, 'count' => $count);
    }
    else {
      $query = mysqli_query($con, "SELECT * FROM `$table`");
      $count = mysqli_num_rows($query);
      return array('rows' => $query, 'count' => $count);
    }
  }

  // Function for delete with condition
  function remove()
  {
    global $con;
    $arg_count=func_num_args();
    $arg_list = func_get_args();
    $table=$arg_list[0];
    if($arg_count==2){
      $condition=$arg_list[1];
      $query = mysqli_query($con, "DELETE FROM `$table` WHERE $condition");
      if($query){
        return true;
      }
      else {
        return false;
      }
    }
    else {
      $query = mysqli_query($con, "DELETE FROM `$table`");
      if($query){
        return true;
      }
      else {
        return false;
      }
    }
  }

  // Function for insert
  function insert($table,$fields,$values)
  {
    global $con;
    $query = mysqli_query($con, "INSERT INTO `$table`($fields) VALUES($values)");
    if($query){
      return true;
    }
    else {
      return false;
    }
  }

  // Function for update with condition
  function update($table,$values,$condition)
  {
    global $con;
    $query = mysqli_query($con, "UPDATE `$table` SET $values WHERE $condition");
    if($query){
      return true;
    }
    else {
      return false;
    }
  }
?>
