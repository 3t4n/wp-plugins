//init
var map = L.map('gigapixel-location-map').setView(new L.LatLng(0,0), 0);
L.tileLayer.zoomify('http://thematicmapping.org/playground/zoomify/books/', { 
    width: 8000, 
    height: 5330,
    tolerance: 0.8,
}).addTo(map);


//popup
var popup = L.popup();
function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("Slide Location: " + e.latlng.toString() + " Zoom Lvl: " + map.getZoom())
        .openOn(map);
}
map.on('click', onMapClick);


//change
var changeZoomifyImage = function(gigapixel_storymap_id) {
	L.tileLayer.zoomify(gigapixel_storymaps_object[gigapixel_storymap_id].url, {
		reset: true, 
	    width: 8000, 
	    height: 5330,
	    tolerance: 0.8,
	}).addTo(map);
}