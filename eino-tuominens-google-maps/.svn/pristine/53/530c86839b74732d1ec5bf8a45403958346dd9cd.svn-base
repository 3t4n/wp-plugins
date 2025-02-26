var $ = jQuery;

function etgm_uniqid() {
    var ts=String(new Date().getTime()), i = 0, out = '';
    for(i=0;i<ts.length;i+=2) {        
       out+=Number(ts.substr(i, 2)).toString(36);    
    }
    return ('d'+out);
}

var etgm_LOCALIZATION = {
  button_add_new_map                      : 'Add a new map',
  title_new_map                           : 'A new map',
  shape_click_action_text                 : 'A shape description',
  marker_click_action_text                : 'A marker description',
  map_name                                : 'Map name',
  short_code                              : 'Short code'
};

var etgm_maps = [];

var $etgm_map_software_container;
var $etgm_input_field_for_json;

google.maps.event.addDomListener(window, 'load', etgm_admin_initialize);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Create a simple GUI for adding and editing maps

$( document ).ready ( function () {

  $etgm_map_software_container = $( '#etgm-map-software-container' );
  
  $etgm_input_field_for_json = $( 'textarea[rel=map_json]' );
  //console.log ($etgm_input_field_for_json);

  var $add_new_map_button = $( '<button id="etgm-add-new-map-button">' + etgm_LOCALIZATION.button_add_new_map + '</button>' )
    .click ( function () { etgm_add_new_map ( {} ) } );


  $etgm_map_software_container.append ( $add_new_map_button );

  etgm_resolve_saved_maps ();

} );

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function etgm_resolve_saved_maps() {

  if ( !$etgm_input_field_for_json.val() )
    return;

  var saved_data = JSON.parse ( $etgm_input_field_for_json.val() );
  

  for ( var i = 0; i < saved_data.length; i++ ) {
    etgm_add_new_map( {
    
      uniqid : saved_data[i].map_uniqid,
      map_settings : saved_data[i].map_settings,
      map_name : ( saved_data[i].map_name ? saved_data[i].map_name : '' ),
      shapes : saved_data[i].shapes

    });

  }

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function etgm_map_data_to_json_string () {
  $etgm_input_field_for_json.val ( JSON.stringify( etgm_maps ) );
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function etgm_get_maps_entry_index ( uniqid ) {
  for ( var i = 0; i < etgm_maps.length; i++ ) {
    if ( etgm_maps[i].map_uniqid == uniqid )
      return i;
  }
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function etgm_get_shape_entry_index ( map_uniqid, shape_uniqid ) {

  var shapes = etgm_maps[ etgm_get_maps_entry_index( map_uniqid ) ].shapes;


  for ( var i = 0; i < shapes.length; i++ ) {
    if ( shapes[i].shape_uniqid == shape_uniqid )
      return i;
  }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function etgm_add_new_map ( options ) {

  var uniqid;

  if ( options.uniqid )
    uniqid = options.uniqid;
  else
    uniqid = etgm_uniqid();

  var shapes = [];
  if ( options.shapes ){
    shapes = options.shapes;
  }

  var map_name = '';
  if ( options.map_name ) {
    map_name = options.map_name;
  }

  var map_settings = { center : { lat : 0, lng : 0 }, zoom : 8 };
  if ( options.map_settings ) {
    map_settings = options.map_settings;
  }

  var $new_map_controls_container = $( '<div class="etgm-map-collapse-area" id="etgm-map-controls-container-' + uniqid + '">' );

  var $new_map_controle_title = $( '<h4 class="etgm-map-title">' + ( options.map_name ? options.map_name : etgm_LOCALIZATION.title_new_map ) + '</h4>' );

  $new_map_controle_title.click ( function () {
    if ( $new_map_controls_container.css('position') == 'absolute' )
      $new_map_controls_container.css('position', 'static');
    else
      $new_map_controls_container.css('position', 'absolute');
  });

  var $new_map_map_canvas = $( '<div id="map-canvas-' + uniqid + '">').css ( { width: '700px', height : '500px' } );

  var $map_name_control = $( '<div class="etgm-map-name-control"><label>' + etgm_LOCALIZATION.map_name + ': </label></div>' );
  var $map_name_control_input = $( '<input type="text" data-map_id="'+ uniqid +'" value="' + ( options.map_name ? options.map_name : etgm_LOCALIZATION.title_new_map ) + '">' );

  $map_name_control_input.change ( function () {

    var index = etgm_get_maps_entry_index ( $( this ).data( 'map_id' ) );
    etgm_maps[index].map_name = $( this ).val();
    etgm_map_data_to_json_string();

  });

  var $map_shortcode_control = $( '<div class="etgm-map-name-control"><label>' + etgm_LOCALIZATION.short_code + ': </label></div>' );
  var $map_shortcode_control_input = $( '<input type="text">' );
  $map_shortcode_control_input.val ( '[etgm map_id="' + uniqid + '"]' );
  $map_shortcode_control.append ( $map_shortcode_control_input );
  //

  var $new_map_input_area = $( '<div class="etgm-map-input-area-container" id="etgm-input-area-' + uniqid + '">' );


  $etgm_map_software_container.append ( $new_map_controle_title );
  $new_map_controls_container.append ( $new_map_map_canvas );

  $map_name_control.append ( $map_name_control_input );


  $new_map_controls_container.append ( $map_name_control );
  $new_map_controls_container.append ( $map_shortcode_control );

  $new_map_controls_container.append ( $new_map_input_area );

  $etgm_map_software_container.append ( $new_map_controls_container );


  etgm_maps.push (
      {
        map_uniqid : uniqid,
        map_settings: map_settings,
        map_name : map_name,
        shapes : shapes


      }
    );


  etgm_admin_initialize( 'map-canvas-' + uniqid, uniqid );

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function etgm_add_shape_input_box ( map_uniqid, shape_uniqid ) {

  var map_index = etgm_get_maps_entry_index( map_uniqid );
  var shape_index = etgm_get_shape_entry_index ( map_uniqid, shape_uniqid );

  var $input_area = $( '#etgm-input-area-' + map_uniqid );

  var $new_input_row_container = $( '<div class="etgm-input-row-container">' );
  var $new_shape_input_label = $( '<label>' + etgm_LOCALIZATION.shape_click_action_text + '</label>' );
  var $new_shape_description = $( '<textarea></textarea>' ).change ( function () {
    
    etgm_maps[ map_index ].shapes[ shape_index ].shape_description = $( this ).val();
    etgm_map_data_to_json_string();

  } );

  if ( etgm_maps[ map_index ].shapes[ shape_index ].shape_description )
    $new_shape_description.val ( etgm_maps[ map_index ].shapes[ shape_index ].shape_description );

  $new_input_row_container.append ( $new_shape_input_label );
  $new_input_row_container.append ( $new_shape_description );
  $new_input_row_container.append ( '<div style="clear: both;"></div>' );

  $input_area.append ( $new_input_row_container );

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function etgm_get_shape_event_handlers ( overlay, map_uniqid, shape_uniqid, index_to_entry ) {

  var vertices = overlay.getPath();
  var vertices_arr = [];

  // Iterate over the vertices.
  for (var i =0; i < vertices.getLength(); i++) {
    var xy = vertices.getAt(i);
    vertices_arr.push ( { lat : xy.lat(), lng :  xy.lng() } );
  }

  var index_to_shape = etgm_get_shape_entry_index ( map_uniqid, shape_uniqid );

  etgm_maps[index_to_entry].shapes[index_to_shape].vertices = vertices_arr;

  etgm_map_data_to_json_string();

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function etgm_get_event_handler_function ( existing_shape_obj, map_uniqid, shape_uniqid, index_to_entry ) {
  return function ( event ) { 
    etgm_get_shape_event_handlers ( existing_shape_obj, map_uniqid, shape_uniqid, index_to_entry );
  };
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function etgm_admin_initialize( map_canvas_id, map_uniqid ) {
  
  var index_to_entry = etgm_get_maps_entry_index( map_uniqid );

  if ( typeof index_to_entry === 'undefined' )
    return;

  console.log ('#' + index_to_entry);

  console.log (etgm_maps[ index_to_entry ]);

  var mapOptions = {
    center: new google.maps.LatLng ( etgm_maps[ index_to_entry ].map_settings.center.lat, etgm_maps[ index_to_entry ].map_settings.center.lng ),
    zoom: etgm_maps[ index_to_entry ].map_settings.zoom
  };

  var map = new google.maps.Map(document.getElementById(map_canvas_id), mapOptions);


  google.maps.event.addListener(map, 'dragend', function() {

    var center = map.getCenter();

    if ( !etgm_maps[ index_to_entry ].map_settings )
       etgm_maps[ index_to_entry ].map_settings = {} ;

    etgm_maps[ index_to_entry ].map_settings.center = { lat : center.lat(), lng : center.lng() };

    etgm_map_data_to_json_string();

  } );

  google.maps.event.addListener(map, 'zoom_changed', function() {

    var zoom = map.getZoom();

    if ( !etgm_maps[ index_to_entry ].map_settings )
       etgm_maps[ index_to_entry ].map_settings = {} ;

    etgm_maps[ index_to_entry ].map_settings.zoom = zoom;

    etgm_map_data_to_json_string();

  } );

  

  var existing_shapes = etgm_maps[ index_to_entry ].shapes;

  for ( var i = 0; i < existing_shapes.length; i++ ) {
    switch ( existing_shapes[i].shape_type ) {
      case 'polygon':
        var ext_vertices = existing_shapes[i].vertices;
        var coords = []; 

        for ( var a = 0; a < ext_vertices.length; a++ ) {
          coords.push ( new google.maps.LatLng( ext_vertices[a].lat, ext_vertices[a].lng ) );
        }

        var existing_shape_obj = new google.maps.Polygon({
          paths: coords,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.35,
          editable: true
        });

        existing_shape_obj.setMap(map);

        google.maps.event.addListener(existing_shape_obj.getPath(), 'insert_at', etgm_get_event_handler_function ( existing_shape_obj, map_uniqid, existing_shapes[i].shape_uniqid, index_to_entry )  );
        google.maps.event.addListener(existing_shape_obj.getPath(), 'set_at',  etgm_get_event_handler_function ( existing_shape_obj, map_uniqid, existing_shapes[i].shape_uniqid, index_to_entry ) );
      break;

      case 'marker':
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng ( existing_shapes[i].location.lat, existing_shapes[i].location.lng ),
            map: map,
            title: existing_shapes[i].shape_description,
            draggable : true
        });

        var get_drag_handler = function ( overlay, index_to_entry, map_uniqid, shape_uniqid ) {
          return google.maps.event.addListener(overlay, 'dragend', function() {

            var pos = overlay.getPosition();
            


            etgm_maps[index_to_entry].shapes[ etgm_get_shape_entry_index( map_uniqid, shape_uniqid ) ].location = { lat : pos.lat(), lng : pos.lng() };
            
            etgm_map_data_to_json_string();

          } );
        }

        get_drag_handler( marker, index_to_entry, map_uniqid, existing_shapes[i].shape_uniqid );
        break;
    }

    etgm_add_shape_input_box ( map_uniqid, existing_shapes[i].shape_uniqid )

  }

  var drawingManager = new google.maps.drawing.DrawingManager();
  drawingManager.setMap(map);

  drawingManager.setOptions (
    { 
      polygonOptions : { editable : true },
      circleOptions : { editable : true },
      polylineOptions : { editable : true },
      rectangleOptions : { editable : true },
      markerOptions : { editable : true },
      drawingControlOptions : {
        drawingModes: [
          google.maps.drawing.OverlayType.MARKER,
        /*  google.maps.drawing.OverlayType.CIRCLE, */
          google.maps.drawing.OverlayType.POLYGON /*,
          google.maps.drawing.OverlayType.POLYLINE,
          google.maps.drawing.OverlayType.RECTANGLE */
        ]
      }
    }
  );

  google.maps.event.addListener(drawingManager, 'overlaycomplete', function(event) {
    
    var shape_uniqid = 'shape_' + etgm_uniqid();


    var overlay = event.overlay;
    var overlay_map = overlay.getMap();

    if ( event.type == google.maps.drawing.OverlayType.POLYGON ) {

        var vertices = overlay.getPath();
        var vertices_arr = [];

        // Iterate over the vertices.
        for (var i =0; i < vertices.getLength(); i++) {
          var xy = vertices.getAt(i);
          vertices_arr.push ( { lat : xy.lat(), lng :  xy.lng() } );
        }
      
        etgm_maps[index_to_entry].shapes.push ( {
            shape_type : 'polygon',
            shape_uniqid : shape_uniqid,
            vertices : vertices_arr,
            shape_description : ''
        } );


        var handle_editing = function ( event ) {
        
          etgm_get_shape_event_handlers ( overlay, map_uniqid, shape_uniqid, index_to_entry );
         
        };

        google.maps.event.addListener(event.overlay.getPath(), 'insert_at', handle_editing );
        google.maps.event.addListener(event.overlay.getPath(), 'set_at',  handle_editing );
    }

    if ( event.type == google.maps.drawing.OverlayType.MARKER ) {
      var pos = overlay.getPosition();

      overlay.setDraggable( true );

      var get_drag_handler = function ( overlay, index_to_entry, map_uniqid, shape_uniqid ) {
        return google.maps.event.addListener(overlay, 'dragend', function() {

          var pos = overlay.getPosition();
          


          etgm_maps[index_to_entry].shapes[ etgm_get_shape_entry_index( map_uniqid, shape_uniqid ) ].location = { lat : pos.lat(), lng : pos.lng() };
          
          etgm_map_data_to_json_string();

        } );
      }

      get_drag_handler( overlay, index_to_entry, map_uniqid, shape_uniqid );


      etgm_maps[index_to_entry].shapes.push ( {
          shape_type : 'marker',
          shape_uniqid : shape_uniqid,
          location : {
            lat : pos.lat(),
            lng : pos.lng()
          },
          shape_description : ''
      } );
   
    }


    etgm_add_shape_input_box ( map_uniqid, shape_uniqid );
    etgm_map_data_to_json_string();


  });



}

