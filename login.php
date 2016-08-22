<?php

  include 'core/config.php';

  if (empty($_POST) === false) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) === true || empty($password) === true){
      $errors[] = 'Molimo unesite podatke';
    } else if (user_exists($username) === false) {
      $errors[] = 'Ne postoji to korisnicko ime.';
    } else if (user_active($username) === false){
      $errors[] = 'Nalog nije aktivan. Molimo aktivirajte preko primljenog e-maila';
    } else {
      $login = login($username, $password);
      if ($login === false) {
        $errors[] = 'Nije tacna kombinacija username/password';
      } else {
        $_SESSION['user_id'] = $login;
        header('Location: account.php');
        exit();
      }
    }
  }
 ?>
