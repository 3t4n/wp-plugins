<?php
/*
* Plugin name: 5P2P VC OpenAgenda
* Author: sebastienserre
* Author URI: https://5pains-et-2poissons.fr/
* Description: Stop using this not deprecated plugins. Please consider to use https://wordpress.org/plugins/wp-openagenda/ instead.
* Version: 1.0.1
* License: GPLv2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: 5p2p-vc-openagenda
* Domain Path: /languages
*/

// don't load directly
if( !defined( 'ABSPATH' ) )
	die( '-1' );

define('P2P5_OPENAGENDA_URL',plugins_url( '/', __FILE__ ) );


add_action('plugins_loaded', 'p2p5_vc_openagenda_load_files');
function p2p5_vc_openagenda_load_files(){
	include_once plugin_dir_path( __FILE__ ). '/admin/register_settings.php';
	include_once plugin_dir_path( __FILE__ ). '/visual-composer/visual-slide.php';
}


add_action('admin_notices', 'p2p5_vc_check_openagenda');
function p2p5_vc_check_openagenda(){
	if ( ! function_exists('vc_map')){

		echo '<div class="notice notice-error"><p>' . __('WPBakery Visual Composer is not activated. 5P2P VC OpenAgenda need it activated to work properly', 'p2p5-openagenda' ) . '</p></div>';

		deactivate_plugins(plugin_basename(__FILE__));

	}
}

add_action( 'plugins_loaded', 'p2p5_vc_openagenda_load_textdomain' );
function p2p5_vc_openagenda_load_textdomain() {
	load_plugin_textdomain( '5p2p-vc-openagenda', false, dirname(plugin_basename( __FILE__ ) ) . '/languages' );
}

add_action('wp_enqueue_scripts', 'p2p5_vc_openagenda_enqueue');
function p2p5_vc_openagenda_enqueue(){
	wp_enqueue_script('slick-js', plugins_url( '/assets/slick/slick.min.js', __FILE__ ) , array('jquery'));
	wp_enqueue_script('openagenda-js', plugins_url( '/assets/js/p2p5_openagenda_main.js', __FILE__ ) , array('slick-js'));
	wp_enqueue_script('openagenda-debug', plugins_url( '/assets/js/p2p5_openagenda_debug.js', __FILE__ ) , array('openagenda-js'));
	wp_enqueue_style('slick-css', plugins_url('/assets/slick/slick.css', __FILE__) );
	wp_enqueue_style('slick-css-theme', plugins_url('/assets/slick/slick-theme.css', __FILE__), array('slick-css') );
	wp_enqueue_style('openagenda-css', plugins_url('/assets/css/p2p5-openagenda.css', __FILE__) );
	wp_enqueue_style('marck-script-font', 'https://fonts.googleapis.com/css?family=Marck+Script' );
}

//wp_localize_script( 'openagenda-js', 'PATH', array(P2P5_OPENAGENDA_URL) );
