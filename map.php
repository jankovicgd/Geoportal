<?php
  include('config.php');
  //include('session.php');
  session_start();
  //echo $_SESSION['login_user'];
  //die();
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="Utilities/v3.17.1/css/ol.css" type="text/css">
    <link rel="stylesheet" href="Utilities/bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="Utilities/bootstrap-3.3.7-dist/css/bootstrap-dropdownhover.min.css" type="text/css">
    <link rel="stylesheet" href="Utilities/ol3-layerswitcher/ol3-layerswitcher.css" type="text/css">
    <link rel="stylesheet" href="css/map.css" type="text/css">
    <!-- Stylesheets -->

    <title>Prikaz</title>
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

    <!-- Heading -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-left">
          <h1>Kartografski pregled</h1>
					<hr>
        </div>
      </div>
    </div>
    <!-- Heading -->

    <!-- Map Nav -->
    <div class="container-fluid">
      <div class="btn-group">
      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" id="myBtn">Pomoc</button>
        <div class="btn-group" role="group">
          <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" aria-haspopup="true" aria-expanded="false"> Alati <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li class="dropdown">
              <a href="#">Servisi<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="dropdown">
                <a href="http://localhost:8080/geoserver/ows?service=wfs&version=2.0.0&request=GetCapabilities">WFS<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#" onclick="prikazModalWFS()" data-toggle="modal" data-target="#modalWFS" class="WFS" data-ext="gml">GML</a></li>
                  <li><a href="#">SHP</a></li>
                </ul>
                </li>
                <li class="dropdown">
                  <a href="http://localhost:8080/geoserver/ows?service=wms&version=1.3.0&request=GetCapabilities">WMS<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#" onclick="prikazModalWMS()" data-toggle="modal" data-target="#modalWMS" class="WMS" data-ext="png">PNG</a></li>
                    <li><a href="#" onclick="prikazModalWMS()" data-toggle="modal" data-target="#modalWMS" class="WMS" data-ext="jpeg">JPG</a></li>
                    <li><a href="#" onclick="prikazModalWMS()" data-toggle="modal" data-target="#modalWMS" class="WMS" data-ext="gif">GIF</a></li>
                    <li><a href="#" onclick="prikazModalWMS()" data-toggle="modal" data-target="#modalWMS" class="WMS" data-ext="pdf">PDF - Doesnt work yet</a></li>
                    <li><a href="#" onclick="prikazModalWMS()" data-toggle="modal" data-target="#modalWMS" class="WMS" data-ext="tiff">TIFF</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          <li><a href="#" onclick="prikazStatistika()" data-toggle="modal">Statisticki podaci</a></li>
          <li><a href="#">Preferencije</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Map Nav -->

    <!-- Map Div -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div id="map" class="map"></div>
        </div>
      </div>
    </div>
    <!-- Map Div -->

    <!-- Modals -->
    <!-- Modal Pomoc-->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pomoc</h4>
                </div>
                <div class="modal-body">
                    <p>Klikom na opcije WMS ili WFS se moze dobiti zahtev za GetCapabilities</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Pomoc-->

    <!-- Modal WMS-->
    <div class="modal fade" tabindex="-1" role="dialog" id="WMSMODAL">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 id="WMSMODALTITLE" class="modal-title">WMS</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="sel1">Izabrati sloj:</label>
              <select class="form-control" id="sel1">
                <option data-lyrName="rs_agrparcel">rs_agrparcel</option>
                <option data-lyrName="rs_topoblock">rs_topoblock</option>
                <option data-lyrName="rs_phyblock">rs_phyblock</option>
                <option data-lyrName="rs_subparcel">rs_subparcel</option>
                <option data-lyrName="rs_farblock">rs_farblock</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="GENWMS">Generisi WMS</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal WMS-->

    <!-- Modal WFS-->
    <div class="modal fade" tabindex="-1" role="dialog" id="WFSMODAL">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 id="WFSMODALTITLE" class="modal-title">WFS</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="sel2">Izabrati sloj:</label>
              <select class="form-control" id="sel2">
                <option data-lyrName="rs_agrparcel">rs_agrparcel</option>
                <option data-lyrName="rs_topoblock">rs_topoblock</option>
                <option data-lyrName="rs_phyblock">rs_phyblock</option>
                <option data-lyrName="rs_subparcel">rs_subparcel</option>
                <option data-lyrName="rs_farblock">rs_farblock</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="GENWFS">Generisi WFS</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal WFS-->

    <!-- Modal Statisticki podaci-->
    <div class="modal fade" tabindex="-1" role="dialog" id="statpodaci">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Statistika</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="sel3">Uneti ID korisnika:</label>
              <form role="form">
                <div class="form-group">
                  <input class="form-control" id="identifikatorkorisnik">
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="statID">Kreni</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Statisticki podaci-->
    <!-- Modals -->

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
    <script src="Utilities/v3.17.1/build/ol.js" type="text/javascript"></script>
    <script src="Utilities/ol3-layerswitcher/ol3-layerswitcher.js" type="text/javascript"></script>
    <script src="js/mapFunc.js" type="text/javascript"></script>
    <script src="js/mainMap.js" type="text/javascript"></script>
    <!-- Scripts -->
  </body>
</html>
