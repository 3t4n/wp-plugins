jQuery( document ).ready( function( $ ){

	// each wrapper image
	eachWrappersImage( $ );

	// each wrapper link
	eachWrappersLink( $ );

	// if user download more messages
	$( '#activity-stream' ).bind( 'DOMSubtreeModified', function( e ) {

		if ( e.target.id === 'activity-stream' ) {

		  	setTimeout( function(){

				// each wrapper image
				eachWrappersImage( $ );

				// each wrapper link
				eachWrappersLink( $ );

		  	},200 );

		}

	} );

} );

/*
* functions
*/
// each wrappers image
function eachWrappersImage( $ ){

	$( '.bpfb_images' ).each( function(){

		// declared var
		var bpfb_images_wrap = $( this );		

		// checked items
		var bpfb_is_checked = bpfb_images_wrap.attr( 'data-checked' );

		if( bpfb_is_checked !== 'checked'  ){

			// remove <br> tags
			bpfb_images_wrap.find( 'br' ).remove();

			// find links
			var bpfb_length_images = bpfb_images_wrap.find( 'a' ).length;
			
			// loop
			var bpfb_countImage = 1;

			bpfb_images_wrap.find( 'a' ).each( function(){

				var full_image_url = $( this ).attr( 'href' );

				$( this ).find( 'img' ).attr( 'src', full_image_url );

				// add class to link

				$( this ).addClass( 'bpfb_image_wrap-' + bpfb_countImage );

				bpfb_countImage++;

			} );

			// set count images class
			bpfb_images_wrap.addClass( 'mx_count_images-' + bpfb_length_images );

			// is checked
			bpfb_images_wrap.attr( 'data-checked', 'checked' );

		}
		
	} );

}

// each wrappers link
function eachWrappersLink( $ ){

	$( '.bpfb_final_link' ).each( function(){

		var bpfb_length_thunb = $( this ).find( '.bpfb_link_preview_container' ).length;

		if( bpfb_length_thunb === 0 ){

			$( this ).find( '.bpfb_link_contents' ).css( 'width', '100%' );

		}

	} );

}