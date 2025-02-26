<?php

/* Cleanup user settings on uninstall */
function flexbillet_events_uninstall() {
	delete_option( 'flexbillet_events_shortcode_options' );
	delete_option( 'flexbillet_events_options' );

	/* to be re-structured in future versions */
    delete_option( 'flexbillet_events_organizer_name' );
    delete_option( 'flexbillet_events_organizer_email' );	
}

/* Activation */
function flexbillet_events_activate() {
	
	if ( !get_option('flexbillet_events_organizer_name') ) {

		//create array to set shortcode_options
		$flexbillet_shortcode_options['button-info-background'] = '#77a823';
		$flexbillet_shortcode_options['button-info-font-color'] = '#ffffff';
		$flexbillet_shortcode_options['button-buy-background'] = '#dd8d13';
		$flexbillet_shortcode_options['button-buy-font-color'] = '#ffffff';
		$flexbillet_shortcode_options['color-theme'] = '1';
		$flexbillet_shortcode_options['border-radius'] = '0';

		add_option( 'flexbillet_events_shortcode_options', $flexbillet_shortcode_options, '', 'yes' ); 

	}
}

?>