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
            if(!loggedin()) {
              echo "<li><a href='loginpage.php'>Login</a></li></ul>";
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
