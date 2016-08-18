<?php
//include('session.php');
include("config.php");
session_start();

// username and password sent from form
$myusername = $_POST["username"];
$mypassword = $_POST["password"];

$sql = "SELECT id FROM usersdb WHERE username = '$myusername' and password = '$mypassword'";
$result = pg_query($db,$sql);
$row = pg_fetch_array($result,NULL,PGSQL_NUM);
$active = $row['active'];
$count = pg_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count == 1) {
?>
<html>
  <head>
    <title>Welcome </title>
  </head>
  <body>
    <h1>Welcome
      <?php
        echo $myusername;
      ?>
    </h1>
    <h2><a href = "logout.php">Sign Out</a></h2>
  </body>
</html>

<?php
  session_register("myusername");
  die();
  $_SESSION['login_user'] = $myusername;
    }
    else {
      header("location: http://localhost/login.php");
      echo "Wrong username or password";
    }
?>
