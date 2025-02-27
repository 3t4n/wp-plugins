<?php

/**
 * The CSS AutoLoader Plugin Loader
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
require_once( plugin_dir_path( __FILE__ ) . '/inc/class-css-autoloader.php' );


/**
 * Main Function
 */
function pp_css_autoloader() {

  return PP_Css_Autoloader::getInstance( array(
    'file'      => dirname( __FILE__ ) . '/css-autoloader.php',
    'slug'      => pathinfo( dirname( __FILE__ ) . '/css-autoloader.php', PATHINFO_FILENAME ),
    'name'      => 'Smart CSS Auto Loader',
	'shortname' => 'CSS AutoLoader',
    'version'   => '5.0.3'
  ) );
    
}



/**
 * Run the plugin
 */
pp_css_autoloader();


?>