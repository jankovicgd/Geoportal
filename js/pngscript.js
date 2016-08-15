function png() {
    group_collection = map.getLayers();
    var markup = "";

    group_collection.forEach(function(a_group, group_index, group_array) {
        a_group.getLayers().forEach(function(a_layer, layer_index, layer_array) {
            //console.log(a_group.get('title'));
            if (a_group.get('title') == "Overlays") {
                //window.alert(a_layer.get('name'));
                markup = markup + " " + a_layer.get('title') + ": " + 'http://localhost:8080/geoserver/LPIS/wms?service=WMS&version=1.1.0&request=GetMap&layers=LPIS:'+a_layer.get('name')+'&styles=&bbox=7417819.71305329,4986187.72636233,7419661.97319402,4989141.32042276&width=479&height=768&srs=EPSG:31277&format=image%2Fpng'
                $("#WMSPNG").on("click", function(){ $("#WMSMODAL").modal();});
                document.getElementById("p1").innerHTML = markup;
            }
        });
    });

    // $(document).on("click", "#WMSPNG", function() {
    //
    //     $('<div></div>').dialog({
    //         modal: true,
    //         title: "WMS - PNG",
    //         open: function() {
    //             markup;
    //             $(this).html(markup);
    //         },
    //         buttons: {
    //             Ok: function() {
    //                 $(this).dialog("close");
    //             }
    //         }
    //     });
    // });
}



//window.open('http://localhost:8080/geoserver/LPIS/wms?service=WMS&version=1.1.0&request=GetMap&layers=LPIS:'+a_layer.get('name')+'&styles=&bbox=7417819.71305329,4986187.72636233,7419661.97319402,4989141.32042276&width=479&height=768&srs=EPSG:31277&format=image%2Fpng',"_blank");
/*
keys = a_layer.getKeys();
all_keys = "";
keys.forEach(function(a_key, key_idx, key_array){
  all_keys = all_keys + " "+a_key;
});
window.alert(all_keys);
*/

/*
layer.forEach(fja(),a_layer);
  function fja(a_layer, elem_idx, the_layer_array){
    window.alert(String(a_layer));
    window.open('http://localhost:8080/geoserver/LPIS/wms?service=WMS&version=1.1.0&request=GetMap&layers=LPIS:'+a_layer.get('name')+'&styles=&bbox=7417819.71305329,4986187.72636233,7419661.97319402,4989141.32042276&width=479&height=768&srs=EPSG:31277&format=image%2Fpng')
  }
  */




//ol.control.LayerSwitcher.forEachRecursive(layer,png());

// $(document).ready(function(){
//
//    $("#WMSPNG").on("click", function(){ $("#modalWMS").modal();});
//
//
//
// });
