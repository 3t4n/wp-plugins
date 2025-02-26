<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Booknow_Backend {
	function __construct(){
		add_action('admin_enqueue_scripts', array($this,'add_lib'));
	}
	function add_lib() {
        $ver = "1.0.1";
        wp_enqueue_style('select2', BOOKNOW_PLUGIN_URL."backend/libs/select2/css/select2.min.css",array(),"4.1.0");   
        wp_enqueue_style('booknow', BOOKNOW_PLUGIN_URL."backend/css/booknow_backend.css",array(),$ver);   
        wp_enqueue_script('select2', BOOKNOW_PLUGIN_URL."backend/libs/select2/js/select2.min.js",array("jquery"),$ver);
        wp_enqueue_script('chart', "https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js",array("jquery"),$ver);
        wp_enqueue_script('booknow', BOOKNOW_PLUGIN_URL."backend/js/booknow_backend.js",array("jquery","wp-color-picker","select2","chart"),$ver);
        wp_enqueue_script('wp-color-picker');
    	wp_enqueue_style('wp-color-picker');
    }
}
new Booknow_Backend;