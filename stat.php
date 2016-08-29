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
        <div class="col-md-6">
          <div id="map" class="map"></div>
        </div>
        <div class="col-md-6">
          <table class="table">
            <thead>
              <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
              </tr>
              <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>mary@example.com</td>
              </tr>
              <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Map Div -->

    <?php include 'includes/footer.php' ?>

    <?php include 'includes/mapincludes/scripts.php' ?>

  </body>
</html>
