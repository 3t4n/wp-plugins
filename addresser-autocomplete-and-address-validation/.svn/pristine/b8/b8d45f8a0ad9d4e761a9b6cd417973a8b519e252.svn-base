<?php 
/*
*
*	***** Addresser *****
*
*	This file initializes all ADDRESSER Core components
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
// Define Our Constants
define('ADDRESSER_CORE_INC',dirname( __FILE__ ).'/assets/inc/');
define('ADDRESSER_CORE_IMG',plugins_url( 'assets/img/', __FILE__ ));
define('ADDRESSER_CORE_CSS',plugins_url( 'assets/css/', __FILE__ ));
define('ADDRESSER_CORE_JS',plugins_url( 'assets/js/', __FILE__ ));
/*
*
*  Register CSS
*
*/
function addresser_register_core_css(){
wp_enqueue_style('addresser-core', ADDRESSER_CORE_CSS . 'addresser-core.css',null,time(),'all');
};
add_action( 'wp_enqueue_scripts', 'addresser_register_core_css' );    
/*
*
*  Register JS/Jquery Ready
*
*/
function addresser_register_core_js(){
// Register Core Plugin JS	
wp_enqueue_script('addresser-core', ADDRESSER_CORE_JS . 'addresser-core.js','jquery',time(),true);
};
add_action( 'wp_enqueue_scripts', 'addresser_register_core_js' );    
/*
*
*  Includes
*
*/ 
// Load the Functions
if ( file_exists( ADDRESSER_CORE_INC . 'addresser-core-functions.php' ) ) {
	require_once ADDRESSER_CORE_INC . 'addresser-core-functions.php';
}     
// Load the ajax Request
if ( file_exists( ADDRESSER_CORE_INC . 'addresser-ajax-request.php' ) ) {
	require_once ADDRESSER_CORE_INC . 'addresser-ajax-request.php';
} 
// Load the Shortcodes
if ( file_exists( ADDRESSER_CORE_INC . 'addresser-shortcodes.php' ) ) {
	require_once ADDRESSER_CORE_INC . 'addresser-shortcodes.php';
}
if ( file_exists( ADDRESSER_CORE_INC . 'addresser-wc-settings.php' ) ) {
	require_once ADDRESSER_CORE_INC . 'addresser-wc-settings.php';
}
if ( file_exists( ADDRESSER_CORE_INC . 'addresser-checkout-page.php' ) ) {
	require_once ADDRESSER_CORE_INC . 'addresser-checkout-page.php';
}