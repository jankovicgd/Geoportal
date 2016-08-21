<!-- Modal WMS-->
<div class="modal fade" tabindex="-1" role="dialog" id="WMSMODAL">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="WMSMODALTITLE" class="modal-title">WMS</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="sel1">Izabrati sloj:</label>
          <select class="form-control" id="sel1">
            <option data-lyrName="rs_agrparcel">rs_agrparcel</option>
            <option data-lyrName="rs_topoblock">rs_topoblock</option>
            <option data-lyrName="rs_phyblock">rs_phyblock</option>
            <option data-lyrName="rs_subparcel">rs_subparcel</option>
            <option data-lyrName="rs_farblock">rs_farblock</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="GENWMS">Generisi WMS</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal WMS-->
