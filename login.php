<?php

  include 'core/config.php';

  if (empty($_POST) === false) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) === true || empty($password) === true){
      $errid = 0;
      outputErrors($errid);
    } else if (user_exists($username) === false) {
      $errid = 1;
      outputErrors($errid);
    } else if (user_active($username) === false){
      $errid = 2;
      outputErrors($errid);
    } else {
      $login = login($username, $password);
      if ($login === false) {
        $errid = 3;
        outputErrors($errid);
      } else {
        $_SESSION['user_id'] = $login;
        header('Location: account.php');
        exit();
      }
    }
  }
 ?>
