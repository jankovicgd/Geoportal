<?php
  include 'core/config.php';
  //echo $_GET['msg'] . " poruka";

  if (empty($_POST) === false) {
    $required_fields = array('username', 'password', 'email', 'repeatpass');
    foreach($_POST as $key=>$value) {
      if (empty($value) && in_array($key, $required_fields) === true) {
        $errorid = 4;
        outputErrors2($errorid);
        return;
      }
    }
    if (user_exists($_POST['username'])) {
      $errorid = 5;
      outputErrors2($errorid);
    }
    // doesn't work from here out
    if (strlen($_POST['password']) < 6) {
      $errorid = 6;
      outputErros2($errorid);
    }
    // doesn't work
    if ($_POST['password'] !== $POST['repeatpass']){
      $errorid = 7;
      outputErros2($errorid);
    }
    // doesn't work
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errorid = 8;
      outputErros2($errorid);
    }
    // doesn't work
    if (preg_match("/\\s/", $_POST['username']) == true) {
      $errorid = 9;
      outputErros2($errorid);
    }
    if (email_exists($_POST['email']) === true) {
      $errorid = 10;
      outputErros2($errorid);
    }
    // add checking for email and spaces in username, username length, email already in db
    echo 'Form submitted!';
  }
?>

<!DOCTYPE html>
<html lang="sh">

  <?php include 'includes/head.php' ?>

  <body>

    <?php include 'includes/header.php' ?>

    <!-- Main content -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1>Registracija</h1>
          <hr>
          <p class="lead">Registracija novog korisnika</p>
          <?php include 'includes/regform.php' ?>
          <?php
            // If the message is returned get number and display error
            if (isset($_GET["msg"])) {
              $errid = $_GET["msg"];
              $errormsg = $errors[$errid];
              echo "<span class='label label-danger'>" . $errormsg . "</span>";
            }
          ?>
        </div>
      </div>
    </div>
    <!-- Main content -->

    <?php include 'includes/footer.php' ?>

    <?php include 'includes/scripts.php' ?>

  </body>
</html>
