<?php
/**
 * Plugin generic functions file
 *
 * @package App Mockups Carousel
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Escape Tags & Slashes
 *
 * Handles escapping the slashes and tags
 *
 * @package App Mockups Carousel
 * @since 1.0.0
 */
function wp_amc_esc_attr($data) {
    return esc_attr( stripslashes($data) );
}

/**
 * Strip Slashes From Array
 *
 * @package App Mockups Carousel
 * @since 1.0.0
 */
function wp_amc_slashes_deep($data = array(), $flag = false) {
  
    if($flag != true) {
        $data = wp_amc_nohtml_kses($data);
    }
    $data = stripslashes_deep($data);
    return $data;
}

/**
 * Strip Html Tags 
 * 
 * It will sanitize text input (strip html tags, and escape characters)
 * 
 * @package App Mockups Carousel
 * @since 1.0.0
 */

function wp_amc_nohtml_kses($data = array()) {
  
  if ( is_array($data) ) {
    
    $data = array_map('wp_amc_nohtml_kses', $data);
    
  } elseif ( is_string( $data ) ) {
    $data = trim( $data );
    $data = wp_filter_nohtml_kses($data);
  }
  
  return $data;
}

/**
 * Function to unique number value
 * 
 * @package App Mockups Carousel
 * @since 1.0.0
 */
function wp_amc_get_unique() {
	static $unique = 0;
	$unique++;

	return $unique;
}

/**
 * Function to add array after specific key
 * 
 * @package App Mockups Carousel
 * @since 1.0.0
 */
function wp_amc_add_array(&$array, $value, $index, $from_last = false) {
    
    if( is_array($array) && is_array($value) ) {

        if( $from_last ) {
            $total_count    = count($array);
            $index          = (!empty($total_count) && ($total_count > $index)) ? ($total_count-$index): $index;
        }
        
        $split_arr  = array_splice($array, max(0, $index));
        $array      = array_merge( $array, $value, $split_arr);
    }
    
    return $array;
}

/**
 * Function to get registered post types
 * 
 * @package App Mockups Carousel
 * @since 1.0.0
 */
function wp_amc_get_post_types() {
	
	// Getting registered post type
	$post_type_args = array(
		'public' => true
	);
	$custom_post_types = get_post_types($post_type_args);
	$custom_post_types = (!empty($custom_post_types) && is_array($custom_post_types)) ? array_keys($custom_post_types) : array();
	
	// Exclude some post type
	$include_post_types = apply_filters('wp_amc_gallery_support', array(WP_AMC_POST_TYPE));
	$custom_post_types = array_merge($custom_post_types, (array)$include_post_types);
	
	// Exclude some post type
	$exclude_post_types = apply_filters('wp_amc_gallery_support', array('attachment'));
	$custom_post_types = array_diff($custom_post_types, (array)$exclude_post_types);
	
	return $custom_post_types;
}