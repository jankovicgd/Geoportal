<?php
  include 'core/config.php';

  if (empty($_POST) === false) {
    $required_fields = array('username', 'password', 'email', 'repeatpass', 'holdingNo');
    foreach($_POST as $key=>$value) {
      if (empty($value) && in_array($key, $required_fields) === true) {
        $errors[] = 'Polja sa zvezdicom su obavezna.';
        break;
      }
    }
    if (empty($errors) === true){
      if (user_exists($_POST['username'])) {
        $errors[] = 'Korisnik sa tim korisnickim imenom vec postoji';
      }
      if (strlen($_POST['password']) < 6) {
        $errors[] = 'Vasa lozinka mora imati najmanje 6 karaktera';
      }
      if ($_POST['password'] !== $_POST['repeatpass']){
        $errors[] = 'Lozinke u poljima se ne slazu';
      }
      if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
        $errors[] = 'Potrebna je validna email adresa';
      }
      if (preg_match("/\\s/", $_POST['username']) == true) {
        $errors[] = 'Format korisnickog imena neispravan. Molimo ne koristite razmake';
      }
      if (email_exists($_POST['email']) === true) {
        $errors[] = 'Taj email je vec u upotrebi';
      }
      if (strlen($_POST['username']) > 20) {
        $errors[] = 'Korisnicko ime mora imati manje od 20 karaktera';
      }
      if (holding_exists('holdingNo')) {
        $errors[] = 'Korisnik je vec registrovan sa tim brojem gazdinstva';
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="sh">

  <?php include 'includes/head.php' ?>

  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <?php include 'includes/header.php';

            if(isset($_GET['success']) && empty($_GET['success'])) {
              echo "<span class='label label-success'>Registracija uspesna</span>";
            }

            if (empty($_POST) === false && empty($errors) === true) {
              $register_data = array(
                'username'  => $_POST['username'],
                'email'     => $_POST['email'],
                'password'  => $_POST['password'],
                'Nameuser'  => $_POST['Nameuser'],
                'LastName'  => $_POST['LastName'],
                'holdingNo' => $_POST['holdingNo'],
              );
              register_user($register_data);
              header('Location: register.php?success');
              exit();
            } else if (empty($errors) === false) {
              echo output_errors($errors);
            }
          ?>
        </div>
      </div>
    </div>

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
