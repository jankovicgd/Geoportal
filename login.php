<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="Utilities/bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="Utilities/bootstrap-3.3.7-dist/css/bootstrap-dropdownhover.min.css" type="text/css">
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <!-- Stylesheets -->
    <title>Log in</title>
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
                  echo "<li><a href='login.php'>Login</a></li></ul>";
                }
							  else {
                  echo "<li><a href='account.php'>Account</a></li></ul>
                        <ul class='nav navbar-nav navbar-right'>
                          <li><a href='logout.php'>Sign out</a></li>
                        </ul>";
                }
              ?>
          </div>
        </div>
      </nav>
    </header>
    <!-- Navbar -->

    <!-- Login box -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Login</h3>
            </div>
            <div class="panel-body">
              <form action='welcome.php' method="POST" class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="username">Username:</label>
                  <div class="col-sm-10">
                    <input type="text" name="username" class="box"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="password">Password:</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" class="box"/>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary"></input>
                    <button type="button" class="btn btn-default">Register</button>
                </div>
                <div class="col-sm-offset-2 col-sm-10">
                  <?php
                    if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                      echo "<span class='label label-danger'>Wrong username or password</span>";
                    }
                  ?>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Login box -->

    <!-- Footer -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <footer>
            Nikola Jankovic - FTN
          </footer>
        </div>
      </div>
    </div>
    <!-- Footer -->

    <!-- Scripts -->
    <script src="Utilities/js/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="Utilities/jquery-ui-1.12.0/jquery-ui.js" type="text/javascript"></script>
    <script src="Utilities/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="Utilities/bootstrap-3.3.7-dist/js/bootstrap-dropdownhover.min.js" type="text/javascript"></script>
    <!-- Scripts -->
  </body>
</html>
