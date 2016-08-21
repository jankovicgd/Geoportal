<!-- Map Nav -->
<div class="container-fluid">
  <div class="btn-group">
  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" id="myBtn">Pomoc</button>
    <div class="btn-group" role="group">
      <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" aria-haspopup="true" aria-expanded="false"> Alati <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li class="dropdown">
          <a href="#">Servisi<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="dropdown">
            <a href="http://localhost:8080/geoserver/ows?service=wfs&version=2.0.0&request=GetCapabilities">WFS<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#" onclick="prikazModalWFS()" data-toggle="modal" data-target="#modalWFS" class="WFS" data-ext="gml">GML</a></li>
              <li><a href="#">SHP</a></li>
            </ul>
            </li>
            <li class="dropdown">
              <a href="http://localhost:8080/geoserver/ows?service=wms&version=1.3.0&request=GetCapabilities">WMS<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#" onclick="prikazModalWMS()" data-toggle="modal" data-target="#modalWMS" class="WMS" data-ext="png">PNG</a></li>
                <li><a href="#" onclick="prikazModalWMS()" data-toggle="modal" data-target="#modalWMS" class="WMS" data-ext="jpeg">JPG</a></li>
                <li><a href="#" onclick="prikazModalWMS()" data-toggle="modal" data-target="#modalWMS" class="WMS" data-ext="gif">GIF</a></li>
                <li><a href="#" onclick="prikazModalWMS()" data-toggle="modal" data-target="#modalWMS" class="WMS" data-ext="pdf">PDF - Doesnt work yet</a></li>
                <li><a href="#" onclick="prikazModalWMS()" data-toggle="modal" data-target="#modalWMS" class="WMS" data-ext="tiff">TIFF</a></li>
              </ul>
            </li>
          </ul>
        </li>
      <li><a href="#" onclick="prikazStatistika()" data-toggle="modal">Statisticki podaci</a></li>
      <li><a href="#">Preferencije</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- Map Nav -->
