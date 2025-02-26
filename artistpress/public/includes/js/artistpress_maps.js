var directionsDisplay;
var directionsService 	= new google.maps.DirectionsService();


function initialize() 
{
	

	var endMarker 			= document.getElementById("end").value;
	var coordinates 		= endMarker.split(",");
	var coordinatesLat 		= coordinates[0];
	var coordinatesLng 		= coordinates[1];


	// alert(startMarker);
	// alert(endMarker);


    directionsDisplay = new google.maps.DirectionsRenderer();
	// var latlng = new google.maps.LatLng("res");
	var latlng = new google.maps.LatLng(coordinatesLat, coordinatesLng);

    var myOptions =
    {
        zoom: 15,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("venueMap"), myOptions);
    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById("venueDirections"))

	var marker = new google.maps.Marker({
    	position: latlng,
    	map: map
  	});


}

function calcRoute() 
{
	var startMarker 		= document.getElementById("start").value;
	var endMarker 			= document.getElementById("end").value;
    
    google.maps.DirectionsTravelMode.DRIVING

        var request = {
            origin: startMarker,
            destination: endMarker,
            travelMode:google.maps.DirectionsTravelMode.DRIVING
            };

        directionsService.route(request, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        }
    });

}

google.maps.event.addDomListener(window, 'load', initialize);