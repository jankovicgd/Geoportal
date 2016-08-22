<?php
  include 'core/config.php';

  if (empty($_POST) === false) {
    $required_fields = array('username', 'password', 'email', 'repeatpass');
    foreach($_POST as $key=>$value) {
      if (empty($value) && in_array($key, $required_fields) === true) {
        $errors[] = 'Polja sa zvezdicom su obavezna.';
        return;
      }
    }
    if (empty($errors) === true){
      if (user_exists($_POST['username'])) {
        $errors[] = 'Korisnik sa tim korisnickim imenom vec postoji';
      }
      // doesn't work from here out
      if (strlen($_POST['password']) < 6) {
        $errors[] = 'Vasa lozinka mora imati najmanje 6 karaktera';
      }
      // doesn't work
      if ($_POST['password'] !== $POST['repeatpass']){
        $errors[] = 'Lozinke u poljima se ne slazu';
      }
      // doesn't work
      if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
        $errors[] = 'Potrebna je validna email adresa';
      }
      // doesn't work
      if (preg_match("/\\s/", $_POST['username']) == true) {
        $errors[] = 'Format korisnickog imena neispravan. Molimo ne koristite razmake';
      }
      if (email_exists($_POST['email']) === true) {
        $errors[] = 'Taj email je vec u upotrebi';
      }
    }
    // add checking for email and spaces in username, username length, email already in db
    //echo 'Form submitted!';
  }
?>

<!DOCTYPE html>
<html lang="sh">

  <?php include 'includes/head.php' ?>

  <body>

    <?php include 'includes/header.php';

    if (empty($_POST) === false && empty($errors) === true) {
      echo "lol";
      $register_data = array();

    } else if (empty($errors) === false){
      echo output_errors($errors);
      echo "lol2";
    }
    ?>
    <!-- Main content -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1>Registracija</h1>
          <hr>
          <p class="lead">Registracija novog korisnika</p>
          <?php include 'includes/regform.php'; ?>
        </div>
      </div>
    </div>
    <!-- Main content -->

    <?php include 'includes/footer.php' ?>

    <?php include 'includes/scripts.php' ?>

  </body>
</html>
