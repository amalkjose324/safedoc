<?php
  $con=mysqli_connect("localhost","root","","safedoc_db");

  // Function for select with condition
  function select($table,$condition)
  {
    $query = mysqli_query($con, "SELECT * FROM `$table` WHERE $condition");
    return $query;
  }

  // Function for select without condition
  function select($table)
  {
    $query = mysqli_query($con, "SELECT * FROM `$table`");
    return $query;
  }

  // Function for select-count with condition
  function select_count($table,$condition)
  {
    $query = mysqli_query($con, "SELECT * FROM `$table` WHERE $condition");
    $count=mysqli_num_rows($query);
    return $count;
  }

  // Function for select-count without condition
  function select_count($table)
  {
    $query = mysqli_query($con, "SELECT * FROM `$table`");
    $count=mysqli_num_rows($query);
    return $count;
  }

  // Function for delete with condition
  function delete($table,$condition)
  {
    $query = mysqli_query($con, "DELETE FROM `$table` WHERE $condition");
  }

  // Function for delete without condition
  function delete($table)
  {
    $query = mysqli_query($con, "DELETE FROM `$table`");
  }

  // Function for insert
  function insert($table,$fields,$values)
  {
    $query = mysqli_query($con, "INSERT INTO `$table`($fields) VALUES($values)");
  }

  // Function for update with condition
  function update($table,$values,$condition)
  {
    $query = mysqli_query($con, "UPDATE `$table` SET $values WHERE $condition");
  }
?>
