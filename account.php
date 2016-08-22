<?php include 'core/config.php'; ?>

<!DOCTYPE html>
<html lang="sh">

  <?php include 'includes/mapincludes/head2.php' ?>

  <body>

    <?php include 'includes/header.php' ?>

    <!-- Main content -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1>Nalog,
            <?php
              echo $user_data->username;
            ?>
          </h1>
          <hr>
          <p class="lead">
            Na ovoj stranici mozete podesiti licne informacije i pregledati podatke vezane za vase posede
          </p>
          <div class="tab-panels">
            <ul class="nav nav-tabs">
              <li rel="panel1" class="active"><a href="#">Nalog</a></li>
              <li rel="panel2"><a href="#">Statistika</a></li>
            </ul>
            <br>
            <?php
              include 'includes/accform.php';
              include 'includes/mapincludes/accmap.php';
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Main content -->

    <?php include 'includes/footer.php' ?>

    <?php include 'includes/mapincludes/scripts.php' ?>

  </body>
</html>
