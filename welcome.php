<?php
  //include('session.php');
  include("config.php");
  session_start();

  // username and password sent from form
  $myusername = $_POST["username"];
  $mypassword = $_POST["password"];

  $sql = "SELECT id FROM usersdb WHERE username = '$myusername' and password = '$mypassword'";
  $result = pg_query($db,$sql);
  $row = pg_fetch_array($result,NULL,PGSQL_NUM);
  $active = $row['active'];
  $count = pg_num_rows($result);
  // If result matched $myusername and $mypassword, table row must be 1 row
  if($count == 1) {
    $_SESSION['login_user'] = $myusername;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="Utilities/bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="Utilities/bootstrap-3.3.7-dist/css/bootstrap-dropdownhover.min.css" type="text/css">
    <link rel="stylesheet" href="Utilities/ol3-layerswitcher/ol3-layerswitcher.css" type="text/css">
    <link rel="stylesheet" href="css/stat.css" type="text/css">
    <!-- Stylesheets -->

    <title>Dobrodosli</title>
  </head>
  <body>
    <!-- Navbar -->
    <header>
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Agroportal</a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="oNama.php">O nama</a></li>
		          <li><a href="map.php">Kartografski pregled</a></li>
		          <li><a href="kontakt.php">Kontakt</a></li>
              <?php
                if(!isset($_SESSION['login_user'])) {
                  echo "<li><a href='login.php'>Login</a></li>";
                }
                else {
                  echo "<li><a href='account.php'>Account</a></li>";
                }
              ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- Navbar -->

    <!-- Heading -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-left">
          <h1>Dobrodosli,
            <?php
              echo $myusername;
            ?>
          </h1>
        </div>
      </div>
    </div>
    <!-- Heading -->

    <!-- sign out -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-left">
          <h2><a href = "logout.php">Sign Out</a></h2>
        </div>
      </div>
    </div>
    <!-- sign out -->

  </body>
</html>

<?php
    }
    else {
      echo "Wrong username or password";
      header("Location: login.php");
    }
?>
