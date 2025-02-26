<?php

/**
 * The JS AutoLoader Plugin Loader
 *
 * @since 4
 *
 **/
 
// If this file is called directly, abort
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * Load Plugin Foundation
 * @since 5.0.0
 */
require_once( plugin_dir_path( __FILE__ ) . '/inc/ppf/loader.php' );


/**
 * Load Plugin Main File
 */
require_once( plugin_dir_path( __FILE__ ) . '/inc/class-js-autoloader.php' );

/**
 * Main Function
 */
function pp_js_autoloader() {

  return PP_Js_Autoloader::getInstance( array(
    'file'      => dirname( __FILE__ ) . '/sw.cc-js-autoloader.php',
    'slug'      => 'javascript-autoloader',    // do not get Slug from Filename ( I was really stupid to do that at the time )
    'name'      => 'Smart JavaScript Auto Loader',
	'shortname' => 'JS AutoLoader',
    'version'   => '5.0.3'
  ) );
    
}



/**
 * Run the plugin
 */
pp_js_autoloader();


?>