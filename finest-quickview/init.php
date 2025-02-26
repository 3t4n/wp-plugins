<?php
/*
*
*  Register CSS
*
*/
function fqv_register_script(){

	// Enqueue All css
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style('slick-css', FINEST_QUICKVIEW_ASSETS_CSS . 'slick.css', array(), '2.0' );
	wp_enqueue_style('slick-theme', FINEST_QUICKVIEW_ASSETS_CSS . 'slick-theme.css', array(), '2.0' );
	wp_enqueue_style('finest-quick-view', FINEST_QUICKVIEW_ASSETS_CSS . 'quick-view.css',array(), time() );

	// Enqueue All Js file
	wp_enqueue_script('slick-min', FINEST_QUICKVIEW_ASSETS_JS . 'slick.min.js', array('jquery'), '2.0', true);
	wp_enqueue_script('finest-quickview-core', FINEST_QUICKVIEW_ASSETS_JS . 'quickview-core.js', array('jquery'), FINEST_QUICKVIEW_VERSION ,true);

};
add_action( 'wp_enqueue_scripts', 'fqv_register_script' );

/*
*
*  Includes
*
*/
// Load the Functions
if ( file_exists( FINEST_QUICKVIEW_INC . 'function.php' ) ) {
	require_once  FINEST_QUICKVIEW_INC . 'function.php';
}

// Load the Functions
if ( file_exists( FINEST_QUICKVIEW_INC . 'option-style.php' ) ) {
	require_once  FINEST_QUICKVIEW_INC . 'option-style.php';
}
// Load the Settings Options
if ( file_exists( FINEST_QUICKVIEW_INC . 'customizer/config.php' ) ) {
	require_once  FINEST_QUICKVIEW_INC . 'customizer/config.php';
}

