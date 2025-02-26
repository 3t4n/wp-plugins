<?php
/**
 * Plugin Name:       Lãi Suất Ngân Hàng by MeCode
 * Plugin URI:        http://mecode.pro
 * Description:       Plugin tính lãi suất ngân hàng. Dùng shortcode [lai_suat_ngan_hang]
 * Version:           1.1
 * Requires at least: 4.0
 * Requires PHP:      5.3
 * Author:            MeCode
 * Author URI:        http://mecode.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       lsnh
 * Domain Path:       /languages
 */
 
 include "backend.php";

$lsnh_settings = lsnh_get_options();

define ('LSNH_VERSION', '1.1');
define ('LSNH_PLUGIN_TITLE', 'Lãi Suất Ngân Hàng');
define ('LSNH_PLUGIN_URL', plugin_dir_url(__FILE__));

function lsnh_register_scripts() {
    wp_register_style( 'lsnh-style', plugins_url( 'public/css/style.css', __FILE__ ), array(), LSNH_VERSION, 'all' );
    wp_register_style( 'ionrangeSlidercss', plugins_url( 'public/css/ion.rangeSlider.min.css', __FILE__ ), array(), LSNH_VERSION, 'all' );
    wp_register_script( 'ionrangeSliderjs', plugins_url( 'public/js/ion.rangeSlider.min.js', __FILE__ ), array('jquery'), LSNH_VERSION, 'all' );
    wp_register_script( 'lsnh-script', plugins_url( 'public/js/tinh-lai.js', __FILE__ ), array(), LSNH_VERSION, 'all' );
    wp_localize_script( 'lsnh-script', 'lsnh',array( 'ajax_url' => admin_url( 'admin-ajax.php' )) );
}

add_action( 'wp_enqueue_scripts', 'lsnh_register_scripts' );

add_shortcode( 'lai_suat_ngan_hang', 'lsnh_shortcode' );

function lsnh_shortcode($attributes){
	wp_enqueue_style( 'lsnh-style' );
	wp_enqueue_style( 'ionrangeSlidercss' );
	wp_enqueue_script( 'ionrangeSliderjs' );
	wp_enqueue_script( 'lsnh-script' );
	ob_start();
	include('public/views/form-tinh-lai.php');
	return ob_get_clean();

}

