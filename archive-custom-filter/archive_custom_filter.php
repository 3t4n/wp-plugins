<?php
/**
 * @package archive_custom_filter
 * @version 1.0.0
 * @licence GPLv2
 */

/*
Plugin Name: Archive Custom Filter
Plugin URI: 
Description: This plugin is for Accepts 'daily', 'weekly', 'monthly', 'yearly', 'postbypost', or 'alpha'. Both 'postbypost' and 'alpha' display the same archive link
Tags: Query, Filter Years, Post Filter, Archives Filter, Query Custom Postype
Author: Hassanal S. Aguam
Version: 1.0.0
Author URI: https://www.linkedin.com/in/hash-salacop-0a0196100/
Requires at least: 5.3
Tested up to:  5.5
Stable tag: 1.0
Version: 1.0
Requires PHP: 7.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

// ENQUEE JS SCRIPTS
function archive_custom_filter_enquee() {   
     wp_enqueue_script( 'archive.js',plugin_dir_url( __FILE__ ) .'js/archive.js', array('jquery'));
}

add_action('wp_footer', 'archive_custom_filter_enquee');


  function archive_custom_filter($atts) {
	ob_start();
	$args =shortcode_atts( array(
			'type'            => '',
			'limit'           => '',
			'format'          => 'option', 
			'before'          => '',
			'after'           => '',
			'show_post_count' => false,
			'echo'            => 1,
			'order'           => 'DESC',
	        'post_type'     => ''
	),$atts );
  $years = wp_get_archives($args);
  $years = ob_get_clean();
  $dataselect = sprintf('<select id = "yearsdata">'.$years.'</select>');
  ob_flush();

    return $dataselect;
}
add_shortcode('archive', 'archive_custom_filter');

// [archive type = "yearly" post_type = "post"]