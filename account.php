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
          <h1>Nalog,
            <?php
              echo $user_data->Nameuser;
            ?>
          </h1>
          <hr>
          <p class="lead">
            Na ovoj stranici mozete podesiti licne informacije i pregledati podatke vezane za vase posede
          </p>
          <?php include 'includes/accform.php' ?>
        </div>
      </div>
    </div>
    <!-- Main content -->

    <!-- Sign out button -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-left">
          <h2><a href = "logout.php">Sign Out</a></h2>
        </div>
      </div>
    </div>
    <!-- Sign out button -->

    <?php include 'includes/footer.php' ?>

    <?php include 'includes/scripts.php' ?>

  </body>
</html>
