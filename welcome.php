<?php
   //include('session.php');
     include("config.php");
     session_start();
     echo "test";

       // username and password sent from form
       echo $_POST["username"] . "<br>";
       $myusername = $_POST["username"];
       echo $myusername;
       $mypassword = $_POST["password"];
       echo $mypassword;

       $sql = "SELECT id FROM usersdb WHERE username = '$myusername' and password = '$mypassword'";
       echo $sql. "<br>";
       $result = pg_query($db,$sql);

       // $stat = pg_connection_status($db);
       // if ($stat === PGSQL_CONNECTION_OK) {
       //     echo 'Connection status ok<br>';
       // } else {
       //     echo 'Connection status bad<br>';
       // }

       $row = pg_fetch_array($result,NULL,PGSQL_NUM);
       //$active = $row['active'];
       $count = pg_num_rows($result);
       echo $count . "<br>";
       // If result matched $myusername and $mypassword, table row must be 1 row
       if($count == 1) { ?>
         <html>

            <head>
               <title>Welcome </title>
            </head>

            <body>
               <h1>Welcome <?php echo $login_session;     echo "$count<br>";
         ?>
         </h1>
               <h2><a href = "logout.php">Sign Out</a></h2>
            </body>

         </html>

  <?php       echo "text";

         session_register("myusername");
         //die();
         $_SESSION['login_user'] = $myusername;
        }else {
          header("location: http://localhost/login.php");
          //echo "Wrong username or password";

        }
   ?>
