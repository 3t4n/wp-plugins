<?php
/*
Plugin Name: ACF Simple Tooltip
Plugin URI: https://wordpress.org/plugins/acf-simple-tooltip/
Description: This plugin converts ACF instructions to a simple CSS-only tooltip..
Version: 1.1.1
Author: Josh Palmeri 
Author URI: http://inspirodesigns.com
License: GPLv2 or later
Copyright: Josh Palmeri
*/

function jp_simple_acf_tooltips( $hook ) {

	if ( ('post.php' != $hook && 'post-new.php' != $hook) || 
		get_post_type( get_the_ID() ) == 'acf-field-group' ) {
        return;
    }
    wp_enqueue_script( 'jp_acf_simple_tooltip_js', plugin_dir_url( __FILE__ ) . 'assets/js/simple-acf-tooltip.js', array('jquery'), '1.0' );
	wp_enqueue_style( 'jp_acf_simple_tooltip_css', plugin_dir_url( __FILE__ ) . 'assets/css/simple-acf-tooltip.css', false, null, 'screen' );
}

add_action('admin_enqueue_scripts', 'jp_simple_acf_tooltips', 20, 1);

?>