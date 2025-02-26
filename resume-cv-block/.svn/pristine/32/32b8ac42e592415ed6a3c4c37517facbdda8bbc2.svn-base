<?php
/**
 * Plugin Name: Resume CV Block
 * Plugin URI: https://wplook.com
 * Description: Resume / CV — is a Gutenberg bloc plugin to help you to created a nice Resume.
 * Author: Victor Tihai
 * Author URI: https://wplook.com/
 * Version: 1.0.1
 * Text Domain: resume-cv-block
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package WPLook Resume Gutenberg Block
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	class ResumeCvBlock {

	/**
	* Constructor
	*
	* Add actions for methods that define constants, load translation and load includes.
	*
	* @since 1.0.0
	* @access public
	*/
	public function __construct() {

		// Define constants
		add_action( 'plugins_loaded', array( $this, 'ResumeCvBlock_define_constants' ), 1 );

		// Load language file
		add_action( 'plugins_loaded', array( $this, 'ResumeCvBlock_load_textdomain' ), 2 );

		// Add setings link
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'ResumeCvBlock_plugin_page_links' ), 1 );

		// Block Initializer.
		require_once plugin_dir_path( __FILE__ ) . 'src/init.php';

	}

	/**
	* Defines constants used by the plugin.
	*
	* @since 1.0.0
	* @access public
	*/
	public function ResumeCvBlock_define_constants() {
		define( 'WPL_PLUGIN_NAME', "Resume / CV Gutenberg Block" );
		define( 'WPL_PLUGIN_VERSION', "1.0.1" );
	}


	/**
	* Load language file from /languages/
	*
	* @since 1.0.0
	* @access public
	*/
	public function ResumeCvBlock_load_textdomain() {
		load_plugin_textdomain( 'resume-cv-block', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
	}

	/**
	* Add settings links to plugin page
	*
	* @since 1.0.0
	* @access public
	*/
	public function ResumeCvBlock_plugin_page_links( $links ) {

		$links[] = '<a href="https://wplook.com/help/?utm_source=Plugins&utm_medium=Support_wp-admin&utm_campaign='.str_replace(" ", "", WPL_PLUGIN_NAME).'" target="_blank">' . __( 'Support', 'resume-cv-block' ) . '</a>';
		return $links;

	}
}

new ResumeCvBlock();
