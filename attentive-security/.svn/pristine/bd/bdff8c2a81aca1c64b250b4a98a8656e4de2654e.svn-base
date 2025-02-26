<?php
/**
 * @package Attentive
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// wordpress version hide active deactive option 
$active = get_option('attwsp_option_name');
if($active){
if( $active['hidewpv_active'] ){
	// wordpress version from wp header content
	remove_action('wp_head', 'wp_generator');
	
	// filter hook
	add_filter('the_generator', 'attwsp_remove_version');
	add_filter( 'script_loader_src', 'attwsp_remove_wp_version_strings' );
	add_filter( 'style_loader_src', 'attwsp_remove_wp_version_strings' );	
}
}

// wordpress version remove from rrs feed
function attwsp_remove_version() {
	return '';
}

//Hide WP version strings from scripts and styles
function attwsp_remove_wp_version_strings( $src ) {
     global $wp_version;
     parse_str(parse_url($src, PHP_URL_QUERY), $query);
     if ( !empty($query['ver']) && $query['ver'] === $wp_version ) {
          $src = remove_query_arg('ver', $src);
     }
     return $src;
}



