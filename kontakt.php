<?php include 'core/config.php'; ?>

<!DOCTYPE html>
<html lang="sh">

  <?php include 'includes/head.php' ?>

	<body>

    <?php include 'includes/header.php' ?>

		<!-- Main content -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 text-left">
					<h1>Kontakt</h1>
					<hr>
          <h2>Informacije</h2>
          <p>
            Ime ulice 5/50, 11000 Novi Sad
          </p>
          <p>
            Br telefona: +3811111111
          </p>
          <p>
            Faks: +3811111111
          </p>
          <p>
            Email: <a href="#">kontakt@kontakt.kon</a>
          </p>
          <h2>Mapa</h2>
            <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
              <div style='overflow:hidden;height:440px;width:700px;'><div id='gmap_canvas' style='height:440px;width:700px;'></div><div><small><a href="http://www.embedgooglemaps.com">Generate your Google map here, quick and easy!</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
              </div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(45.255785591294,19.836453838501033),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(45.255785591294,19.836453838501033)});infowindow = new google.maps.InfoWindow({content:'<strong>Title</strong><br>Trg Dositeja obradovica<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
            </script>
				</div>
			</div>
		</div>
		<!-- Main content -->

    <?php include 'includes/footer.php' ?>

    <?php include 'includes/scripts.php' ?>

	</body>
</html>
