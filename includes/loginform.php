<!-- Login Form -->
<form action='' method="POST" class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-sm-2" for="username">Username:</label>
    <div class="col-sm-8">
      <input type="text" name="username" class="box"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="password">Password:</label>
    <div class="col-sm-8">
      <input type="password" name="password" class="box"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-primary"></input>
      <a href="register.php"><button type="button" class="btn btn-default">Register</button></a>
    </div>
    <div class="col-sm-offset-2 col-sm-10">
      <?php
        // // If the message is returned get number and display error
        // if (isset($_GET["msg"])) {
        //   $errid = $_GET["msg"];
        //   $errormsg = $errors[$errid];
        //   echo "<span class='label label-danger'>" . $errormsg . "</span>";
        // }
        if (empty($errors) === false) {
          echo output_errors($errors);
        }
      ?>
    </div>
</form>
<!-- Login Form -->
