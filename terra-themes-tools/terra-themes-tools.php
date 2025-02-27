<?php

/**
 *
 * @link              https://terra-themes.com
 * @since             1.0
 * @package           Terra_Themes_Tools
 *
 * @wordpress-plugin
 * Plugin Name:       Terra Themes Tools
 * Description:       Terra Themes Tools registers custom post types (like Projects, Employees and more) with custom fields for themes from Terra Themes.
 * Version:           1.5
 * Author:            Terra Themes
 * Author URI:        https://terra-themes.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       terra_themes_tools
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Set up and initialize
 */
class Terra_Themes_Tools {

	private static $instance;

	/**
	 * Actions setup
	 */
	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'constants' ), 2 );
		add_action( 'plugins_loaded', array( $this, 'i18n' ), 3 );
		add_action( 'admin_enqueue_scripts', array( $this, 'terra_themes_tools_admin_scripts_init' ), 9 );
		add_action( 'after_setup_theme', array( $this, 'includes' ), 11 );
	}

	/**
	 * Constants
	 */
	function constants() {
		define( 'TT_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
		define( 'TT_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );
	}

	/**
	* Get theme support
	*/
	function supports($supported = '') {
		$cpts = get_theme_support( 'terra-themes-tools-post-types' );
		if ( is_array($cpts) ) {
			return in_array( $supported, $cpts[0] );
		}
	}

	/**
	 * Includes
	 */
	function includes() {
		// Post types
		$post_types = array( 'employees','testimonials','projects','clients','slides' );
		foreach ( $post_types as $post_type ) {
			if ( $this->supports( $post_type ) ) {
				require_once( TT_DIR . 'inc/post-type-' . $post_type . '.php' );
			}
		}

		// Metaboxes
		$metaboxes = array( 'employees','testimonials','projects','clients','slides' );
		foreach ( $metaboxes as $metabox ) {
			if ( $this->supports( $metabox ) ) {
				require_once( TT_DIR . 'inc/metaboxes/' . $metabox . '-metabox.php' );
			}			
		}

		if ( $this->supports( 'slides' ) ) {
			require_once( TT_DIR . 'inc/metaboxes/slides-shortcode-metabox.php' );
			require_once( TT_DIR . 'inc/slider/terra-themes-slider.php' );
			require_once( TT_DIR . 'inc/custom-taxanomy-field/register-taxanomy-fields.php' );
		}		
	}

	/**
	 * Translations
	 */
	function i18n() {
		load_plugin_textdomain( 'terra_themes_tools', false, 'terra-themes-tools/languages' );
	}

	/**
	 * Register styles and scripts
	 */
	function terra_themes_tools_admin_scripts_init() {
		wp_enqueue_style( 'tt-metabox', plugins_url( '/inc/metaboxes/assets/terra-themes-metabox-style.css', __FILE__ ) );
		wp_enqueue_script( 'tt-metabox-scripts', plugins_url( '/inc/metaboxes/assets/terra-themes-metabox-scripts.js', __FILE__, array( 'jQuery' ) ) );
		// WordPress library
		wp_enqueue_media();
	}

	/**
	 * Returns the instance.
	 */
	public static function get_instance() {
		if ( ! self::$instance )
			self::$instance = new self;

		return self::$instance;
	}
}

function terra_themes_tools_plugin() {
		return Terra_Themes_Tools::get_instance();
}
add_action( 'plugins_loaded', 'terra_themes_tools_plugin', 1 );


/**
 * Needed for image upload at meta box from custom post types
 */
function terra_themes_tools_get_attachment_thumb_url( $attachment_url = '' ) {
	if ( '' == $attachment_url ) {
		return false;
	}

	$attachment_id = attachment_url_to_postid( $attachment_url );

	if ( ! empty ( $attachment_id ) ) {
		return wp_get_attachment_thumb_url( $attachment_id );
	} else {
		return $attachment_url;
	}
}
