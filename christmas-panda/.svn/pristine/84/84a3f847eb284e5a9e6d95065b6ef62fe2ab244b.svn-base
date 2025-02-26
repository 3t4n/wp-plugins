<?php
/**
 Plugin Name: Christmas Panda
 Plugin URI: https://pixollete.com
 Description: Lightweight plugin to add Christmas decorations, banners and pop-ups to your website. Enable snowfall with just one click.
 Author: Pixolette
 Version: 1.0.4
 Author URI: https://pixolette.com
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if ( ! defined( 'PIX_CHR_PAN_PATH' ) ) {
	define( 'PIX_CHR_PAN_PATH', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'PIX_CHR_PAN_URL' ) ) {
	define( 'PIX_CHR_PAN_URL', plugins_url() . '/christmas-panda/' );
}

require_once PIX_CHR_PAN_PATH . '_controllers/cp-controller.php';
require_once PIX_CHR_PAN_PATH . '_models/cp-main.php';
use PixChristmasPanda\Controllers\Main as PixChristmasPanMainController;
use PixChristmasPanda\Models\Main as PixChristmasPanMainModel;

// Init plugin in wp-admin section.
add_action( 'admin_menu', 'pix_christmas_panda_init_plugin_page' );

/**
 *
 * Init admin page.
 */
function pix_christmas_panda_init_plugin_page() {
	add_menu_page( 'Christmas Panda', 'Christmas panda', 'manage_options', 'pix-christmas-panda', array( new PixChristmasPanMainController, 'init_backend' ), 'dashicons-admin-customizer' );
}

add_action( 'admin_enqueue_scripts', 'pix_christmas_panda_admin_enqueue_scripts_and_styles' );

/**
 *
 * Add styles and js scripts
 */
function pix_christmas_panda_admin_enqueue_scripts_and_styles() {
	wp_enqueue_style( 'pix-cp-wpadmin-style', PIX_CHR_PAN_URL . 'assets/css/cp-backend.min.css', array(), '1.0.0' );
}

add_action( 'wp_enqueue_scripts', 'pix_christmas_panda_enqueue_scripts_and_styles' );

/**
 *
 * Add styles and js scripts in frontend
 */
function pix_christmas_panda_enqueue_scripts_and_styles() {
	wp_enqueue_style( 'pix-cp-wp-style', PIX_CHR_PAN_URL . 'assets/css/cp-frontend.min.css', array(), '1.0.0' );
	wp_enqueue_script( 'pix-cp-wp-script', PIX_CHR_PAN_URL . 'assets/js/cp-frontend.min.js', array( 'jquery', 'pix-cp-wp-script-fall', 'pix-cp-wp-script-cookies' ), '', true );
	wp_enqueue_script( 'pix-cp-wp-script-fall', PIX_CHR_PAN_URL . 'assets/js/snowfall.jquery.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'pix-cp-wp-script-cookies', PIX_CHR_PAN_URL . 'assets/js/js.cookie.min.js', array( 'jquery' ), '', true );
}

add_action( 'wp_footer', 'pix_christmas_panda_template' );

/**
 * Include overlay review form into header section
 *
 * @var function
 */
function pix_christmas_panda_template() {

	$cp_model = new PixChristmasPanMainModel();
	$cp_options = json_decode( $cp_model->options_data );
	include_once PIX_CHR_PAN_PATH . '_views/cp-frontend.php';

}

register_activation_hook( __FILE__, 'pix_christmas_panda_install' );
/**
 * Creates custom table pxreviews. Used to store the user's revies.
 * Runs only when plugin is activated
 *
 * @var function
 */
function pix_christmas_panda_install() {
	$options = array(
		'px_cp_is_active' => 'yes',
		'px_cp_display_type' => '1',
		'px_cp_display_position' => 'top',
		'px_cp_is_fixed' => 'no',
		'px_cp_snowfall' => 'no',
		'px_cp_display_popup' => 'no',
		'px_cp_popup_position' => 'right',
		'px_cp_popup_type' => '1',
	);
	$main_model = new PixChristmasPanMainModel();
	$main_model->save_options( $options );
}
