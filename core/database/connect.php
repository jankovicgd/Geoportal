<?php

  // connect to database and store in value
  $db = pg_connect("host=localhost dbname=users user=postgres password=postgres") or die("Couldn't connect to database");

 ?>
