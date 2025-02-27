<?php
function register_cdsfw_current_date_widget( $widgets_manager ) {

	require_once( __DIR__ . '/cdsfw-current-date-widget.php' );

	$widgets_manager->register( new \CDSFW_CURRENT_DATE_WIDGET() );

}
add_action( 'elementor/widgets/register', 'register_cdsfw_current_date_widget' );