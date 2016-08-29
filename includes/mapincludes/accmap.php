<!-- Map Div -->
<div id="panel2" class="panel">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div id="map" class="map"></div>
      </div>
      <div class="col-md-6">
        <table class="table">
          <thead>
            <tr>
              <th>digitisedarea</th>
              <th>rpid</th>
              <th>mbpg</th>
              <th>cropcode</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $userSpatialData->digitisedarea;  ?></td>
              <td><?php echo $userSpatialData->rpid; ?></td>
              <td><?php echo $userSpatialData->mbpg; ?></td>
              <td><?php echo $userSpatialData->cropcode; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- Map Div -->
