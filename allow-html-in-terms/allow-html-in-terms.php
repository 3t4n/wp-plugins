<?php
/**
 * Plugin Name: Allow Html In Terms
 * Plugin URI: https://wordpress.org/plugins/allow-html-in-terms
 * Text Domain: allow-html-in-terms
 * Description: Allow HTML in terms (category, tag) descriptions. 
 * Domain Path: /languages/
 * Version: 1.0
 * Author: Rajdip Sinha Roy
 * Author URI: https://rajdip.tech
*/



if (! defined('ABSPATH')) {
    exit;
}


/**
 * Allow HTML in term (category, tag) descriptions
 */
foreach ( array( 'pre_term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_filter_kses' );
	if ( ! current_user_can( 'unfiltered_html' ) ) {
		add_filter( $filter, 'wp_filter_post_kses' );
	}
}
 
foreach ( array( 'term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_kses_data' );
}