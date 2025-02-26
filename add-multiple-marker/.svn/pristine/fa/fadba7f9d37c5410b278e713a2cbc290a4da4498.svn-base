// Global variables.
var map;
var drawingManager;

var selectedShape;
var selectedShapeEle = [];

var colorButtons = [];
var cloneMarkers = [];
var imagesBtn = [];

var drawShape;
var mapType = [];
var allDrawShape = [];
var drawShapeDetail = [];

var markerImg = [
  amm_plugin_obj.plugin_path + 'admin/images/defaultmarker.png',
  amm_plugin_obj.plugin_path + 'admin/images/marker1.png',
  amm_plugin_obj.plugin_path + 'admin/images/marker2.png',
  amm_plugin_obj.plugin_path + 'admin/images/marker3.png',
];

var style = amm_plugin_obj.map_settings.map_theme;
var selectedStyle,
    standard = [],
    silver = [{"elementType":"geometry","stylers":[{"color":"#f5f5f5"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#f5f5f5"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#bdbdbd"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#dadada"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#c9c9c9"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]}],
    retro = [{"elementType":"geometry","stylers":[{"color":"#ebe3cd"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#523735"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#f5f1e6"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#c9b2a6"}]},{"featureType":"administrative.land_parcel","elementType":"geometry.stroke","stylers":[{"color":"#dcd2be"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#ae9e90"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#93817c"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#a5b076"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#447530"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#f5f1e6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#fdfcf8"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#f8c967"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#e9bc62"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry","stylers":[{"color":"#e98d58"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.stroke","stylers":[{"color":"#db8555"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#806b63"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"transit.line","elementType":"labels.text.fill","stylers":[{"color":"#8f7d77"}]},{"featureType":"transit.line","elementType":"labels.text.stroke","stylers":[{"color":"#ebe3cd"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#b9d3c2"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#92998d"}]}],
    dark = [{"elementType":"geometry","stylers":[{"color":"#212121"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#212121"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#757575"}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"administrative.land_parcel","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#bdbdbd"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#181818"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"poi.park","elementType":"labels.text.stroke","stylers":[{"color":"#1b1b1b"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#2c2c2c"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#8a8a8a"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#373737"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#3c3c3c"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry","stylers":[{"color":"#4e4e4e"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"transit","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#3d3d3d"}]}],
    night = [{"elementType":"geometry","stylers":[{"color":"#242f3e"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#746855"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#242f3e"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#d59563"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#d59563"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#263c3f"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#6b9a76"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#38414e"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#212a37"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#9ca5b3"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#746855"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#1f2835"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#f3d19c"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#2f3948"}]},{"featureType":"transit.station","elementType":"labels.text.fill","stylers":[{"color":"#d59563"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#17263c"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#515c6d"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"color":"#17263c"}]}],
    aubergine = [{"elementType":"geometry","stylers":[{"color":"#1d2c4d"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#8ec3b9"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#1a3646"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"color":"#4b6878"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#64779e"}]},{"featureType":"administrative.province","elementType":"geometry.stroke","stylers":[{"color":"#4b6878"}]},{"featureType":"landscape.man_made","elementType":"geometry.stroke","stylers":[{"color":"#334e87"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#023e58"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#283d6a"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#6f9ba5"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"color":"#1d2c4d"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#023e58"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#3C7680"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#304a7d"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#98a5be"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#1d2c4d"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#2c6675"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#255763"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#b0d5ce"}]},{"featureType":"road.highway","elementType":"labels.text.stroke","stylers":[{"color":"#023e58"}]},{"featureType":"transit","elementType":"labels.text.fill","stylers":[{"color":"#98a5be"}]},{"featureType":"transit","elementType":"labels.text.stroke","stylers":[{"color":"#1d2c4d"}]},{"featureType":"transit.line","elementType":"geometry.fill","stylers":[{"color":"#283d6a"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#3a4762"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#0e1626"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#4e6d70"}]}];

var mapStyleType = amm_plugin_obj.map_settings.map_style;

switch(style){
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

var mapController = [];
// Global variables for the geocoder and infowindows.
var geocoder = new google.maps.Geocoder;
var infowindow = new google.maps.InfoWindow;
var reInfowindow = new google.maps.InfoWindow( {
  pixelOffset: new google.maps.Size( 0, -40 ),
} );

// On load Ajax listing map.
jQuery( document ).ready( function( $ ) {
  imgSvg();
  ammSearch();
  mapStructure();
  // Calling map function.
  init_map();
  // Calling Image as marker function.
  createImageTags();

  // google.maps.event.addListener( infowindow, 'closeclick', function() {
  //   drawingManager.setDrawingMode( 'marker' );
  // } );

  $( '.color-field' ).wpColorPicker({
    change: function ( event, ui ) {
      var element = event.target;
      var color = hexToRgb( ui.color.toString() );
      selectColor("rgb(" + color.r + "," + color.g + "," + color.b + ")");
    },
  });
});

function hexToRgb( hex ) {
  var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
  return result ? {
      r: parseInt( result[1], 16 ),
      g: parseInt( result[2], 16 ),
      b: parseInt( result[3], 16 )
  } : null;
}

var markerData = amm_plugin_obj.amm_save_option;
if ( markerData.amm_marker_type ) {
  var oldMapType = JSON.parse( markerData.amm_marker_type );
  var oldMapLatlngs = JSON.parse( markerData.amm_marker_positions );
}
// Map controller object.
if ( markerData.amm_map_control ) {
  var mapControl = JSON.parse( markerData.amm_map_control );
}

// Init map.
function init_map() {
  var latlng = {
    lat: ( markerData.amm_map_control ) ? mapControl[0].lat : 38.7520698,
    lng: ( markerData.amm_map_control ) ? mapControl[0].lng : 33.3604434,
  };
  // Init Map with current location.
  map = new google.maps.Map( document.getElementById( 'amm-map' ), {
    center: latlng,
    zoom: ( markerData.amm_map_control ) ? mapControl[0].zoom : parseInt( amm_plugin_obj.map_settings.map_zoom ),
    styles: selectedStyle,
    mapTypeId: mapStyleType,
    fullscreenControl: ( amm_plugin_obj.map_settings.map_full_screen ) ? true : false,
    mapTypeControl: ( amm_plugin_obj.map_settings.map_type_control ) ? true : false,
    streetViewControl: ( amm_plugin_obj.map_settings.map_street_view ) ? true : false,
  } );
  
  if (location.protocol == 'https:') {
    if ( navigator.geolocation ) {
      navigator.geolocation.getCurrentPosition( function( position ) {
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
      }, 
      function () {
        // Gelocation fallback: Defaults to Stockholm, Sweden
        // markerText = "<p>Please accept geolocation for me to be able to find you. <br>I've put you in Stockholm for now.</p>";
        var pos = {
          lat: 59.3325215,
          lng: 18.0643818
        };
      });
    } 
  }else{
      // No geolocation fallback: Defaults to USA
      // markerText = "<p>No location support. Try USA for now. :-)</p>";
      var pos = {
          lat: 39.218129,
          lng: -97.855122
        };
  }
  map.setCenter( pos );
  map.setZoom( 5 );

  // Shape array which helps to add all the shape in this array.
  var markerArray = [];
  if ( oldMapLatlngs ) {
    // Add map drawing tools.
    oldMapLatlngs.forEach( function( latlg, i ) {
      allDrawShape.push( i );
      markerArray.push( oldMapType[0].type[i] );
      drawShapeDetail.push(oldMapLatlngs[i]);
      var multipoint = [];
      // MapType Marker.
      if ( oldMapType[0].type[i] == 'marker' ) {
        var latlngs = { lat: parseFloat( latlg.lat ), lng: parseFloat( latlg.lng ) };
        // Init marker postion.
        var saveShape = new google.maps.Marker( {
          position: latlngs,
          map: map,
          icon: latlg.img[0],
          type: oldMapType[0].type[i], // Custom array to get the shape type.
        } ); 
        // Open Infowindow.
        google.maps.event.addListener( saveShape, 'dblclick', function(e) {
          console.log(this.map);
          reInfowindow = new google.maps.InfoWindow({
            content: '<div><strong>' + latlg.title[0] + '</strong><br /><a href="https://www.google.com/maps/search/?api=1&query=' + parseFloat( latlg.lat ) + ',' + parseFloat( latlg.lng ) + '&query_place_id=' + latlg.place_id + '" target="_blank">Get Direction</a></div>',
          });
          reInfowindow.open( map, saveShape );
        });
      }
      // oldMapType polygon & polyline.
      if ( oldMapType[0].type[i] == 'polygon' || oldMapType[0].type[i] == 'polyline' ) {
        latlg.poly.forEach( function( pos, j ) {
          multipoint.push( pos );
        });
      
        var triangleCoords = multipoint;
        // Construct the polygon.
        var saveShape = new google.maps.Polygon({
          paths: triangleCoords,
          strokeColor: latlg.fillcolor,  
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: latlg.fillcolor,
          fillOpacity: 0.35,
          type: oldMapType[0].type[i], // Custom array to get the shape type.
        });
        saveShape.setMap( map );
      }
      // oldMapType circle.
      if ( oldMapType[0].type[i] == 'circle' ) {
        var saveShape = new google.maps.Circle({
          strokeColor: latlg.fillcolor,
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: latlg.fillcolor,
          fillOpacity: 0.35,
          map: map,
          center: latlg.circle,
          radius: latlg.radius,
          type: oldMapType[0].type[i], // Custom array to get the shape type.
        });
      }
      // oldMapType rectangle.
      if ( oldMapType[0].type[i] == 'rectangle' ) {
        var saveShape = new google.maps.Rectangle({
          strokeColor: latlg.fillcolor,
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: latlg.fillcolor,
          fillOpacity: 0.35,
          map: map,
          bounds: latlg.rectangle,
          type: oldMapType[0].type[i], // Custom array to get the shape type.
        });
        
      }
      // Remove save shape from map.
      google.maps.event.addListener( saveShape, 'click', function(e) {
        if ( oldMapLatlngs[i] ) {
          removeSelectedDrawShape( oldMapLatlngs[i], oldMapType[0].type[i] );
          setDrawingShape( saveShape );
        } 
      });

    });
    // document.getElementById( 'amm_marker_type' ).value = JSON.stringify( oldMapType );
    // document.getElementById( 'amm_marker_positions' ).value = JSON.stringify( oldMapLatlngs );
  }

  // if center changed then update lat and lon document objects
  google.maps.event.addListener( map, 'center_changed', function () {
    var location = map.getCenter();
    mapController = [];
    mapController.push( {lat: location.lat(), lng: location.lng(), zoom: map.zoom} );
    document.getElementById('amm_map_control').value = JSON.stringify( mapController );
  });

  // Created variable for the drawing modes.
  var polyOptions = {
      strokeWeight: 0,
      fillOpacity: 0.6,
      editable: true,
      draggable: true,
      disableDoubleClickZoom: true
  };
  //DrawingManager helps to create shapes/drawingMpdes on Maps.
  drawingManager = new google.maps.drawing.DrawingManager({
    drawingMode: google.maps.drawing.OverlayType.MARKER,
    drawingControl: true,
    drawingControlOptions: {
      position: google.maps.ControlPosition.TOP_CENTER,
      drawingModes: ['marker', 'circle', 'polygon', 'polyline', 'rectangle']
    },
    markerOptions: {
        draggable: true
    },
    polylineOptions: {
        editable: true,
        draggable: true
    },
    rectangleOptions: polyOptions,
    circleOptions: polyOptions,
    polygonOptions: polyOptions,
    map: map
  });

  // This is for storing map date into database.
  // When draw of overlay complete.
  google.maps.event.addListener( drawingManager, 'overlaycomplete', function( event ) {
    var submitMap = document.getElementById('amm-maps-submit');
    if (submitMap.disabled == true) {
      submitMap.disabled = false;
    }
    document.getElementById('amm-maps-submit').disabled = false;
    // Stop zoom when dbclick on map marker or shapes.
    map.setOptions( {disableDoubleClickZoom: true } );
    // Each overlay index.
    var mapIndex = allDrawShape.length;
    // Drawshape for storing data.
    drawShape = event.overlay;
    drawShape.type = event.type;

    // Drawing shape is marker.
    if ( drawShape.type === 'marker' ) {
      // Push marker detail in drawShapeDetail object with blank title.
      drawShapeDetail.push( {lat: drawShape.getPosition().lat(), lng: drawShape.getPosition().lng(), img: [drawShape.icon], title: '', place_id: ''} );
      // When push marker on map infowindow opens with custom label and you can edit it..
      var latlng = {lat: parseFloat(drawShape.getPosition().lat()), lng: parseFloat(drawShape.getPosition().lng())};
      geocoder.geocode( {'location': latlng}, function( results, status ) {
        if ( status === 'OK' ) {
          if ( results[0] ) {
            infowindow.setContent( '<div id="map-popup"><textarea rows="2" cols="30" id="map-info_' + mapIndex + '" placeholder="Add your label here..."></textarea></div>' );
            infowindow.open( map, drawShape );
            drawShapeDetail[mapIndex].place_id = results[1].place_id;
            document.getElementById('amm_marker_positions').value = JSON.stringify( drawShapeDetail );
          } else {
            window.alert( 'No results found where you have clicked' );
          }
        }
      });

      markerArray.push( drawShape.type );
      // Add value to input fields.
      document.getElementById('amm_marker_type').value = JSON.stringify( mapType );

      allDrawShape.push( drawShape );

      // Remove selected option from drawing tools.
      drawingManager.setDrawingMode( null );

      // Popup info window.
      drawShape.addListener( 'dblclick', markerInfoWindow );

      // Update lng and lat when drag the marker from one place to other place.
      google.maps.event.addListener( drawShape, 'dragend', function( markerPos ) {
        var markerIndex = allDrawShape.indexOf( this );
        if ( drawShapeDetail ) {
          var latlng = {lat: parseFloat(markerPos.latLng.lat()), lng: parseFloat(markerPos.latLng.lng())};
          geocoder.geocode( {'location': latlng}, function( results, status ) {
            if ( status === 'OK' ) {
              if ( results[0] ) {
                reInfowindow.setContent( '<div id="map-popup"><textarea rows="2" cols="30" id="map-info_' + markerIndex + '" placeholder="Add your label here..."></textarea></div>' );
                reInfowindow.setPosition( markerPos.latLng );
                reInfowindow.open( map );
                // Update title, lan, and lat.
                drawShapeDetail[markerIndex].lat   = results[0].geometry.location.lat();
                drawShapeDetail[markerIndex].lng   = results[0].geometry.location.lng();
                drawShapeDetail[mapIndex].place_id = results[1].place_id;
                document.getElementById('amm_marker_positions').value = JSON.stringify( drawShapeDetail );
                // Function calling for the input title on popup.
                infoWindowTItle( markerIndex );
              } else {
                window.alert( 'No results found where you have dragend' );
              }
            }
          });
        }
      });
      // Calling function for updating map title.
      infoWindowTItle( mapIndex );
    }

    // Drawing shape is "Circle".
    if ( drawShape.type === 'circle' ) {
      // Push circle detail in drawShapeDetail object with blank title.
      drawShapeDetail.push( {circle: drawShape.getCenter(), radius: drawShape.getRadius(), fillcolor: drawShape.fillColor} );
      // On drawing circle label option.
      infowindow.setPosition( drawShape.getCenter() );

      // Remove selected option from drawing tools.
      drawingManager.setDrawingMode( null );

      markerArray.push( drawShape.type );

      // Added value in hidden fields.
      document.getElementById('amm_marker_type').value = JSON.stringify( mapType );
      document.getElementById('amm_marker_positions').value = JSON.stringify( drawShapeDetail );

      allDrawShape.push( drawShape );

      // On change shape.
      drawShape.addListener('bounds_changed', function() {
        var markerIndex = allDrawShape.indexOf( this );
        drawShapeDetail[markerIndex].circle = this.getCenter();
        drawShapeDetail[markerIndex].radius = this.getRadius();
        document.getElementById('amm_marker_positions').value = JSON.stringify( drawShapeDetail );
      });
    }

    // Drawing shape are "Polyline" & "Polygon".
    if ( drawShape.type === 'polygon' || drawShape.type == 'polyline' ) {
      var polygonLatLng = [];
      if ( drawShape.type === 'polygon' ) {
        var polycolor = drawShape.fillColor;
      }
      else {
        var polycolor = drawShape.strokeColor;
      }

      var polygonLenght = drawShape.getPath().getLength();
      for ( var i = 0; i < polygonLenght; i++ ) {
        polygonLatLng.push( drawShape.getPath().getAt(i) );
      }
      // Push polygon detail in drawShapeDetail object with blank title.
      drawShapeDetail.push( { poly: polygonLatLng, fillcolor: polycolor} );
       // On drawing circle label option.
      infowindow.setPosition( drawShape.getPath().getAt(0) );

      // Remove selected option from drawing tools.
      drawingManager.setDrawingMode( null );

      markerArray.push( drawShape.type );

      document.getElementById('amm_marker_type').value = JSON.stringify( mapType );
      document.getElementById('amm_marker_positions').value = JSON.stringify( drawShapeDetail );

      allDrawShape.push( drawShape );

      // Declare array.
      var polyInsertLatLng = [];
      // Insert new point with lat and lng.
      drawShape.getPath().addListener( 'insert_at', function() {
        var markerIndex = allDrawShape.indexOf( drawShape );

        var polyInsertLenght = this.length;
        for ( var j = 0; j < polyInsertLenght; j++ ) {
          polyInsertLatLng.push( this.getAt(j) );
        }

        drawShapeDetail[markerIndex].poly = polyInsertLatLng;
        document.getElementById('amm_marker_positions').value = JSON.stringify( drawShapeDetail );
      });

      // Declare array.
      var polySetLatLng = []
      // Update exiting poly lat and lng.
      drawShape.getPath().addListener( 'set_at', function() {
        var markerIndex = allDrawShape.indexOf( drawShape );

        var polySetLenght = this.length;
        for ( var k = 0; k < polySetLenght; k++ ) {
          polySetLatLng.push( this.getAt(k) );
        }
        drawShapeDetail[markerIndex].poly = polySetLatLng;
        document.getElementById('amm_marker_positions').value = JSON.stringify( drawShapeDetail );
      });
    }

    // Drawing shape is "Rectangle".
    if ( drawShape.type === 'rectangle' ) {
      // Push rectangle detail in drawShapeDetail object with blank title.
      drawShapeDetail.push( {rectangle: drawShape.getBounds(), fillcolor: drawShape.fillColor} );
      // On drawing circle label option.
      infowindow.setPosition( drawShape.getBounds().getNorthEast() );

      // Remove selected option from drawing tools.
      drawingManager.setDrawingMode( null );

      markerArray.push(drawShape.type);

      document.getElementById('amm_marker_type').value = JSON.stringify( mapType );
      document.getElementById('amm_marker_positions').value = JSON.stringify( drawShapeDetail );

      allDrawShape.push( drawShape );
      // Bounds change for the rectangle.
      drawShape.addListener('bounds_changed', function() {
        var markerIndex = allDrawShape.indexOf( this );
        drawShapeDetail[markerIndex].rectangle = this.getBounds();
        document.getElementById('amm_marker_positions').value = JSON.stringify( drawShapeDetail );

      });
    }

    // Remove selected marker.
    if ( drawShape.type !== google.maps.drawing.OverlayType.MARKER ) {
      // Switch back to non-drawing mode after drawing a shape.
      drawingManager.setDrawingMode( null );

      // Click event for all the shape which we draw.
      google.maps.event.addListener( drawShape, 'click', function(e) {
        // For removing the arrays.
        var index = allDrawShape.indexOf( this );

        if (drawShapeDetail[index]) {
          removeSelectedDrawShape( drawShapeDetail[index], mapType[0].type[index] );
        }
        else {
          removeSelectedDrawShape( drawShape, drawShape.type );
        }
        // After creating map or adding shape. Drawingshape will make setnull.
        if ( event.vertex !== undefined ) {
          if ( drawShape.type === google.maps.drawing.OverlayType.POLYGON ) {
            var path = drawShape.getPaths().getAt( e.path );
            path.removeAt( e.vertex );
            if ( path.length < 3 ) {
              drawShape.setMap( null );
            }
          }
          if ( drawShape.type === google.maps.drawing.OverlayType.POLYLINE ) {
            var path = drawShape.getPath();
            path.removeAt(e.vertex);
            if ( path.length < 2 ) {
              drawShape.setMap( null );
            }
          }
        }
        // Select drawing shape.
        setDrawingShape( this );
      });
      // Select drawing shape.
      setDrawingShape( drawShape );
    } else {
      google.maps.event.addListener( drawShape, 'click', function( e ) {
        // For removing the arrays.
        var index = allDrawShape.indexOf( this );

        if ( drawShapeDetail[index] ) {
          removeSelectedDrawShape( drawShapeDetail[index], mapType[0].type[index] );
        }
        else {
          removeSelectedDrawShape( drawShape, drawShape.type );
        }
        // Select drawing shape.
        setDrawingShape( this );
      });
      // Select drawing shape.
      setDrawingShape( drawShape );
    }

  });
  // Add all the shapes into the map.
  drawingManager.setMap( map );
  // Store all the shapes type in single array.
  mapType.push( {type : markerArray} );
  //Call map initialize.
  init_auto();
}

// Initialize google map.
function init_auto() {
  var inputs = document.getElementById('amm_search_area');
  if ( inputs ) {
    var searchBox = new google.maps.places.SearchBox( inputs );
    map.addListener('bounds_changed', function() {
      searchBox.setBounds( map.getBounds() );
    });
    var markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
      var places = searchBox.getPlaces();
      if ( places.length == 0 ) {
        return;
      }
      // Clear out the old markers.
      markers.forEach( function(marker) {
        marker.setMap( null );
      });

      markers = [];
      //For each place, get the icon, name and location.
      var bounds = new google.maps.LatLngBounds();

      places.forEach( function(place) {
        if ( !place.geometry ) {
          console.log( 'Returned place contains no geometry' );
          return;
        }
        // custom marker.
        var icon = {
          url: place.icon,
          size: new google.maps.Size( 71, 71 ),
          origin: new google.maps.Point( 0, 0 ),
          anchor: new google.maps.Point( 17, 34 ),
          scaledSize: new google.maps.Size( 25, 25 )
        };

        var positions;

        var infowindow = new google.maps.InfoWindow();
        // Create a marker for each place.
        positions = new google.maps.Marker({
          map: map,
          title: place.name,
        });
        // Added positions into the map.
        markers.push( positions );

        if ( place.geometry.viewport ) {
          // Only geocodes have viewport.
          bounds.union( place.geometry.viewport );
        } else {
          bounds.extend( place.geometry.location );
        }
      });
      map.fitBounds( bounds );
    });
  }
  google.maps.event.addListener( drawingManager, 'drawingmode_changed', clearSelection );
  google.maps.event.addDomListener( document.getElementById('delete-shape'), 'click', deleteSelectedShapes );
}

// On input (changes shape info) store value in shape array.
function infoWindowTItle( i ) {
  var mapTitle = [];
  var timer;
  var popupId = 'map-info_' + i;
  setTimeout( function() {
    document.getElementById( popupId ).addEventListener( 'input', function( e ) {
      var thisTitle = this.value;
      clearTimeout( timer );
      timer = setTimeout( function() {
        mapTitle = [];
        mapTitle.push( thisTitle );
        drawShapeDetail[i].title = mapTitle;
        document.getElementById( 'amm_marker_positions' ).value = JSON.stringify( drawShapeDetail );
      }, 500 );
    } );
  }, 800 );
}

// Markee Information Window.
function markerInfoWindow( marker ) {
  var markerIndex = allDrawShape.indexOf( this );
  // Content String on Popup.
  if ( drawShapeDetail[markerIndex].title[0] != '' ) {
    var contentString = '<b>Title: ' + drawShapeDetail[markerIndex].title[0] + '</b>';
    reInfowindow.setContent( contentString );
    reInfowindow.setPosition( marker.latLng );
    // Open Infowindow popup.
    reInfowindow.open( map );
  }
  else {
    reInfowindow.setContent( '<div id="map-popup"><textarea rows="2" cols="30" id="map-info_' + markerIndex + '" placeholder="Add your label here..."></textarea></div>' );
    infoWindowTItle( markerIndex );
    reInfowindow.setPosition( marker.latLng );
    reInfowindow.open( map );
  }
}

// On click Or On drawing shape select.
function setDrawingShape( shape ) {
  var submitMap = document.getElementById('amm-maps-submit');
  if (submitMap.disabled == true) {
    submitMap.disabled = false;
  }
  // Checking drawing shape type.
  if ( shape.type !== 'marker') {
    clearSelection();
    shape.setEditable( true );
    selectColor( shape.get( 'fillColor' ) || shape.get( 'strokeColor' ) );
  }
  // Add marker object in selectedShape variable.
  selectedShape = shape;
}

// Clear selection.
function clearSelection() {
  // When click on map marker/shape.
  if ( selectedShape ) {
    if ( selectedShape.type !== 'marker' ) {
      selectedShape.setEditable( false );
    }
    selectedShape = null;
  }
}

// Assign value to global variables.
function removeSelectedDrawShape( drawShape, shapeType ) {
  // Checking "drawShapeDetail" has drawShape..
  if ( drawShapeDetail ) {
    selectedShapeEle = [];
    selectedShapeEle.push( { shape: drawShape, type: shapeType } );
  }
}

// Delete shape when click on delete button.
function deleteSelectedShapes() {
  // Remove select shapes.
  if ( selectedShape ) {
    selectedShape.setMap( null );
  }
  // Checking selected shape is not null.
  if ( selectedShapeEle != '' ) {
    if ( selectedShapeEle[0].shape ) {
      var shapeKey = drawShapeDetail.indexOf( selectedShapeEle[0].shape );
      drawShapeDetail.splice( shapeKey, 1 );
      allDrawShape.splice( shapeKey, 1 );
      mapType[0].type.splice( shapeKey, 1 );
    }
    selectedShapeEle = [];
  }
  document.getElementById( 'amm_marker_type' ).value = JSON.stringify( mapType );
  document.getElementById( 'amm_marker_positions' ).value = JSON.stringify( drawShapeDetail );
}

// Marker Images.
function selectImages( selectImg ) {
  for ( var i = 0; i < markerImg.length; ++i ) {
    var currImg = markerImg[i];
    imagesBtn[currImg].style.border = currImg == selectImg ? '2px solid #789' : '2px solid #fff';
  }
  var markerOptions = drawingManager.get( 'markerOptions' );
  markerOptions.icon = selectImg;
  drawingManager.set( 'markerOptions', markerOptions );
}

function createImages( imageSrc ) {
  var imgTags = document.createElement( 'img' );
  imgTags.className = 'map-images';
  imgTags.src = imageSrc;
  // Click for selecting google maps icons.
  google.maps.event.addDomListener( imgTags, 'click', function () {
    selectImages( imageSrc );
  });
  return imgTags;
}

function createImageTags() {
  var imagesTags = document.getElementById( 'amm-marker-imgs' );
  for ( var i = 0; i < markerImg.length; ++i ) {
    var currImage = markerImg[i];
    var markerTags = createImages( currImage );
    imagesTags.appendChild( markerTags );
    imagesBtn[currImage] = markerTags;
  }
  selectImages( markerImg[0] );
  document.querySelectorAll( 'img.map-images' ).forEach( function( el ) {
    wrap( el, document.createElement( 'div' ) );
  });
}

function wrap( el, wrapper ) {
  el.parentNode.insertBefore( wrapper, el );
  wrapper.appendChild( el );
}

// Drawing tools shape colors.
function selectColor( color ) {
  selectedColor = color;

  var polylineOptions = drawingManager.get( 'polylineOptions' );
  polylineOptions.strokeColor = color;
  drawingManager.set( 'polylineOptions', polylineOptions );

  var rectangleOptions = drawingManager.get( 'rectangleOptions' );
  rectangleOptions.fillColor = color;
  drawingManager.set( 'rectangleOptions', rectangleOptions );

  var circleOptions = drawingManager.get( 'circleOptions' );
  circleOptions.fillColor = color;
  drawingManager.set( 'circleOptions', circleOptions );

  var polygonOptions = drawingManager.get( 'polygonOptions' );
  polygonOptions.fillColor = color;
  drawingManager.set( 'polygonOptions', polygonOptions );
}

//  SVG icon.
function imgSvg() {
  jQuery( '.imgsvg' ).each( function() {
    var $img = jQuery( this );
    var imgID = $img.attr( 'id' );
    var imgClass = $img.attr( 'class' );
    var imgURL = $img.attr( 'src' );
    jQuery.get( imgURL, function( data ) {
      var $svg = jQuery(data).find( 'svg' );
      if ( typeof imgID !== 'undefined' ) {
        $svg = $svg.attr( 'id', imgID );
      }
      if ( typeof imgClass !== 'undefined' ) {
        $svg = $svg.attr( 'class', imgClass + ' replaced-svg' );
      }
      $svg = $svg.removeAttr( 'xmlns:a' );
      if ( ! $svg.attr( 'viewBox' ) && $svg.attr( 'height' ) && $svg.attr( 'width' ) ) {
        $svg.attr( 'viewBox', '0 0 ' + $svg.attr( 'height' ) + ' ' + $svg.attr( 'width' ) )
      }
      $img.replaceWith( $svg );
    }, 'xml' );
  } );
}

// Search show and hide.
function ammSearch() {
  jQuery( '.amm-search-action a' ).click( function() {
    jQuery( '.amm-map-search-bar' ).fadeIn();
  } );
  jQuery( '.search-close' ).click( function() {
    jQuery( '.amm-map-search-bar' ).fadeOut();
    jQuery( '#amm_search_area' ).val('');
  } );
  jQuery( '.sidebar-action, .amm-sidebar-close' ).click( function() {
    jQuery( '.amm-map-header' ).toggleClass( 'full' );
    jQuery( '.amm-map-content' ).toggleClass( 'full' );
    jQuery( '.amm-map-sidebar' ).toggleClass( 'off' );
  } );
}

// Map structure when responsiveness.
function mapStructure(){
  var ww = jQuery( window ).width();
  if ( ww < 1500 ) {
    jQuery( '.amm-map-header' ).addClass( 'full' );
    jQuery( '.amm-map-content' ).addClass( 'full' );
    jQuery( '.amm-map-sidebar' ).addClass( 'off' );
  } else {
    jQuery( '.amm-map-header' ).removeClass( 'full' );
    jQuery( '.amm-map-content' ).removeClass( 'full' );
    jQuery( '.amm-map-sidebar' ).removeClass( 'off' );
  }
}

// Submit map WordPress Ajax.
jQuery( document ).on( 'click', '.amm-maps-submit', function( e ) {
  e.preventDefault();
  var formData = {
    action: 'addmultiplemarker_save_maps_data',
    form : jQuery( 'form.amm-get-location' ).serialize()
  }
  jQuery.post( amm_plugin_obj.ajax_url, formData,
    function ( response ) {
    var ajax_result = jQuery.parseJSON( response );
    jQuery( 'span.amm-maps-message' ).html( ajax_result.message );
    setTimeout( function() {
      jQuery( 'span.amm-maps-message' ).html( '' );
    }, 3000);
  });
});

// Reset map WordPress Ajax.
jQuery( document ).on( 'click', '#map-resets', function( e ) {
  var confirmReset = confirm('Are you sure you want to reset the map?');
  if ( confirmReset ){
    var formData = {
      action: 'addmultiplemarker_reset_map'
    }
    jQuery.post( amm_plugin_obj.ajax_url, formData,
    function ( response ) {
      if (response){
        window.location = window.location.href;
      }
    });
  }
});

jQuery( window ).on( 'load resize', function() {
  mapStructure();
});