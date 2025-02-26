function etgm_init_public_map( map_id ) {
  google.maps.event.addDomListener(window, 'load', etgm_public_initialize);
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function etgm_resolve_public_saved_map() {

  var saved_data = map_json;

  return {
    
      uniqid : saved_data.map_uniqid,
      map_settings : saved_data.map_settings,
      shapes : saved_data.shapes

  };

}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function etgm_public_initialize( ) {

  var etgm_map = etgm_resolve_public_saved_map();

  var map_uniqid = etgm_map.uniqid;
  var map_canvas_id = 'map-canvas-' + map_uniqid 
  
 // console.log ( etgm_map );

  var mapOptions = {
    center: new google.maps.LatLng ( etgm_map.map_settings.center.lat, etgm_map.map_settings.center.lng ),
    zoom: etgm_map.map_settings.zoom
  };


  var map = new google.maps.Map(document.getElementById(map_canvas_id), mapOptions);
 
  var existing_shapes = etgm_map.shapes;

  for ( var i = 0; i < existing_shapes.length; i++ ) {
    var existing_shape_obj;
    switch ( existing_shapes[i].shape_type ) {
      case 'polygon':
        var ext_vertices = existing_shapes[i].vertices;
        var coords = []; 

        for ( var a = 0; a < ext_vertices.length; a++ ) {
          coords.push ( new google.maps.LatLng( ext_vertices[a].lat, ext_vertices[a].lng ) );
        }

        existing_shape_obj = new google.maps.Polygon({
          paths: coords,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.35
        });
      break;

      case 'marker':
            existing_shape_obj = new google.maps.Marker({
            position: new google.maps.LatLng ( existing_shapes[i].location.lat, existing_shapes[i].location.lng ),
            map: map,
            title: existing_shapes[i].shape_description
        });
      break;
    }

    var add_shape_click = function ( shape, shape_unique_id, description ) {

      google.maps.event.addListener(shape, 'click', function (event) {

        var $ = jQuery;
        $( '#map-shape-description-' + map_uniqid ).empty();
        $( '#map-shape-description-' + map_uniqid ).append ( description );

      });

    }

    add_shape_click( existing_shape_obj, existing_shapes[i].shape_uniqid, existing_shapes[i].shape_description );

    existing_shape_obj.setMap(map);

      
  }

}

