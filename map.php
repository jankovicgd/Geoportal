<?php include 'core/config.php'; ?>


<!DOCTYPE html>
<html lang="sh">

  <?php include 'includes/mapincludes/head.php' ?>

  <body>

    <?php include 'includes/header.php' ?>

    <!-- Main content -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-left">
          <h1>Kartografski pregled</h1>
					<hr>
        </div>
      </div>
    </div>
    <!-- Main content -->

    <?php include 'includes/mapincludes/mapnav.php' ?>

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
      <?php include 'includes/modals/modalHelp.php' ?>
      <?php include 'includes/modals/modalStat.php' ?>
      <?php include 'includes/modals/modalWFS.php' ?>
      <?php include 'includes/modals/modalWMS.php' ?>
    <!-- Modals -->

    <?php include 'includes/footer.php' ?>

    <?php include 'includes/mapincludes/scripts.php' ?>
    
  </body>
</html>
