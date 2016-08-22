<?php

  // start session
  session_start();
  error_reporting(0);

  // require these files and import the functions to each page
  require 'database/connect.php';
  require 'function/general.php';
  require 'function/users.php';

  // if user is logged in, get his data
  if (loggedin()){
    $session_user_id = $_SESSION['user_id'];
    $user_data = user_data($session_user_id, 'id', 'username', 'password', 'email', 'Nameuser', 'LastName', 'holdingNo');
    //print_r($user_data);
    //echo $user_data->id;
  }

  // errors for users
  $errors = array();
  $errors[0] = 'Molimo unesite podatke';
  $errors[1] = 'Ne postoji to korisnicko ime.';
  $errors[2] = 'Nalog nije aktivan. Molimo aktivirajte preko primljenog e-maila';
  $errors[3] = 'Nije tacna kombinacija username/password';
  $errors[4] = 'Polja sa zvezdicom su obavezna.';
  $errors[5] = 'Korisnik sa tim korisnickim imenom vec postoji';
  $errors[6] = 'Vasa lozinka mora imati najmanje 6 karaktera';
  $errors[7] = 'Lozinke u poljima se ne slazu';
  $errors[8] = 'Potrebna je validna email adresa';
  $errors[9] = 'Format korisnickog imena neispravan. Molimo ne koristite razmake';
  $errors[10] = 'Taj email je vec u upotrebi';

?>
