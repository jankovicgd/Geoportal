<?php

  // start session
  session_start();
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  // require these files and import the functions to each page
  require 'database/connect.php';
  require 'function/general.php';
  require 'function/users.php';
  require 'function/spatial.php';

  // if user is logged in, get his data
  if (loggedin()){
    $session_user_id = $_SESSION['user_id'];
    $user_data = user_data($session_user_id, 'id', 'username', 'password', 'email', 'Nameuser', 'LastName', 'holdingNo');
    $holdingNo = $user_data->holdingNo;
    $userSpatialData = getspatialdata($holdingNo, 'digitisedarea', 'rpid', 'mbpg', 'cropcode');
  }

  // errors for users
  $errors = array();
?>
