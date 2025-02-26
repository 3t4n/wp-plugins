<?php

/**
 * @link              Codeway.ir
 * @since             1.0.0
 * @package           Post_Count_Shortcode
 *
 * @wordpress-plugin
 * Plugin Name:       Post count shortcode
 * Plugin URI:        
 * Description:       Show post count with shortcode.
 * Version:           1.3
 * Author:            Codeway.ir
 * Author URI:        http://Codeway.ir
 * License:           FS
 * License URI:       http://Codeway.ir/license
 * Text Domain: pcs
 * Domain Path: /languages
 * */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {

	die;

}

add_action( 'admin_init', 'pcs_load_textdomain' );
 

/**
 * Load plugin textdomain.
 */
function pcs_load_textdomain() {

	load_plugin_textdomain( 'post-count-shortcode', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
  
}

if( is_admin() ){

	define ( 'PCS_DIR', plugin_dir_path( __FILE__ ) .'/');

	require_once( PCS_DIR .'option-page/option-page.php');

}

add_action( 'init' , 'post_count_shortcode_init');

function post_count_shortcode_init(){

	add_shortcode( 'show_post_count', 'show_post_count_shortcode_output');

}

function show_post_count_shortcode_output( $output ){

	$post_count = wp_count_posts();

	$post_count_published = $post_count->publish;

	$post_count_published_integer = intval($post_count_published);

	$output = '';

	$output .= '<div>';

	$output .= $post_count_published_integer;

	$output .= '</div>';

	return $output;

}