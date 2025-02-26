/**
 * Sticky Footer
 */
wp.customize( 'daio_settings[daio-remove-mh-underline]', function( value ) {
	value.bind( function( remove_mh_underline ) {
		if( true == remove_mh_underline  ) {
			var dynamicStyle = '#main-header { box-shadow: none; }';
			daio_add_dynamic_css( 'daio-remove-mh-underline', dynamicStyle );
		} else {
			wp.customize.preview.send( 'refresh' );
		}
	});
});
