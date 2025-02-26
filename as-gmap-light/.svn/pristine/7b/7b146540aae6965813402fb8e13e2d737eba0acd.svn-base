(function() {

    tinymce.PluginManager.add('AS_google_map_tc_button', function( editor, url ) {
        editor.addButton( 'AS_google_map_tc_button', {
            icon: 'AS_gmap_tc_button',
            onclick: function() {
                editor.windowManager.open( {
			        title: 'AS Map Shortcode Attribute',
			        body: [{
			            type: 'container',
			            html: '<p>We added some default value to the field. <br>PleASe fill the form below with your own value.'
			        },
			        {
			            type: 'textbox',
			            name: 'mapWidth',
			            value: '300',
			            label: 'Map Width'
			        },
			        {
			            type: 'textbox',
			            name: 'mapHeight',
			            value: '300',
			            label: 'Map Height'
			        },
			        {
			            type: 'textbox',
			            name: 'mapZoom',
			            value: '15',
			            label: 'Map Zoom'
			        },
			        {
			            type: 'textbox',
			            name: 'mapLatitude',
			            value: '23.900642',
			            label: 'Map Latitude'
			        },
			        {
			            type: 'textbox',
			            name: 'mapLongitude',
			            label: 'Map Longitude',
			            value: '89.130103'
			        },
			        {
			            type: 'container',
			            html: '<p>To find your Latitude and Longitude go <a target="_blank" href="http://www.latlong.net/" style="color:#1E8CBE">here</a></p>'
			        }],
			        onsubmit: function( e ) {
			            editor.insertContent( '[AS_gmap width='+ e.data.mapWidth +' height='+ e.data.mapHeight +' zoom='+ e.data.mapZoom +' latitude='+ e.data.mapLatitude +' longitude='+ e.data.mapLongitude +']');
			        }
			    });
			    
            }
        });
    });
})();