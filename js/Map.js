// OSM baselayer
var osmLayer = new ol.layer.Tile({
  source: new ol.source.OSM(),
  type: 'base',
  title: 'OpenStreetMap',
});

// BingAerial baselayer
var bingAerial = new ol.layer.Tile({
  title: 'Bing Aerial',
  type: 'base',
  source: new ol.source.BingMaps({
      // Get your own key at https://www.bingmapsportal.com/
      key: 'Ahd_32h3fT3C7xFHrqhpKzoixGJGHvOlcvXWy6k2RRYARRsrfu7KDctzDT2ei9xB',
      imagerySet: 'Aerial'
  })
});

// Blocks
var LPIS_topoblock = new ol.layer.Tile({
  name: 'rs_topoblock',
  title: 'Topographic Block',
  visible: true,
  source: new ol.source.TileWMS(({
    url: 'http://localhost:8080/geoserver/ows?SERVICE=WMS&',
    params: {
      'LAYERS': 'LPIS:rs_topoblock',
      'SRS': 'EPSG:3857'
    },
    serverType: 'geoserver'
  }))
});

var LPIS_subparcel = new ol.layer.Tile({
  name: 'rs_subparcel',
  title: 'SubParcel',
  visible: true,
  source: new ol.source.TileWMS(({
    url: 'http://localhost:8080/geoserver/ows?SERVICE=WMS&',
    params: {
      'LAYERS': 'LPIS:rs_subparcel',
      'SRS': 'EPSG:3857',
    },
    serverType: 'geoserver'
  }))
});

var LPIS_farblock = new ol.layer.Tile({
  name: 'rs_farblock',
  title: 'Farmer Block',
  visible: true,
  source: new ol.source.TileWMS(({
    url: 'http://localhost:8080/geoserver/ows?SERVICE=WMS&',
    params: {
      'LAYERS': 'LPIS:rs_farblock',
      'SRS': 'EPSG:3857'
    },
    serverType: 'geoserver'
  }))
});

var LPIS_phyblock = new ol.layer.Tile({
  name: 'rs_phyblock',
  title: 'Physical Block',
  visible: true,
  source: new ol.source.TileWMS(({
    url: 'http://localhost:8080/geoserver/ows?SERVICE=WMS&',
    params: {
      'LAYERS': 'LPIS:rs_phyblock',
      'SRS': 'EPSG:3857'
    },
    serverType: 'geoserver'
  }))
});

var LPIS_agrparcel = new ol.layer.Tile({
  name: 'rs_agrparcel',
  title: 'Agricultural Parcel',
  visible: true,
  source: new ol.source.TileWMS(({
    url: 'http://localhost:8080/geoserver/ows?SERVICE=WMS&',
  params: {
      'LAYERS': 'LPIS:rs_agrparcel',
      'SRS': 'EPSG:3857'
    },
    serverType: 'geoserver'
  }))
});

// Initialise map
var map = new ol.Map({
  layers: [
    // Basemap group
    new ol.layer.Group({
      title: 'Base Maps',
      layers: [bingAerial, osmLayer]
    }),
    // Block group
    new ol.layer.Group({
      title: 'Overlays',
      layers: [LPIS_agrparcel, LPIS_phyblock, LPIS_farblock, LPIS_subparcel, LPIS_topoblock]
    })],
  target: 'map',
  view: new ol.View({
    center: ol.proj.transform([19.95, 45.025], 'EPSG:4326', 'EPSG:3857'),
    zoom: 13
  })
});

// Add control - layerSwitcher is extension
map.addControl(new ol.control.MousePosition({
  coordinateFormat: ol.coordinate.createStringXY(2)
}));
map.addControl(new ol.control.OverviewMap());
map.addControl(new ol.control.LayerSwitcher());
