let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: 8,
    center: new google.maps.LatLng(41.390205, 2.154007),
    mapTypeId: "terrain",
  });
}

/*let geocoder = new google.maps.Geocoder();
let address = "Carrer de la Selva de Mar 211 08020 Barcelona";
geocoder.geocode({ 'address': address }, function (results, status) {
  if (status == google.maps.GeocoderStatus.OK) {
    latitude = results[0].geometry.location.lat();
    longitude = results[0].geometry.location.lng();
  }
});*/