<?php
/**
 * Mstoic-Shortcodes plugin.
 *
 * Adds a button to the post editor screen which allows generation of shortcodes. It also adds support for many useful shortcodes.
 *
 * @package Mstoic_Shortcodes
 * @author mstoic
 * @version 2.0
 *
 * @wordpress
 * Plugin Name: Mstoic Shortcodes
 * Plugin URI: http://wordpress.org/extend/plugins/mstoic-shortcodes/
 * Description: This plugins add support for many shortcodes. It also adds a shortcode generator button to the post editor screen which makes adding shortcodes a breeze.
 * Author: <a href="http://hemantaggarwal.com">Hemant Aggarwal</a>
 * Version: 2.0
 * Text Domain: mstoic-shortcodes
 */

/**
 * Plugin class for Mstoic Shortcodes plugin
 *
 * @package Mstoic_Shortcodes
 */
class MstoicShortcodes {

	/**
	 * Loads plugin textdomain, and hooks in further actions.
	 */
	function __construct() {

		load_plugin_textdomain( 'rtl-tester', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

		add_action('wp_enqueue_scripts', 'mstoic_shortcodes_style_scripts');

		add_action('admin_enqueue_scripts', 'mstoic_shortcodes_admin_script_styles');

		add_action( 'init', array( $this, 'mstoic_shortcodes_buttons' ) );

	}

	/**
	 * Add Mstoic Shortcode generator
	 */
	function mstoic_shortcodes_buttons() {
		add_filter("mce_external_plugins", "mstoic_shortcodes_add_buttons");
		add_filter('mce_buttons', 'mstoic_shortcodes_register_buttons');
	}

}

new MstoicShortcodes;

/**
 * @param $plugin_array
 *
 * @return mixed
 */
function mstoic_shortcodes_add_buttons($plugin_array) {
	$plugin_array['mstoicShortcodes'] = plugins_url('editor-buttons/buttons-plugin.js?ver=280117', __FILE__);
	return $plugin_array;
}

/**
 * @param $buttons
 *
 * @return mixed
 */
function mstoic_shortcodes_register_buttons($buttons) {
	array_push($buttons, 'mstoicShortcodes');
	return $buttons;
}

/**
 * Styles and Scripts used by the plugin, loaded in the frontend
 */
function mstoic_shortcodes_style_scripts() {

	$plugin_dir = plugin_dir_url(__FILE__);

	// Mstoic Shortcodes Styles
	wp_enqueue_style('mstoic-shortcodes-style', $plugin_dir . 'style.css', array(), '280117');

	// Mstoic Shortcodes Script
	wp_enqueue_script('mstoic-shortcodes-script', $plugin_dir . 'js/script.js', array('jquery'), '280117', TRUE);

	/* If Font Awesome style is not loaded, load it. */
	if ( ! wp_script_is( 'font-awesome.min.css' ) ) {
		wp_enqueue_style( 'font-awesome', $plugin_dir . 'Font-Awesome-master/css/font-awesome.min.css', array(), '100092' );
	}

}

/**
 * Styles and Scripts used by the plugin, loaded in the WP Dashboard
 */
function mstoic_shortcodes_admin_script_styles() {

	$plugin_dir = plugin_dir_url( __FILE__ );

	/* If Font Awesome style is not loaded, load it. */
	if ( ! wp_script_is( 'font-awesome.min.css' ) ) {
		wp_enqueue_style( 'font-awesome', $plugin_dir . 'Font-Awesome-master/css/font-awesome.min.css', array(), '100092' );
	}

	// Load WordPress Color Picker (Admin)
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'color-picker-admin-script', $plugin_dir . 'js/admin/color-picker.js', array( 'wp-color-picker' ), FALSE, TRUE );

	wp_register_script( 'mstoic-shortcodes-admin-script', $plugin_dir . 'js/admin/script.js', array( 'jquery' ), '280117', TRUE ); // Register the script (Admin)

	$localisation_array = array( 'plugin_url' => $plugin_dir, ); // Localize the script with new data (Admin)
	wp_localize_script( 'mstoic-shortcodes-admin-script', 'localisation_array', $localisation_array );

