<?php include 'core/config.php'; ?>

<!DOCTYPE html>
<html lang="sh">
  <?php include 'includes/mapincludes/head.php' ?>

  <body>

    <?php include 'includes/header.php' ?>

    <!-- Heading -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-left">
          <h1>Korisnik ID</h1>
        </div>
      </div>
    </div>
    <!-- Heading -->

    <!-- Map Div -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div id="map" class="map"></div>
        </div>
      </div>
    </div>
    <!-- Map Div -->

    <?php include 'includes/footer.php' ?>

    <?php include 'includes/mapincludes/scripts.php' ?>
    
  </body>
</html>
