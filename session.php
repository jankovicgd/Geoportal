<?php
   include('config.php');
   session_start();
   echo $_SESSION['login_user'];

  //  $user_check = $_SESSION['login_user'];
  //  $ses_sql = pg_query($db,"select username from usersdb where username = '$user_check' ");
  //  $login_session = $row['username'];


    // if(!isset($_SESSION['login_user'])){
    //    header("Location: login.php");
    // }
?>
