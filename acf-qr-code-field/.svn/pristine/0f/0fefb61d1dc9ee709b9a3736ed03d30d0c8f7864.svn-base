<?php
/*
Plugin Name: ACF QR Code Field
Plugin URI: http://bytebuddies.net/?plugin=acf_qr_code
Description: QR Code Field Type for ACF
Version: 1.0.0
Tested up to: 5.9.2
Author: Bytebuddies
Author URI: http://bytebuddies.net/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: acfqrcode
*/

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('BBACFQR_acf_plugin_qrcode') ) :
include( plugin_dir_path( __FILE__ ) . 'hooks.php');

class BBACFQR_acf_plugin_qrcode {
	
	// vars
	var $settings;
	
	
	/*
	*  __construct
	*
	*  This function will setup the class functionality
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	void
	*  @return	void
	*/
	
	function __construct() {
		
		// settings
		// - these will be passed into the field class.
		$this->settings = array(
			'version'	=> '1.0.0',
			'url'		=> plugin_dir_url( __FILE__ ),
			'path'		=> plugin_dir_path( __FILE__ )
		);
		
		
		// include field
		add_action('acf/include_field_types', 	array($this, 'include_field')); // v5
		add_action('acf/register_fields', 		array($this, 'include_field')); // v4
	}
	
	
	/*
	*  include_field
	*
	*  This function will include the field type class
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	$version (int) major ACF version. Defaults to false
	*  @return	void
	*/
	
	function include_field( $version = false ) {
		
		
		// load textdomain
		load_plugin_textdomain( 'acfqc', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' ); 
		
		
		// include
		include_once('fields/class-BBACFQR-acf-field-qrcode-v5.php');
	}
	
}


// initialize
new BBACFQR_acf_plugin_qrcode();


// class_exists check
endif;
	
?>