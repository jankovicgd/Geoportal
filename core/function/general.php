<?php
  // sanitize array preventing SQL injection
  function array_sanitize(&$item){
    $item = pg_escape_string($item);
  }

  // sanitaze data function - prevent SQL injection
  function sanitize($data) {
    return pg_escape_string($data);
  }

  // reload page if errors and provide error code
  function outputErrors($errorid){
    header("Location: loginpage.php?msg=" . $errorid);
  }
  function outputErrors2($errorid){
    header("Location: register.php?msg=" . $errorid);
  }

  function output_errors($errors) {
    $output = array();
    foreach ($errors as $error){
      $output[] = '<li><span class="label label-danger">' . $error . '</span></li>';
    }
    return '<ul class="list-unstyled">' . implode ('', $output) . '<ul>';
  }
  // function getName($userid){
  //   $sqlquery = "SELECT Nameuser FROM usersdb WHERE id = $userid";
  //   $query = pg_query($sqlquery);
  //
  //   return pg_fetch_result($query, 0, 0); <span class="label label-danger"></span>
  // }

 ?>
