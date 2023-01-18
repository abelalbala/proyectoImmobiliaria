console.log("entro")
function initMap() {
  const myLatLng = { lat: 41.390205, lng: 2.154007 };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 12,
    center: myLatLng,
  });

  new google.maps.Marker({
    position: { lat: document.getElementById("latitude"), lng: document.getElementById("longitude") },
    map,
    title: document.getElementById("nombre"),
  });
}

window.initMap = initMap;