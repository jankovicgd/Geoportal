<?php

function getspatialdata($holdingNo){
  $sqlquery = "SELECT * FROM rs_agrparcel WHERE holdingNo = $holdingNo";
  $query = pg_query($sqlquery);
  $data = pg_fetch_object($query);
  return $data;
}

?>
