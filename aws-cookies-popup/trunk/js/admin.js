/**
 * AWS Cookie Popup JavaScripts
 * 
 * @version 1.0.0
 * @since 1.0.0
 */
//pluginPath = <?php wp_localize_script('some_handle', 'object_name', array( 'plugin_url' => plugins_url() )); ?>;
jQuery.getScript("https://cdn.ckeditor.com/4.5.9/standard/ckeditor.js", function() {
	CKEDITOR.replace( 'data[message]', {
			// Define the toolbar groups as it is a more accessible solution.
			toolbarGroups: [
				{"name":"basicstyles","groups":["basicstyles"]},
				{"name":"paragraph","groups":["list","blocks"]},
			],
			// Remove the redundant buttons from toolbar groups defined above.
			removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,NumberedList,BulletedList,Blockquote',

			//Remove status bar.
				removePlugins: 'elementspath',
		});
});

//cookie functionality
jQuery(function() {
 jQuery('#staticParent').on('keydown', '#expireTime', function(e){-1!==jQuery.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault();
  	}); 
});

//Color picker functionality
jQuery(function() {
	jQuery( '.fa-plugin-setting' ).tabs();
    // Add Color Picker to all inputs that have 'aws-color-field' class
    jQuery('.aws-color-field').wpColorPicker();
     
});

//Change plugin sidebar name color
jQuery('.plugin-name-sidebar').css('color', '#1450AB');
	
