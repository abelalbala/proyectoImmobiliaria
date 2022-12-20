let map;
let marker;

function initMap() {
  const myLatLng = { lat: 41.390205, lng: 2.154007 };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 12,
    center: myLatLng,
  });

  document.getElementById("findLoc").addEventListener("click", function(e) {
    let geocoder = new google.maps.Geocoder();
    let address = document.getElementById("inptCalle").value;

    geocoder.geocode({ 'address': address }, function (results, status) {
      
      if (status == google.maps.GeocoderStatus.OK) {

        latitude = results[0].geometry.location.lat();
        longitude = results[0].geometry.location.lng();

        document.getElementById("latitude").value = latitude
        document.getElementById("longitude").value = longitude

        if(marker != undefined) {
          marker.setMap(null)
        }
        console.log("a")
        marker = new google.maps.Marker({
          position: { lat: latitude, lng: longitude },
          map,
          title: document.getElementById("inptCalle").value,
        });

        if(map) {
          map.panTo(marker.getPosition)
        } 
      }
    });
  });   
}