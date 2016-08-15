var osmLayer = new ol.layer.Tile({
  source: new ol.source.OSM(),
  type: 'base',
  title: 'OpenStreetMap'
});

var bingAerial = new ol.layer.Tile({
  title: 'Bing Aerial',
  type: 'base',
  source: new ol.source.BingMaps({
      // Get your own key at https://www.bingmapsportal.com/
      key: 'Ahd_32h3fT3C7xFHrqhpKzoixGJGHvOlcvXWy6k2RRYARRsrfu7KDctzDT2ei9xB',
      imagerySet: 'Aerial'
  })
});

var LPIS_topoblock = new ol.layer.Tile({
  name: 'rs_topoblock',
  title: 'Topographic Block',
  visible: true,
  source: new ol.source.TileWMS(({
    url: 'http://localhost:8080/geoserver/gwc/service/wms',
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
    url: 'http://localhost:8080/geoserver/gwc/service/wms',
    params: {
      'LAYERS': 'LPIS:rs_subparcel',
      'SRS': 'EPSG:3857'
    },
    serverType: 'geoserver'
  }))
});

var LPIS_farblock = new ol.layer.Tile({
  name: 'rs_farblock',
  title: 'Farmer Block',
  visible: true,
  source: new ol.source.TileWMS(({
    url: 'http://localhost:8080/geoserver/gwc/service/wms',
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
    url: 'http://localhost:8080/geoserver/gwc/service/wms',
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
    url: 'http://localhost:8080/geoserver/gwc/service/wms',
  params: {
      'LAYERS': 'LPIS:rs_agrparcel',
      'SRS': 'EPSG:3857'
    },
    serverType: 'geoserver'
  }))
});

var map = new ol.Map({
  layers: [new ol.layer.Group({
    title: 'Base Maps',
    layers: [osmLayer, bingAerial]
  }),

  new ol.layer.Group({
    title: 'Overlays',
    layers: [LPIS_agrparcel, LPIS_phyblock, LPIS_farblock, LPIS_subparcel, LPIS_topoblock]
  })
  ],

  target: 'map',
  view: new ol.View({
    center: ol.proj.transform([21, 43.5], 'EPSG:4326', 'EPSG:3857'),
    zoom: 7
  })

});

map.addControl(new ol.control.MousePosition({
  coordinateFormat: ol.coordinate.createStringXY(2)
}));
map.addControl(new ol.control.OverviewMap());
map.addControl(new ol.control.LayerSwitcher());
