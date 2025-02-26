<?php /**
 * @package AIM_Style_Vault
 * @version 1.0.0
*/
/*
Plugin Name: AIM Style Vault
Plugin URI: http://aimbiz.com/aim-style-vault/
Description: Adds a dynamic stylesheet and custom post type for creating and saving persistent custom theme CSS.
License: GPLv2 or later
Author: Scott Pelland
Version: 1.0.0
Author URI: http://aimbiz.com


This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

Changelog:
Date: 5/29/13	
*/

/*  plugin functions added below this line */
if(function_exists('aim_style_vault')) {
	aim_style_vault();
}

function aim_style_vault() {	

if(!function_exists('create_asv_types')) {
add_action('init','create_asv_types' );
}

function create_asv_types() {
/* Register "AIM Style Vault" custom post type */

	$labels = array(
		'name' => _( 'AIM Style Vault' ), 
		'singular_name' => _( 'Custom Style' ),
		'add_new' => _( 'Add New' ),
		'add_new_item' => __( 'Add New Custom Style' ),
		'edit_item' => __( 'Edit Custom Style' ),
		'new_item' => __( 'New Custom Style' ),
		'view_item' => __( 'View Custom Style' ),
		'search_items' => __( 'Search Custom Styles' ),
		'not_found' =>  __( 'No Custom Styles found' ),
		'not_found_in_trash' => __( 'No Custom Styles found in Trash' ),
	);

	$args = array( 'labels' => $labels, /* NOTICE: the $labels variable is used here... */
	'public' => true,
	'show_ui' => true, // UI in admin panel
	'_builtin' => false, // It's a custom post type, not built in!
	'_edit_link' => 'post.php?post=%d',
	'capability_type' => 'post',
    'capabilities' => array(
        'publish_posts' => 'manage_options',
        'edit_posts' => 'manage_options',
        'edit_others_posts' => 'manage_options',
        'delete_posts' => 'manage_options',
        'delete_others_posts' => 'manage_options',
        'read_private_posts' => 'manage_options',
        'edit_post' => 'manage_options',
        'delete_post' => 'manage_options',
        'read_post' => 'manage_options',
    ),	
	'hierarchical' => false,
	'has_archives' => false,
	'exclude_from_search' => true,
	'publicly_queryable' => false,
    'menu_position' => 45,
	'rewrite' => array("slug" => "aim_style_vault"), // Permalinks format
	'supports' => array('title')
);
register_post_type( 'aim_style_vault', $args ); 
/* End AIM Style Vault Registration  */
}


// add metabox for stylesheets	
	include_once(plugin_dir_path(__FILE__) . 'aim_metabox.php');
	
// compress CSS and add to head	
	include_once(plugin_dir_path(__FILE__) . 'asv-styles.php'); 	
	
	
// Browser Detection to extend body class
add_filter('body_class','asv_browser_body_class'); 

function asv_browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';
	return $classes;
	}	
}