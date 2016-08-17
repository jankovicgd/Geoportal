<?php
  include("config.php");
  session_start();

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);

    $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);
    echo $count;
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count == 1) {
      echo "<html><head><title>Welcome </title></head><body><h1>Welcome $myusername</h1><h2><a href = 'logout.php'>Sign Out</a></h2></body></html>";
      session_register("myusername");
      $_SESSION['login_user'] = $myusername;
    }else {
      echo "<html><body>Wrong password or username</body></html>";
    }
  }
?>
