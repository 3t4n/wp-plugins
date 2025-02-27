<?php
/*
Plugin Name: Casino Review
Plugin URI: http://www.flytonic.com
Description: Casino Review WordPress
Version: 2.38
Author: Flytonic
Author URI: https://www.flytonic.com/
License:GPLv2
Text Domain: casino-review
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define('CASINO_REVIEW_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );

// Localization

add_action('plugins_loaded', 'casino_review_text_domain');
function casino_review_text_domain() {
	load_plugin_textdomain( 'casino-review', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}

//---Custom meta fields

include(plugin_dir_path(__FILE__).'/includes/custom_meta_fields.php');

//---Plugin Setup

include(plugin_dir_path(__FILE__).'/includes/plugin-setup.php');

//---Add Options Page

include(plugin_dir_path(__FILE__).'/includes/options_page.php');

//---Casino Review Shortcode

include(plugin_dir_path(__FILE__).'/includes/shortcodes/shortcode.php');

//---Casino Document  

include(plugin_dir_path(__FILE__).'/includes/casino_document.php');


class casino_review_configuration {
	
	//create custom post type
	
    function __construct() {
		add_action( 'init', array( $this, 'casino_review_custom_post_type' ) );
		add_action( 'add_meta_boxes', array($this, 'casino_review_add_meta_box'));
    }
	
	function casino_review_add_meta_box() { 
		add_meta_box('casino_meta', __('Casino Review Options','casino-review'), 'casino_review_post_meta_fields', 'casino_review', 'advanced', "low");
	}
	
	function casino_review_custom_post_type() {
		
			@$args = array(
				'labels' => array(            
				'name' => __( 'Plugin Casinos' , 'casino-review'),
				'singular_name' => __( 'Casino', 'casino-review' ),
				'add_new' => __( 'Add New Casino', 'casino-review' ),
				'add_new_item' => __( 'Add New Casino', 'casino-review' ),
				'edit' => __( 'Edit Casino' , 'casino-review'),
				'edit_item' => __( 'Edit Casino', 'casino-review' ),
				'new_item' => __( 'New Casino', 'casino-review' ),
				'view' => __( 'View Casino', 'casino-review' ),
				'view_item' => __( 'View Casino' , 'casino-review'),
				'search_items' => __( 'Search Casinos' , 'casino-review'),
				'not_found' => __( 'No Casinos found', 'casino-review' ),
				'not_found_in_trash' => __( 'No Casinos found in Trash' , 'casino-review'),
				'parent' => __( 'Parent Casino' , 'casino-review'),
							),
				'public' => false,
				'show_ui' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite' => array( 'slug' => 'casino_review', 'with_front' => false ),
				'supports' => array('title','thumbnail')  
			);

			register_post_type('casino_review',$args);
			
			if ( function_exists( 'add_image_size' ) ) { 
			   add_image_size( 'casino-logo', 300, 300, false ); 
			}
    }

}

new casino_review_configuration();

?>
