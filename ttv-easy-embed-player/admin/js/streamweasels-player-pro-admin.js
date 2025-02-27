(function( $ ) {
	'use strict';

	jQuery(document).ready(function(a) {

		if (jQuery('body').hasClass('twitch-integration_page_streamweasels-player')) {

			var clipboard = new ClipboardJS('#sw-copy-shortcode');

			clipboard.on('success', function (e) {
				jQuery(e.trigger).addClass('tooltipped');
				jQuery(e.trigger).on('mouseleave', function() {
					jQuery(e.trigger).removeClass('tooltipped');
				})
			  });

			jQuery('#sw-welcome-bg-colour').wpColorPicker();
			jQuery('#sw-welcome-text-colour').wpColorPicker();

			$('.upload-btn').click(function(e) {
				e.preventDefault();
				var btn = $(this);
				var image = wp.media({ 
					title: 'Upload Image',
					// mutiple: true if you want to upload multiple files at once
					multiple: false
				}).open()
				.on('select', function(e){
					// This will return the selected image from the Media Uploader, the result is an object
					var uploaded_image = image.state().get('selection').first();
					// We convert uploaded_image to a JSON object to make accessing it easier
					// Output to the console uploaded_image
					console.log(uploaded_image);
					var image_url = uploaded_image.toJSON().url;
					// Let's assign the url value to the input field 
					btn.prev().val(image_url);
				});
			});			
			  
		}

	})


})( jQuery );