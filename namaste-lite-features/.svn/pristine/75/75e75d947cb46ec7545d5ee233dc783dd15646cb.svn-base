<?php
/**
 * Plugin Name: Namaste Lite Features
 * Plugin URI:  http://webzakt.com/product/namaste-buddhist-wordpress-theme/
 * Description: Shortcodes plugin for Namaste theme from <a href="http://webzakt.com" target="_blank">Webzakt</a>. Get <a href="http://webzakt.com/product/namaste-buddhist-wordpress-theme/" target="_blank">Pro Version</a> with more Shortcodes, event and portfolio modules.
 * Version: 2.0.0
 * Author: Webzakt
 * Author URI: http://www.webzakt.com
 */

class Namaste_Lite_Features {

    function __construct()
    {
    	define( 'NAMASTE_VERSION', '1.1' );

    	// Plugin folder path
    	if ( ! defined( 'NAMASTE_PLUGIN_DIR' ) ) {
    		define( 'NAMASTE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
    	}

    	// Plugin folder URL
    	if ( ! defined( 'NAMASTE_PLUGIN_URL' ) ) {
    		define( 'NAMASTE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
    	}
		
		if ( ! class_exists( 'Namaste_Pro_Features' ) ) {
			function namaste_lite_filter_plugin_awesome_extensions($locations) {
				$locations[ dirname(__FILE__) . '/extensions' ]
				=
				plugin_dir_url( __FILE__ ) . 'extensions';
			
				return $locations;
			}
			add_filter('fw_extensions_locations', 'namaste_lite_filter_plugin_awesome_extensions');
		}
	}

}
new Namaste_Lite_Features();