<?php 
/*
Plugin Name: Ap Instagram Gallery by Arrow Plugins
Plugin URI: https://wordpress.org/plugins/ap-instagram-gallery
Description: Add Responsive Instgram Gallery into your Posts, Pages & Widgets
Author: Arrow Plugins
Author URI: https://www.arrowplugins.com
Version: 1.1.1
License: GplV2
Copyright: 2019 Arrow Plugins
*/


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
define( 'igbap_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
include_once('includes/igbap-post-type.php');
include_once('includes/igbap-custom-columns.php');
include_once('includes/igbap-post-meta-boxes.php');
include_once('includes/igbap-save-post.php');


include_once('includes/igbap-shortcode.php');
include_once('includes/igbap-enqueue-scripts.php');



add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'igbap_plugin_action_links' );

function igbap_plugin_action_links( $links ) {
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'edit.php?post_type=arrow_insta_gallery') ) .'">Dashboard</a>';
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'edit.php?post_type=arrow_insta_gallery&page=igbap_form_support') ) .'">Support</a>';
   return $links;
}