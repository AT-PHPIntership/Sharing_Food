// created map for add food admin
var map = new google.maps.Map(document.getElementById('map-canvas'),{
    center:{
        lat:latdefault,
        lng:lngdefault
    },
    zoom:zoomdefault,
}); 

var marker= new google.maps.Marker({
    position:{
        lat:latdefault,
        lng:lngdefault
    },
    map : map,
    draggable: true
});

var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
google.maps.event.addListener(searchBox,'places_changed',function(){
    var places= searchBox.getPlaces();
    var bounds= new google.maps.LatLngBounds();
    var i,place;
    for(i=0;place=places[i];i++){
        bounds.extend(place.geometry.location);
        marker.setPosition(place.geometry.location)//thiết lập vị trí mới
    }
    map.fitBounds(bounds);
    map.setZoom(zoomdefault);
});