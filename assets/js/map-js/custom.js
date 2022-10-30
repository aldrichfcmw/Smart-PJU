// Common settings
var platform = new H.service.Platform({
  app_id: "devportal-demo-20180625",
  app_code: "9v2BkviRwi9Ot26kp2IysQ",
  useHTTPS: true,
});
var pixelRatio = window.devicePixelRatio || 1;
var defaultLayers = platform.createDefaultLayers({
  tileSize: pixelRatio === 1 ? 256 : 512,
  ppi: pixelRatio === 1 ? undefined : 320,
});

// map12
function addMarkersToMap(map) {
  var DevKitMarker = new H.map.Marker({ lat: 7.27603, lng: 112.79311 });
  map.addObject(DevKitMarker);

  var boardMarker = new H.map.Marker({ lat: 7.27603, lng: 112.79319 });
  map.addObject(boardMarker);
}
var map = new H.Map(
  document.getElementById("map12"),
  defaultLayers.normal.map,
  {
    center: { lat: -7, lng: 112 },
    zoom: 4,
    pixelRatio: pixelRatio,
  }
);
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
var ui = H.ui.UI.createDefault(map, defaultLayers);
addMarkersToMap(map);

// mapdevkit
function addMarkersToMap(map) {
  $.ajax({
    url: "api.php",
    method: "POST",
    data: { type: "marker", devui: "<?php echo $devui; ?>" },
    success: function (response) {
      var todos = JSON.parse(response);
      todos.forEach(function (value, index) {});
    },
  });
}
var map = new H.Map(
  document.getElementById("mapdevkit"),
  defaultLayers.normal.map,
  {
    center: { lat: 50, lng: 5 },
    zoom: 4,
    pixelRatio: pixelRatio,
  }
);
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
var ui = H.ui.UI.createDefault(map, defaultLayers);
addMarkersToMap(map);
