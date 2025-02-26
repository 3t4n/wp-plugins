// Global variable.
var geocoder;
var map;

var mapStyles = amm_frontend_obj.map_settings.map_style;
var mapStyleType = amm_frontend_obj.map_settings.map_theme;
var map_full_screen = amm_frontend_obj.map_settings.map_full_screen;
var map_type_control = amm_frontend_obj.map_settings.map_type_control;
var map_street_view = amm_frontend_obj.map_settings.map_street_view;
var map_street_view = amm_frontend_obj.map_settings.map_street_view;
var selectedStyle,
    standard = [],
    silver = [ {"elementType":"geometry","stylers":[{"color":"#f5f5f5"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#f5f5f5"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#bdbdbd"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#dadada"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#c9c9c9"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]} ],
    retro = [ {"elementType":"geometry","stylers":[{"color":"#ebe3cd"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#523735"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#f5f1e6"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#c9b2a6"}]},{"featureType":"administrative.land_parcel","elementType":"geometry.stroke","stylers":[{"color":"#dcd2be"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#ae9e90"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#93817c"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#a5b076"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#447530"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#f5f1e6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#fdfcf8"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#f8c967"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#e9bc62"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry","stylers":[{"color":"#e98d58"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.stroke","stylers":[{"color":"#db8555"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#806b63"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"transit.line","elementType":"labels.text.fill","stylers":[{"color":"#8f7d77"}]},{"featureType":"transit.line","elementType":"labels.text.stroke","stylers":[{"color":"#ebe3cd"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#b9d3c2"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#92998d"}]} ],
    dark = [ {"elementType":"geometry","stylers":[{"color":"#212121"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#212121"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#757575"}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"administrative.land_parcel","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#bdbdbd"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#181818"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"poi.park","elementType":"labels.text.stroke","stylers":[{"color":"#1b1b1b"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#2c2c2c"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#8a8a8a"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#373737"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#3c3c3c"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry","stylers":[{"color":"#4e4e4e"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"transit","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#3d3d3d"}]} ],
    night = [ {"elementType":"geometry","stylers":[{"color":"#242f3e"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#746855"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#242f3e"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#d59563"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#d59563"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#263c3f"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#6b9a76"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#38414e"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#212a37"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#9ca5b3"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#746855"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#1f2835"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#f3d19c"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#2f3948"}]},{"featureType":"transit.station","elementType":"labels.text.fill","stylers":[{"color":"#d59563"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#17263c"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#515c6d"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"color":"#17263c"}]} ],
    aubergine = [ {"elementType":"geometry","stylers":[{"color":"#1d2c4d"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#8ec3b9"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#1a3646"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"color":"#4b6878"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#64779e"}]},{"featureType":"administrative.province","elementType":"geometry.stroke","stylers":[{"color":"#4b6878"}]},{"featureType":"landscape.man_made","elementType":"geometry.stroke","stylers":[{"color":"#334e87"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#023e58"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#283d6a"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#6f9ba5"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"color":"#1d2c4d"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#023e58"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#3C7680"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#304a7d"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#98a5be"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#1d2c4d"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#2c6675"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#255763"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#b0d5ce"}]},{"featureType":"road.highway","elementType":"labels.text.stroke","stylers":[{"color":"#023e58"}]},{"featureType":"transit","elementType":"labels.text.fill","stylers":[{"color":"#98a5be"}]},{"featureType":"transit","elementType":"labels.text.stroke","stylers":[{"color":"#1d2c4d"}]},{"featureType":"transit.line","elementType":"geometry.fill","stylers":[{"color":"#283d6a"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#3a4762"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#0e1626"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#4e6d70"}]} ];

switch( mapStyleType ) {
  case "silver":
    selectedStyle = silver;
    break;
  case "retro":
    selectedStyle = retro;
    break;
  case "dark":
    selectedStyle = dark;
    break;
  case "night":
    selectedStyle = night;
    break;
  case "aubergine":
    selectedStyle = aubergine;
    break;
  default:
  selectedStyle = standard;
}

var markerData = amm_frontend_obj.amm_save_marker_option
// Drawing shape object.
if ( markerData.amm_marker_positions ) {
  var mapType = JSON.parse( markerData.amm_marker_type );
  var mapLatlngs = JSON.parse( markerData.amm_marker_positions );
}
// Map controller object.
if ( markerData.amm_map_control ) {
  var mapControl = JSON.parse( markerData.amm_map_control );
}

// Finally land all the map on the map.
function initialize() {
  // option from backend 
  var map_full_screen_status=false;
  var map_type_control_status=false;
  var map_street_view_status=false;
  if(map_full_screen=='on'){
    map_full_screen_status=true;
  }

  if(map_type_control=='on'){
    map_type_control_status=true;
  }

  if(map_street_view=='on'){
    map_street_view_status=true;
  }
  var mapLat = ( markerData.amm_map_control ) ? mapControl[0].lat : 38.7520698;
  var mapLng = ( markerData.amm_map_control ) ? mapControl[0].lng : 33.3604434;
  var latlng = new google.maps.LatLng( mapLat, mapLng );
  var myOptions = {
    zoom: ( markerData.amm_map_control ) ? mapControl[0].zoom : 5,
    center: latlng,
    mapTypeControl: map_type_control_status,
    mapTypeControlOptions: { style: google.maps.MapTypeControlStyle.DROPDOWN_MENU },
    navigationControl: true,
    mapTypeId: mapStyles,
    styles: selectedStyle,
    fullscreenControl: map_full_screen_status,
    streetViewControl: map_street_view_status,
  };
  // multimarkers array.
  var multimarkers = [];
  map = new google.maps.Map( document.getElementById('frontmap'), myOptions );
  if ( mapLatlngs ) {
    // Add map drawing tools.
    mapLatlngs.forEach(function( latlg, i ) {
      var geocoder = new google.maps.Geocoder;
      var infowindow = new google.maps.InfoWindow;
      var multipoint = [];
      // MapType Marker.
      if ( mapType[0].type[i] == 'marker' ) {
        var latlngs = {lat: parseFloat(latlg.lat), lng: parseFloat(latlg.lng)};

        var marker = new google.maps.Marker( {
          position: latlngs,
          map: map,
          icon: latlg.img[0],
        } ); 

        google.maps.event.addListener( marker, 'click', function() {
          infowindow = new google.maps.InfoWindow({
            content: '<div><strong>' + latlg.title[0] + '</strong><br /><a href="https://www.google.com/maps/search/?api=1&query=' + parseFloat( latlg.lat ) + ',' + parseFloat( latlg.lng ) + '&query_place_id=' + latlg.place_id + '" target="_blank">Get Direction</a></div>',
            size: new google.maps.Size( 150, 50 )
          });
          infowindow.open( map, marker );
        } );
      }
      // MapType polygon & polyline.
      if ( mapType[0].type[i] == 'polygon' || mapType[0].type[i] == 'polyline' ) {
        latlg.poly.forEach( function( pos, j ) {
          multipoint.push( pos );
        });
      
        var triangleCoords = multipoint;
        // Construct the polygon.
        var bermudaTriangle = new google.maps.Polygon( {
          paths: triangleCoords,
          strokeColor: latlg.fillcolor,  
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: latlg.fillcolor,
          fillOpacity: 0.35
        } );
        bermudaTriangle.setMap( map );
      }
      // MapType circle.
      if ( mapType[0].type[i] == 'circle' ) {
        var cityCircle = new google.maps.Circle( {
          strokeColor: latlg.fillcolor,
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: latlg.fillcolor,
          fillOpacity: 0.35,
          map: map,
          center: latlg.circle,
          radius: latlg.radius
        } );
      }
      // MapType rectangle.
      if ( mapType[0].type[i] == 'rectangle' ) {
        var rectangle = new google.maps.Rectangle( {
          strokeColor: latlg.fillcolor,
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: latlg.fillcolor,
          fillOpacity: 0.35,
          map: map,
          bounds: latlg.rectangle
        } );
      }
    });
  }
}

google.maps.event.addDomListener( window, 'load', initialize );