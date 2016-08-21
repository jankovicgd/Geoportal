<?php
   session_start();

   // logout user and destroy session - return to index page
   if(session_destroy()) {
      header("Location: index.php");
      // remove all session variables
      session_unset();

      // destroy the session
      session_destroy();
   }
?>
