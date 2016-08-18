

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
            <a class="navbar-brand" href="index.html">Agroportal</a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="oNama.html">O nama</a></li>
              <li><a href="map.html">Kartografski pregled</a></li>
              <li><a href="kontakt.html">Kontakt</a></li>
              <li><a href="login.php">Login</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- Navbar -->

    <!-- Login box -->
    <div class="container row col-md-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Login</h3>
        </div>
        <div class="panel-body">
          <form action='welcome.php'
            method="POST">
            Username: <input type="text" name="username" class="box"/><br /><br />
            Password: <input type="password" name="password" class="box"/><br/><br/>
            <div class="btn-group">
              <input type="submit" class="btn btn-primary">
              <button type="button submit" class="btn btn-default">Register</button>
            </div>
          </form>
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

  </body>
</html>
