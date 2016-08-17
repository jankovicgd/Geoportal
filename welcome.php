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
      session_register("myusername");
      $_SESSION['login_user'] = $myusername;

      if (!$db) {
          echo "Error: Unable to connect to MySQL." . PHP_EOL;
          echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
          echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
          exit;
      }

      echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
      echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

      header("location: welcome.php");
   }else {
      $error = "Your Login Name or Password is invalid";
   }
}

?>

<html>

   <head>
      <title>Welcome </title>
   </head>

   <body>
      <h1>Welcome <?php echo $login_session; ?></h1>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>

</html>
