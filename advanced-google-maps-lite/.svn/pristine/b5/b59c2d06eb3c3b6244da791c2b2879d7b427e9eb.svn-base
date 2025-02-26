function initMap() {
  var markerArray = [];

  /* Instantiate a directions service. */
  var directionsService = new google.maps.DirectionsService();

  var latt = wl_agm_lite_route.wl_lat;
  var long = wl_agm_lite_route.long;

  /* Create a map and center it on Manhattan. */
  var map = new google.maps.Map(
    document.getElementById("route_map-" + wl_agm_lite_route.map_id),
    {
      zoom: 14,
      center: new google.maps.LatLng(latt, long),
    }
  );

  /* Set the map"s style to the initial value of the selector. */
  map.setOptions({ styles: styles[wl_agm_lite_route.theme] });

  if (wl_agm_lite_route.draggable !== "0") {
    var drag_val = true;
  } else {
    var drag_val = false;
  }

  /* Create a renderer for directions and bind it to the map. */
  var directionsDisplay = new google.maps.DirectionsRenderer({
    draggable: drag_val,
    map: map,
    polylineOptions: {
      strokeColor: wl_agm_lite_route.stroke_color,
      strokeOpacity: wl_agm_lite_route.stroke_typ,
      strokeWeight: wl_agm_lite_route.stroke_weight,
      draggable: true,
    },
    scrollwheel: true,
  });

  /* Instantiate an info window to hold step text. */
  var stepDisplay = new google.maps.InfoWindow();

  /* Display the route between the initial start and end selections. */
  calculateAndDisplayRoute(
    directionsDisplay,
    directionsService,
    markerArray,
    stepDisplay,
    map
  );
}

function calculateAndDisplayRoute(
  directionsDisplay,
  directionsService,
  markerArray,
  stepDisplay,
  map
) {
  /* First, remove any existing markers from the map. */
  for (var i = 0; i < markerArray.length; i++) {
    markerArray[i].setMap(null);
  }

  /* Retrieve the start and end locations and create a DirectionsRequest using */
  /* WALKING directions. */
  directionsService.route(
    {
      origin: wl_agm_lite_route.start_loc,
      destination: wl_agm_lite_route.end_loc,
      travelMode: google.maps.TravelMode[wl_agm_lite_route.route_type],
      unitSystem: google.maps.UnitSystem[wl_agm_lite_route.unit_system],
    },
    function (response, status) {
      /* Route the directions and pass the response to a function to create */
      /* markers for each step. */
      if (status === "OK") {
        directionsDisplay.setDirections(response);
        if (wl_agm_lite_route.r_waypoints_ed == "0") {
          showSteps(response, markerArray, stepDisplay, map);
        }
      } else {
        window.alert("Directions request failed due to " + status);
      }
    }
  );
}

function showSteps(directionResult, markerArray, stepDisplay, map) {
  /*  For each step, place a marker, and add the text to the marker's infowindow.
		Also attach the marker to an array so we can keep track of it and remove it
		when calculating new routes.
	*/
  var myRoute = directionResult.routes[0].legs[0];
  for (var i = 0; i < myRoute.steps.length; i++) {
    var marker = (markerArray[i] = markerArray[i] || new google.maps.Marker());
    marker.setMap(map);
    marker.setPosition(myRoute.steps[i].start_location);
    attachInstructionText(
      stepDisplay,
      marker,
      myRoute.steps[i].instructions,
      map
    );
  }
}

function attachInstructionText(stepDisplay, marker, text, map) {
  google.maps.event.addListener(marker, "click", function () {
    /* Open an info window when the marker is clicked on, containing the text of the step. */
    stepDisplay.setContent(text);
    stepDisplay.open(map, marker);
  });
}
