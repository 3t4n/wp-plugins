<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register pcw Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_pcw_widget( $widgets_manager ) {

	require_once __DIR__ . '/pcw-widget.php';

	$widgets_manager->register( new \Elementor_Pcw_Widget() );

}
add_action( 'elementor/widgets/register', 'register_pcw_widget' );
