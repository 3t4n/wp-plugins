<?php
/**
* AD functions
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function astro_enqueue_assets(){
    if( is_single() && get_post_type() == 'astro' && !wp_script_is( 'lightbox', 'enqueued' ) )
        wp_enqueue_script( 'lightbox', plugin_dir_url( __FILE__ ) . 'assets/js/lightbox.min.js', array(), '1.0.0', true );
    wp_enqueue_style( 'astro', plugin_dir_url( __FILE__ ) . 'assets/css/astro.min.css' );
}
add_action('wp_enqueue_scripts', 'astro_enqueue_assets');

function astro_get_attachment_id_from_src ($image_src) {
  	global $wpdb;
  	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
  	$id = $wpdb->get_var($query);
  	return $id;
}