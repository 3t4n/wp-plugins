<?php
/*
Plugin Name: Ayo Shortcodes
Plugin URI: https://plugins.ayothemes.com/ayo-shortcodes
Description: Ayo Shortcodes is a simple plugin to generate design elements.
Author: AyoThemes
Author URI: http://ayothemes.com/

Version: 0.2

License: GNU General Public License version 2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/** Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'Ayo_Shortcodes' ) ) :

class Ayo_Shortcodes {

	/**
	 * @var string
	 */
	public $version = '0.2';

	/** Constructor */
	function __construct() {

		/** Let's encourage people to update their WordPress with the latest version */
		register_activation_hook( __FILE__, array( $this, 'ayo_shortcodes_activation' ) );

		/** Define plugin constant */
		add_action( 'plugins_loaded', array( $this, 'ayo_shortcodes_constant' ), 1 );

		/** Load Plugin Textdomain */
		add_action( 'plugins_loaded', array( $this, 'ayo_shortcode_i18n' ), 2 );

		/** Load the functions files. */
		add_action( 'plugins_loaded', array( $this, 'ayo_shortcodes_includes' ), 3 );

		/** Hook the functions */
		add_action( 'init', array( $this, 'ayo_shortcodes_init' ) );
		add_action( 'init', array( $this, 'ayo_register_scripts' ), 15 );
		add_action( 'wp_enqueue_scripts', array( $this, 'ayo_shortcodes_scripts' ), 15 );

	}

	/**
	 * Plugin deactive functions
	 *
	 * @since 0.1
	 */
	function ayo_shortcodes_constant(){

		/** Set the constant path for plugin version. */
		define( 'AYOS_PLUGIN_VERSION', $this->version );
		/** Set the constant path for pluygin name. */
		define( 'AYOS_PLUGIN_NAME', 'Ayo Shortcodes' );
		/** Set the constant path for plugin version. */
		define( 'AYOS_DOMAIN', 'ayoshortcodes' );

		/** Set constant path to the plugin directory. */
		define( 'AYOS_PLUGIN_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
		/** Set the constant path to the plugin URI. */
		define( 'AYOS_PLUGIN_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );
		/** Set constant path to the includes directory. */
		define( 'AYOS_INC_DIR', AYOS_PLUGIN_DIR . trailingslashit( 'includes' ) );
		/** Set the constant path to the includes URI. */
		define( 'AYOS_INC_URI', AYOS_PLUGIN_URI . trailingslashit( 'includes' ) );
		/** Set constant path to the plugin assets directory. */
		define( 'AYOS_ASSETS_DIR', AYOS_PLUGIN_DIR . trailingslashit( 'assets' ) );
		/** Set the constant path to the plugin assets URI. */
		define( 'AYOS_ASSETS_URI', AYOS_PLUGIN_URI . trailingslashit( 'assets' ) );
		
	}

	/**
	 * Plugin deactive functions
	 *
	 * @since 0.1
	 */
	function ayo_shortcodes_activation() {
		global $wp_version;
		/** Deactive plugin if doesnt meet minimum requirement. */
		if ( version_compare( $wp_version, '3.4', '<' ) ) {
			deactivate_plugins( plugin_basename( __FILE__ ) );
			wp_die( sprintf( __( 'Sorry, you cannot run %s without WordPress %s, or greater.', 'ayoshortcodes' ), '<strong>'. AYOS_PLUGIN_NAME .'</strong>', '<strong>'. $wp_version .'</strong>' ) );
		}
	}

	/**
	 * Loads the translation files.
	 *
	 * @since 0.1
	 */
	function ayo_shortcode_i18n(){
		load_plugin_textdomain( 'ayoshortcodes', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Load shortcodes functions and helper function
	 *
	 * @since 	0.1
	 * @access 	public
	 * @return 	string
	 */
	function ayo_shortcodes_includes(){
		/** Load Helper Functions */
		require_once( AYOS_INC_DIR .'ayo-helper-functions.php' );
		/** Load Shortcode Functions */
		require_once( AYOS_INC_DIR .'ayo-shortcodes-functions.php' );
		/** Load Dependency Functions */
		require_once( AYOS_INC_DIR .'ayo-dependency.php' );
	}

	/**
	 * This function control button registration
	 *
	 * @since 	0.1
	 */
    function ayo_shortcodes_init() {

    	global $pagenow, $wp_version;

    	/** Only load script only in post/pages */
    	if ( in_array( $pagenow, array( 'post.php', 'page.php', 'post-new.php', 'post-edit.php' ) ) ) {  

			if ( ! current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) 
				return;

			if ( get_user_option( 'rich_editing' ) == 'true' ) {

				/** Fontawesome icon Selector */
				add_filter( 'mce_external_plugins', array( $this, 'ayo_icon_script' ) );
				/** Social Icon Selector */

				add_filter( 'mce_external_plugins', array( $this, 'ayo_social_script' ) );
				/** Ayo Shortcodes Button */

				add_filter( 'mce_external_plugins', array( $this, 'ayo_list_script' ) );
				/** Register Button */

				add_filter( 'mce_buttons_3', array( $this, 'ayo_register_button' ) );

			}

    	}

    }

	/**
	 * Load TinyMCE script for ayo_icon_selector
	 *
	 * @since 	0.1
	 */
	function ayo_icon_script( $plugin_array ) {

		$plugin_array[ 'ayo_icon_selector' ] = AYOS_INC_URI . 'mce/ayoshortcodes-tinymce.min.js';
		return $plugin_array;

	}

	/**
	 * Load TinyMCE script for ayo_icon_selector
	 *
	 * @since 	0.1
	 */
	function ayo_social_script( $plugin_array ) {

		$plugin_array[ 'ayo_social_selector' ] = AYOS_INC_URI . 'mce/ayoshortcodes-tinymce.min.js';
		return $plugin_array;

	}

	/**
	 * Load TinyMCE script for ayo_shortcode_button
	 *
	 * @since 	0.1
	 */
	function ayo_list_script( $plugin_array ) {

		$plugin_array[ 'ayo_shortcode_list' ] = AYOS_INC_URI . 'mce/ayoshortcodes-tinymce.min.js';
		return $plugin_array;

	}

	/**
	 * Register shortcode buttons
	 *
	 * @since 	0.1
	 * @see 	http://www.tinymce.com/wiki.php/TinyMCE3x:Buttons/controls
	 */
	function ayo_register_button( array $buttons ) {
		$additional_buttons = array( 'ayo_icon_selector', 'ayo_social_selector', 'ayo_shortcode_list', 'backcolor', 'code' );
		return array_unique( array_merge( $buttons, $additional_buttons ) );
	}

	/**
	 * This function control scripts and styles registration
	 *
	 * @since 	0.1
	 */
    function ayo_register_scripts() {

	    /** Register Fontawesome v.3.0.2 */
		if ( ! wp_style_is( "fontawesome", "registered" ) )
	    	wp_register_style( "fontawesome", "//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css", array(), "3.2.1", "all" );
		if ( ! wp_style_is( "fontawesome-ie7", "registered" ) )
			wp_register_style( "fontawesome-ie7", "//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome-ie7.min.css", array(), "3.2.1", "all" );
		
		/** Register Google Maps API v.3*/
		if ( ! wp_script_is( "google-maps-api", "registered" ) )
			wp_register_script( "google-maps-api", "//maps.google.com/maps/api/js?sensor=false" );

		/** Register Twitter Widgets*/
		if ( ! wp_script_is( "twitter-widget", "registered" ) )
			wp_register_script( "twitter-widget", "//platform.twitter.com/widgets.js" );
		
		/** Register Bootstrap script*/
		if ( ! wp_script_is( "bootstrap-transition", "registered" ) )
			wp_register_script( "bootstrap-transition", "//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap-transition.js", array( "jquery" ), "2.0.4", true );
		if ( ! wp_script_is( "bootstrap-alert", "registered" ) )
			wp_register_script( "bootstrap-alert", "//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap-alert.js", array( "jquery", "bootstrap-transition" ), "2.0.4", true );
		if ( ! wp_script_is( "bootstrap-tooltip", "registered" ) )
			wp_register_script( "bootstrap-tooltip", "//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap-tooltip.js", array( "jquery", "bootstrap-transition" ), "2.0.4", true );
		
		/** Register Main Sytle and Scripts for AyoShortcodes */
		wp_register_style( "ayo-shortcodes", AYOS_ASSETS_URI . "css/style.css", array(), AYOS_PLUGIN_VERSION, "all" );
		wp_register_script( "ayo-shortcodes",  AYOS_ASSETS_URI . "js/ayoshortcodes.js", array( "jquery" ), AYOS_PLUGIN_VERSION, true );
	

    }

	/**
	 * This function control plugin scripts and styles
	 *
	 * @since 	0.1
	 */
	function ayo_shortcodes_scripts() {

		$browser = $_SERVER['HTTP_USER_AGENT'];
		$browser = substr( "$browser", 25, 8);

		/** Load fontawesome */
		if ( $browser == "MSIE 7.0" ) {
			wp_enqueue_style( 'fontawesome-ie7' );
		} else {
			wp_enqueue_style( 'fontawesome' );
		}

		/** Load main shortcode style */
		wp_enqueue_style( 'ayo-shortcodes' );

		/** Load main shortcode script */
		wp_enqueue_script( 'ayo-shortcodes' );

	}

}

global $_ayo_shortcodes;
$_ayo_shortcodes = new Ayo_Shortcodes();

endif; /** EOF Ayo_Shortcodes class */