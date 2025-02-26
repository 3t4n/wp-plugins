( function( $ ) {
	$( function() {
		$( 'h4' ).each( function() {
			var $parent = $( this ).parent().parent().parent();

			if( $parent.attr( 'id' ) !== undefined && $parent.attr( 'id' ) !== false && $parent.attr( 'id' ).indexOf( 'signals_' ) > 0 ) {
				$( this ).parents( '.widget-top' ).addClass( 'signals-widget-top' );
			} // end if
		} );

		$( document ).on( 'click', '#signals-personal-widget-btn', function( e ) {
			e.preventDefault();
			var custom_uploader;

			// If the uploader object has already been created, reopen the dialog
			if( custom_uploader ) {
			    custom_uploader.open();
			    return;
			}

			// Extend the wp.media object
			custom_uploader = wp.media.frames.file_frame = wp.media( {
			    title: 'Choose Personal Image',
			    button: {
			        text: 'Choose Personal Image'
			    },
			    multiple: false
			} );

			// When a file is selected, grab the URL and set it as the text field's value
			custom_uploader.on( 'select', function() {
			    attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
			    $( '.signals-personal-image-url' ).val( attachment.url );
			    $( '.signals-personal-upload-element span.signals-preview-area' ).html( '<center><img src="' + attachment.url + '" /></center>' );
			    $( '.signals-personal-upload-append' ).html( '<a href="#" id="signals-personal-remove-image">Remove</a>' );
			} );

			// Open the uploader dialog
			custom_uploader.open();
		} );

		// For the ads widget
		// Removing photo from the canvas and emptying the text field
		$( document ).on( 'click', '#signals-personal-remove-image', function( e ) {
			e.preventDefault();

			$( '.signals-personal-image-url' ).val( '' );
			$( '.signals-personal-upload-element span.signals-preview-area' ).html( 'Image preview will show over here.' );
			$( this ).hide();
		} );

		$( document ).on( 'click', '#signals-ads-widget-btn', function( e ) {
			e.preventDefault();
			var custom_uploader;

			// If the uploader object has already been created, reopen the dialog
			if( custom_uploader ) {
			    custom_uploader.open();
			    return;
			}

			// Extend the wp.media object
			custom_uploader = wp.media.frames.file_frame = wp.media( {
			    title: 'Choose AD Image',
			    button: {
			        text: 'Choose AD Image'
			    },
			    multiple: true
			} );

			// When a file is selected, grab the URL and set it as the text field's value
			custom_uploader.on( 'select', function() {
				attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
				$( '.signals-ads-image-url' ).val( attachment.url );
				$( '.signals-ads-upload-element span.signals-preview-area' ).html( '<center><img src="' + attachment.url + '" /></center>' );
				$( '.signals-ads-upload-append' ).html( '<a href="#" id="signals-ads-remove-image">Remove</a>' );
			} );

			// Open the uploader dialog
			custom_uploader.open();
		} );

		// Removing photo from the canvas and emptying the text field
		$( document ).on( 'click', '#signals-ads-remove-image', function( e ) {
			e.preventDefault();

			$( '.signals-ads-image-url' ).val( '' );
			$( '.signals-ads-upload-element span.signals-preview-area' ).html( 'AD preview will show over here.' );
			$( this ).hide();
		} );
	} );
})( jQuery );