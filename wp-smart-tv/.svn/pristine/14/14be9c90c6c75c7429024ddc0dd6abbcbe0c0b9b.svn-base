(function() {
	if (typeof(tinyMCE) != "undefined") {
	tinymce.PluginManager.add( 'custom_link_class', function( editor, url ) {
		
		// Add Button to Visual Editor Toolbar
		editor.addButton('custom_link_class', {
			title: 'Insert Video',
			cmd: 'insert_video',
			image: url + '/img/tv-icon.png',
		});	
		// TO_DO: Create a WP_Ajax call for handling retrieving posts and encoding them to JSON.
		// TO_DO: JS Function to build form with checkboxes beside titles
		// Add Command when Button Clicked
		editor.addCommand('insert_video', function() {
			var posttileBox = null;
			editor.windowManager.open({
			  title: 'Insert TV Player',
			  body: [{
					type   : 'combobox',
					name   : 'vidid',
					label  : 'Select Video or enter ID',
					values : get_postList(),
					onPostRender: function( ){
						posttileBox = this;
					}
				}],
			  width: jQuery( window ).width() * 0.3,
			  height: (jQuery( window ).height() - 36 - 50) * 0.7,
			  onsubmit: function( e ) {
				editor.insertContent( '[tv-video-player id="' + posttileBox.value() + '" /]' );
			   }
			});
        });
			
	});
	function get_postList() {
	
	
	var posts = jQuery.ajax({
		url: wpstvdata.ajax_url,
		type: 'post',
		data: {
			action: 'rovidx_wpstv_get_video_list',
		},
		async: false,
		cache: false
	});
	
	var result = posts.responseText;
		
	return JSON.parse(result);
}
		
	}
})();
	
