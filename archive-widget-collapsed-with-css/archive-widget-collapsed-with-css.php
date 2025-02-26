<?php
/**
 * Plugin Name: Archive widget collapsed with CSS
 * Plugin URI: https://yws.tokyo/archive-widget-collapsed-with-css/
 * Description: Archive widget that is displayed in a collapsed form with CSS.
 * Author: Yossy's web service
 * Author URI: https://yws.tokyo
 * Text Domain: archive-widget-collapsed-with-css
 * Domain Path: /languages
 * Version: 1.0.1
 */


function archive_widget_collapsed_with_css_languages() {
	load_plugin_textdomain( 'archive-widget-collapsed-with-css', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'archive_widget_collapsed_with_css_languages' );

require_once 'awcwc-widget-form.php';
require_once 'awcwc-html.php';
require_once 'awcwc-css.php';
require_once 'awcwc-admin.php';

function archive_widget_collapsed_with_css_admin_style(){
	wp_enqueue_style( 'archive_widget_collapsed_with_css_admin_style', plugins_url( '/css/admin.css', __FILE__ ) );
}
add_action( 'admin_enqueue_scripts', 'archive_widget_collapsed_with_css_admin_style' );

function archive_widget_collapsed_with_css_footer(){

	echo '<style>.awcwc_wrap ul,.awcwc_wrap ul li,.awcwc_wrap ul li a{all:unset}.awcwc_wrap ul li a:after,.awcwc_wrap ul li a:before,.awcwc_wrap ul li:after,.awcwc_wrap ul li:before{display:none}.awcwc_wrap{position:relative;text-align:left}.awcwc_wrap input{cursor:pointer;margin:0;opacity:0;position:absolute;z-index:1;width:100%;height:3.2em}.awcwc_wrap input~ul{height:0;list-style-type:none;overflow:hidden;visibility:hidden;transition:.3s;opacity:0;display:block}.awcwc_wrap input:checked~ul{height:auto;padding:5px 0;visibility:visible;opacity:1}' . wp_kses_post( get_option( 'archive_widget_collapsed_with_css_style' ) ) . '</style>';

	delete_option( 'archive_widget_collapsed_with_css_style' );

}
add_action( 'wp_footer' , 'archive_widget_collapsed_with_css_footer' );
?>
