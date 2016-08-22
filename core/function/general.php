<?php

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

  // function getName($userid){
  //   $sqlquery = "SELECT Nameuser FROM usersdb WHERE id = $userid";
  //   $query = pg_query($sqlquery);
  //
  //   return pg_fetch_result($query, 0, 0);
  // }

 ?>
