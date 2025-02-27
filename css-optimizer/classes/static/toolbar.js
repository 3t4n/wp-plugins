jQuery( document ).ready(function()
{

	var percentage = jQuery( '#wp-admin-bar-bpminifycss-cache-info .bpminifycss-radial-bar' ).attr('percentage');
	var rotate = percentage * 3.0;

	jQuery( '#wp-admin-bar-bpminifycss-cache-info .bpminifycss-radial-bar .mask.full, #wp-admin-bar-bpminifycss-cache-info .bpminifycss-radial-bar .fill' ).css({
		'-webkit-transform'	: 'rotate(' + rotate + 'deg)',
		'-ms-transform'		: 'rotate(' + rotate + 'deg)',
		'transform'		: 'rotate(' + rotate + 'deg)'
	});

	// Fix Background color of circle percentage & delete cache to fit with the current color theme
	jQuery( '#wp-admin-bar-bpminifycss-cache-info .bpminifycss-radial-bar .inset' ).css( 'background-color',  jQuery( '#wp-admin-bar-bpminifycss .ab-sub-wrapper' ).css( 'background-color') );
	jQuery( '#wp-admin-bar-bpminifycss-delete-cache .ab-item' ).css( 'background-color',  jQuery( '#wpadminbar' ).css( 'background-color') );

	jQuery( '#wp-admin-bar-bpminifycss-default li' ).click(function(e)
	{
		var id = ( typeof e.target.id != 'undefined' && e.target.id ) ? e.target.id : jQuery( e.target ).parent( 'li' ).attr( 'id' );
		var action = '';

		if( id == 'wp-admin-bar-bpminifycss-delete-cache' ){
			action = 'bpminifycss_delete_cache';
		} else {
			return;
		}

		// Remove the class "hover" from drop-down bpminifycss menu to hide it.
		jQuery( '#wp-admin-bar-bpminifycss' ).removeClass( 'hover' );

		// Create and Show the bpminifycss Loading Modal
		var modal_loading = jQuery( '<div class="bpminifycss-loading"></div>' ).appendTo( 'body' ).show();
                
		jQuery.ajax({
			type	: 'GET',
			url	: bpminifycss_ajax_object.ajaxurl,
			data	: {'action':action, 'nonce':bpminifycss_ajax_object.nonce},
			dataType: 'json',
			cache	: false,
			timeout : 5000,
			success	: function( data )
			{
				// Remove the bpminifycss Loading Modal
				modal_loading.remove();

				// Reset output values & class names of cache info
				jQuery( '#wp-admin-bar-bpminifycss-cache-info .size' ).attr( 'class', 'size green' ).html( '0.00 B' );
				jQuery( '#wp-admin-bar-bpminifycss-cache-info .files' ).html( '0' );
				jQuery( '#wp-admin-bar-bpminifycss-cache-info .percentage .numbers' ).attr( 'class', 'numbers green' ).html( '0%' );
				jQuery( '#wp-admin-bar-bpminifycss-cache-info .bpminifycss-radial-bar .fill' ).attr( 'class', 'fill bg-green' );

				// Reset the class names of bullet icon 
				jQuery( '#wp-admin-bar-bpminifycss' ).attr( 'class', 'menupop bullet-green' );

				// Reset the Radial Bar progress
				jQuery( '#wp-admin-bar-bpminifycss-cache-info .bpminifycss-radial-bar .mask.full, #wp-admin-bar-bpminifycss-cache-info .bpminifycss-radial-bar .fill' ).css({
					'-webkit-transform'	: 'rotate(0deg)',
					'-ms-transform'		: 'rotate(0deg)',
					'transform'		: 'rotate(0deg)'
				});
			},
			error: function( jqXHR, textStatus )
			{
				// Remove the bpminifycss Loading Modal
				modal_loading.remove();

				// WordPress Admin Notice
				jQuery( '<div id="ao-delete-cache-timeout" class="notice notice-error is-dismissible"><p><strong><span style="display:block;clear:both;">' + bpminifycss_ajax_object.error_msg + '</span></strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">' +  bpminifycss_ajax_object.dismiss_msg + '</span></button></div><br>' ).insertAfter( '#wpbody .wrap h1:first-of-type' ).show();

			}
		});
	});
});
