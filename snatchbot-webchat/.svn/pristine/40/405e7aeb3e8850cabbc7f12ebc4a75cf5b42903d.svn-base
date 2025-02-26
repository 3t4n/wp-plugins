<?php
/*
Plugin Name: SnatchBot Webchat 
Plugin URI: https://snatchbot.me
Description: Easily integrate powerful chatbots onto your Wordpress website. Just one click to add SnatchBot widget to your page.
Version: 1.0.0
Author: snatchbot
Author URI: https://profiles.wordpress.org/snatchbot/
*/

/*
*  @subpackage	Admin
*/

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('SBW') ) :

class SBW {

    /** @var array The plugin settings array. */
    var $settings = array();
    
	/**
	 * __construct
	 *
	 * A dummy constructor to ensure SBW is only setup once.
	 *
	 * @date	23/11/2019
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */	
	function __construct() {
		// Do nothing.
	}
	
	/**
	 * initialize
	 *
	 * Sets up the SBW plugin.
	 *
	 * @date	23/11/2019
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */
	function initialize() {

        // Define constants.
		define( 'SBW', true );
        define( 'SBW_PATH', plugin_dir_path( __FILE__ ) );
        define( 'SBW_MAIN_FILE_PATH',  __FILE__ );
        define( 'SBW_VERSION', '1.0.0' );

        // Define settings.
		$this->settings = array(
			'name'						=> 'SnatchBot Webchat',
			'slug'						=> 'snatchbot_webchat',
			'version'					=> SBW_VERSION,
            'path'						=> SBW_PATH,
            'capability'				=> 'manage_options',
			'file'						=> __FILE__,
			'url'						=> plugin_dir_url( __FILE__ ),
		);
        
        // Include utility functions.
        include_once( SBW_PATH . 'includes/sbw-utility-functions.php');
        
        // Include previous API functions.
        include_once( SBW_PATH . 'admin/activation.php');
        include_once( SBW_PATH . 'admin/admin.php');

        // Include AJAX-actions functions.
        include_once( SBW_PATH . 'admin/ajax-actions.php');

        // Include client functions.
        include_once( SBW_PATH . 'client/client.php');
    }
}

/*
 * sbw
 *
 * The main function responsible for returning the one true acf Instance to functions everywhere.
 * Use this function like you would a global variable, except without needing to declare the global.
 *
 * Example: <?php $sbw = sbw(); ?>
 *
 * @date	23/11/2019
 * @since	1.0.0
 *
 * @param	void
 * @return	SBW
 */
function sbw() {
	global $sbw;
	
	// Instantiate only once.
	if( !isset($acf) ) {
		$sbw = new SBW();
		$sbw->initialize();
	}
	return $sbw;
}

// Instantiate.
sbw();


endif;