// created map for add food admin
var map = new google.maps.Map(document.getElementById('map-canvas'),{
    center:{
        lat:16.051365,
        lng:108.207430
    },
    zoom:10,
}); 

var marker= new google.maps.Marker({
    position:{
        lat:16.051365,
        lng:108.207430
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
    map.setZoom(10);
});