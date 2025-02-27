(function($){

	// Call function for the button functionality
	TerraThemesToolsInitImageVideoSwitcher();
	TerraThemesToolsMediaUploader();
	TerraThemesToolsRemoveBtn();

	function TerraThemesToolsInitImageVideoSwitcher() {
		if ( $( '.tt-image-video-switcher' ).length ) {
			$( '.tt-hide-initial' ).closest( '.postbox' ).hide();
			$( $( '.switch .cb-selected' ).data( 'hide' ) ).hide();
			$( $( '.switch .cb-selected' ).data( 'show' ) ).show();

			$( '.switch label' ).on( 'click', function() {
				$( this ).addClass( 'cb-selected' );
				$( this ).siblings().removeClass( 'cb-selected' );
			
				$( $( this ).data( 'hide' ) ).fadeOut();
				$( $( this ).data( 'show' ) ).fadeIn();

			});

			$( '.switch .cb-enable' ).on( 'click', function() {
				var parent = $( this ).parents( '.switch' );
				$( '.terra_themes_tools_slide_is_video', parent ).attr( 'checked', true );
				$( '.terra_themes_tools_slide_type' ).val( 'video' );
			});

			$( '.switch .cb-disable' ).on( 'click', function() {
				var parent = $( this ).parents( '.switch' );
				$( '.terra_themes_tools_slide_is_video', parent ).removeAttr( 'checked' );
				$( '.terra_themes_tools_slide_type' ).val( 'image' );
			});
		}
	}

	function TerraThemesToolsMediaUploader() {
		// Init vars
		var attachment;
		var fileFrame;
		var closestRemoveBtn;
		var closestImageHolder;
		var closestUploadUrl;

		// When the upload button is clicked
		$( 'body' ).on( 'click', '.tt-media-upload-btn', function( event ) {

			// Get fields close to the button that is actually clicked
			closestRemoveBtn 	= $( this ).siblings( '.tt-media-remove-btn' );
			closestImageHolder 	= $( this ).siblings( '.tt-media-image-holder' );
			closestUploadUrl 	= $( this ).siblings( '.tt-media-meta-fields' ).find( '.tt-media-upload-url' );

			// Prevent link click functionality
			event.preventDefault();

			// If the media frame already exists, reopen it.
			if ( fileFrame ) {
				fileFrame.open();
				return;
			}

			// Create the media frame
			fileFrame = wp.media.frames.fileFrame = wp.media({
				title: "Choose An Image",
				button: {
					text: "Select"
				},
				library: {
					type: 'image'
				},
				multiple: false
			});

			// When an image is selected, run a callback
			fileFrame.on( 'select', function() {

				attachment = fileFrame.state().get( 'selection' ).first().toJSON();

				// If the selected attachment has a url
				if ( attachment.hasOwnProperty( 'url' ) ) {

					// Write URL into the hidden field
					closestUploadUrl.val( attachment.url );

					// Trigger event that WordPress recognizes the change to the hidden URL field and user is able to save the widget
					closestUploadUrl.trigger( 'change' );

					if ( attachment.hasOwnProperty( 'sizes' ) && attachment.sizes.thumbnail ) {
						closestImageHolder.find( 'img' ).attr( 'src', attachment.sizes.thumbnail.url ); // Update the image holder with thumb url
					} else {
						closestImageHolder.find( 'img' ).attr( 'src', attachment.url ); // Update the image holder with url
					}

					// Show the holder image, show the remove button
					closestImageHolder.show();
					closestRemoveBtn.show();
				}

			});

			// Open media frame
			fileFrame.open();
			return;
		});

	}

	function TerraThemesToolsRemoveBtn() {
		// Init vars
		var clickedButton;
		var closestImageHolder;
		var closestUploadUrl;

		// When the remove button is clicked
		$( 'body' ).on( 'click', '.tt-media-remove-btn', function( event ) {

			// Set vars
			clickedButton = $( this );
			closestImageHolder = clickedButton.siblings( '.tt-media-image-holder' );
			closestUploadUrl = clickedButton.siblings( '.tt-media-meta-fields' ).find( '.tt-media-upload-url' );

			// Prevent link click functionality
			event.preventDefault();

			// Trigger event that WordPress recognizes the change to the hidden URL field and user is able to save the widget
			$( closestUploadUrl ).trigger( 'change' );
			
			// Remove image src and hide it's holder
			closestImageHolder.hide();
			closestImageHolder.find( 'img' ).attr( 'src', '' );

			// Hide butten
			clickedButton.hide();

			// Reset meta fields
			closestUploadUrl.val('');
		});
	}

})(jQuery);