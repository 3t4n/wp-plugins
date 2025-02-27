<?php
function register_catcwp_copy_widget( $widgets_manager ) {

	require_once( __DIR__ . '/catcwp-copy-widget.php' );

	$widgets_manager->register( new \CATCWP_COPY_WIDGET() );

}
add_action( 'elementor/widgets/register', 'register_catcwp_copy_widget' );