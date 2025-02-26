/**
 * Sticky Footer
 */
wp.customize( 'daio_settings[daio-sticky-footer]', function( value ) {
	value.bind( function( sticky_footer ) {
		if( true == sticky_footer  ) {
			var dynamicStyle = '#main-footer';
				dynamicStyle += '{';
				dynamicStyle += 'width: 100%;';
				dynamicStyle += 'position: fixed;';
				dynamicStyle += 'bottom: 0;';
				dynamicStyle += 'left: 0;';
				dynamicStyle += 'z-index: 99999;';
				dynamicStyle += '}';
			daio_add_dynamic_css( 'daio-sticky-footer', dynamicStyle );
		} else {
			wp.customize.preview.send( 'refresh' );
		}
	});
});

/**
 * Hide footer widgets
 */
wp.customize( 'daio_settings[daio-hide-footer-widgets]', function( value ) {
	value.bind( function( hide_footer_widgets ) {
		if( true == hide_footer_widgets  ) {
			var dynamicStyle = '#footer-widgets';
				dynamicStyle += '{';
				dynamicStyle += 'display: none;';
				dynamicStyle += '}';
			daio_add_dynamic_css( 'daio-hide-footer-widgets', dynamicStyle );
		} else {
			wp.customize.preview.send( 'refresh' );
		}
	});
});

/**
 * Hide footer bottom bar
 */
wp.customize( 'daio_settings[daio-hide-footer-bottom-bar]', function( value ) {
	value.bind( function( hide_footer_bottom_bar ) {
		if( true == hide_footer_bottom_bar  ) {
			var dynamicStyle = '#footer-bottom';
				dynamicStyle += '{';
				dynamicStyle += 'display: none;';
				dynamicStyle += '}';
			daio_add_dynamic_css( 'daio-hide-footer-bottom-bar', dynamicStyle );
		} else {
			wp.customize.preview.send( 'refresh' );
		}
	});
});

/**
 * Remove Widget Bullet Points
 */
wp.customize( 'daio_settings[daio-hide-footer-widget-bullets]', function( value ) {
	value.bind( function( hide_footer_widget_bullets ) {
		if( true == hide_footer_widget_bullets  ) {
			var dynamicStyle = '#footer-widgets .footer-widget li';
				dynamicStyle += '{';
				dynamicStyle += 'padding-left: 0 !important;';
				dynamicStyle += '}';
				dynamicStyle += '#footer-widgets .footer-widget li:before';
				dynamicStyle += '{';
				dynamicStyle += 'border: none !important;';
				dynamicStyle += '}';
			daio_add_dynamic_css( 'daio-hide-footer-widget-bullets', dynamicStyle );
		} else {
			wp.customize.preview.send( 'refresh' );
		}
	});
});