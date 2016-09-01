<table class="table">
  <thead>
    <tr>
      <?php
        foreach ($userSpatialData as $key => $value) {
          if($key == 0){
            foreach ($value as $key2 => $value2) {
                echo "<th>" . $key2 . "</th>";
            }
          }
        }
      ?>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($userSpatialData as $key => $value) {
        echo "<tr>";
          foreach ($value as $key2 => $value2) {
              echo "<td>" . $value2 . "</td>";
          }
        echo "</tr>";
      }
    ?>
  </tbody>
</table>