	wp_enqueue_script( 'mstoic-shortcodes-admin-script' ); // Load Mstoic Shortcodes Script with localized data (Admin)

	wp_enqueue_style( 'mstoic-shortcodes-admin-style', $plugin_dir . 'css/admin/style.css', array(), '280117' ); // Load Mstoic Shortcodes Styles (Admin)

	wp_enqueue_style( 'jquery-ui-slider', 'https://code.jquery.com/ui/1.12.0/themes/blitzer/jquery-ui.css', array(), '1.12.0' ); // Stylesheet for slider (Admin)

	/**
	 * Load Frontend Style
	 */
	wp_enqueue_style( 'mstoic-shortcodes-style', $plugin_dir . 'style.css', array(), '280117' ); // Mstoic Shortcodes Styles (Frontend)

}

/*--------------------------------------------------------------
# Include Shortcode Functions
--------------------------------------------------------------*/

//WP Editor Not Working
//function mstoic_shortcodes_editor () {
//
//	$content = '';
//
//	$editor_id = $_POST['inputId'];
//
//	wp_editor( $content, $editor_id, $settings = array('media_buttons' => TRUE) );
//
//	\_WP_Editors::enqueue_scripts();
//	print_footer_scripts();
//	\_WP_Editors::editor_js();
//
//}
//add_action( 'wp_ajax_mstoic_shortcodes_editor', 'mstoic_shortcodes_editor' );
//add_action( 'wp_ajax_nopriv_mstoic_shortcodes_editor', 'mstoic_shortcodes_editor' );

function ms_ajax_live_preview () {

	$shortcode = $_POST['shortcodeData'];

	echo do_shortcode(stripcslashes($shortcode));

	exit();

}
add_action( 'wp_ajax_ajax_live_preview', 'ms_ajax_live_preview' );
add_action( 'wp_ajax_nopriv_ajax_live_preview', 'ms_ajax_live_preview' );

include_once('functions/shortcodes/box_heading_icon.php');
include_once('functions/shortcodes/buttons.php');
include_once('functions/shortcodes/clear.php');
include_once('functions/shortcodes/counters.php');
include_once('functions/shortcodes/expendable_box.php');
include_once('functions/shortcodes/facebook-like-button.php');
include_once('functions/shortcodes/google-maps.php');
include_once('functions/shortcodes/images.php');
include_once('functions/shortcodes/related_posts.php');
include_once('functions/shortcodes/slider_images.php');
include_once('functions/shortcodes/space.php');
include_once('functions/shortcodes/testimonials.php');
include_once('functions/shortcodes/tooltip.php');
include_once('functions/shortcodes/twitter-follow-button.php');
include_once('functions/shortcodes/youtube_embeds.php');



/**
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 */
if ( ! function_exists( 'ms_redux_remove_demo' ) ) {
	function ms_redux_remove_demo() {
		// Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
		if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
			remove_filter( 'plugin_row_meta', array(
				ReduxFrameworkPlugin::instance(),
				'plugin_metalinks'
			), null, 2 );

			// Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
			remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
		}
	}
}
add_action( 'redux/loaded', 'ms_redux_remove_demo' );

// Include TGMPA
require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'inc/tgmpa/tgmpa-init.php' );

// Load Redux
function mstoic_shortcodes_load_redux_files() {

	// If Redux is available, include Redux config files and extensions
	if ( class_exists( 'Redux' ) ) {

		//echo '8';
		// Include Redux Configuration File
		if ( ! isset( $ms_opt ) && file_exists(trailingslashit( plugin_dir_path( __FILE__ ) ) . 'redux/mstoic-shortcodes-options/config.php') ) {
			//echo '9';

			require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'redux/mstoic-shortcodes-options/config.php' );
		}

		require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'redux/redux-extensions/extensions-init.php' ); // Include Redux Extensions

	}

}
add_action( 'after_setup_theme', 'mstoic_shortcodes_load_redux_files' );