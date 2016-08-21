<?php

  // start session
  session_start();
  error_reporting(0);

  // require these files and import the functions to each page
  require 'database/connect.php';
  require 'function/general.php';
  require 'function/users.php';

  // errors for users
  $errors = array();
  $errors[0] = 'Molimo unesite podatke';
  $errors[1] = 'Ne postoji to korisnicko ime.';
  $errors[2] = 'Nalog nije aktivan. Molimo aktivirajte preko primljenog e-maila';
  $errors[3] = 'Nije tacna kombinacija username/password';

?>
