<?php

function getspatialdata($holdingNo){
  $data = array();

  $func_num_args = func_num_args();
  $func_get_args = func_get_args();

  if ($func_num_args > 1) {
    unset($func_get_args[0]);

    $fields = '"'.implode('", "', $func_get_args).'"';
    $sqlquery = "SELECT $fields FROM rs_agrparcel WHERE mbpg = $holdingNo";
    $query = pg_query($sqlquery);
    $data = pg_fetch_object($query);
    return $data;
  }
}

?>
