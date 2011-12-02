var map;
var geocoder;

function initialize() {
  if (GBrowserIsCompatible()) {
    map = new GMap2(document.getElementById("map_canvas"));
    geocoder = new GClientGeocoder();

    var point = new GLatLng(-90 + 180 * Math.random(), -180 + 360 * Math.random());
    geocoder.getLocations(point, checkPoint);
  }
}

function checkPoint(response) {
  if (!response || response.Status.code != 200) {
    alert("Status Code:" + response.Status.code);
  } else {
    var place = response.Placemark[0];
    var point = new GLatLng(place.Point.coordinates[1],place.Point.coordinates[0]);
    var marker = new GMarker(point);
    map.addOverlay(marker);
  }
}
