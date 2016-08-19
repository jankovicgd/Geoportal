<?php
  //include('session.php');
  include("config.php");
  session_start();

  // username and password sent from form
  $myusername = $_POST["username"];
  $mypassword = $_POST["password"];

  $sql = "SELECT id FROM usersdb WHERE username = '$myusername' and password = '$mypassword'";
  $result = pg_query($db,$sql);
  //$row = pg_fetch_array($result,NULL,PGSQL_NUM);
  //$active = $row['active'];
  $count = pg_num_rows($result);
  // If result matched $myusername and $mypassword, table row must be 1 row
  if($count == 1) {
    $_SESSION['login_user'] = $myusername;
    header('location: account.php');
  }
  else {
    header("Location: login.php?msg=failed");
  }
?>
