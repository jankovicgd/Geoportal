// Klikom na WMS klasu (png, jpg) generise se sadrzaj u vidu naslova
$(".WMS").on("click", sadrzaj);

var panelext;

// Funkcija sadrzaj podesava naslov panela
function sadrzaj(){
  panelext = $(this).attr('data-ext');
  $("#WMSMODALTITLE").html("WMS " + panelext);
}

// funkcija prikazModal prikazuje modal
function prikazModalWMS() {
  $("#WMSMODAL").modal();
}

// klikom na dugme GENWMS pokrece se generisanjeWMS funkcija
$("#GENWMS").on("click", generisanjeWMS);

// funkcija uzima vrednost iz liste i generise link pomocu ekstenzije i vrednosti iz liste
function generisanjeWMS(){
    var values = $("#sel1").val();
    window.open("http://localhost:8080/geoserver/LPIS/wms?service=WMS&version=1.1.0&request=GetMap&layers=LPIS:"+values+"&styles=&bbox=7417819.71305329,4986187.72636233,7419661.97319402,4989141.32042276&width=479&height=768&srs=EPSG:31277&format=image%2F"+panelext,'_blank');
}
