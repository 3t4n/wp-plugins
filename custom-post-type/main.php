<?php
/*
Plugin Name: Custom Post Type
Description: Custom Post Type to create new post type.
Tags: Custom Post Type, post, type, slug
Author URI: http://www.fragtopgaver.dk 
Author: Kjeld Hansen
Text Domain: custom-post-type
Requires at least: 4.0
Tested up to: 4.6
Version: 1.0
*/


 if ( ! defined( 'ABSPATH' ) ) exit; 
add_action('admin_menu','cupt_custom_post_admin_menu');
function cupt_custom_post_admin_menu() { 
    add_menu_page(
		"Custom Post",
		" Post Type",
		8,
		__FILE__,
		"cupt_custom_post_admin_menu_list",
		plugins_url( 'images/plugin-icon.png', __FILE__) 
	); 
}

function cupt_custom_post_admin_menu_list(){
	wp_enqueue_script( 'ricf_script', plugin_dir_url( __FILE__ ) . 'js/ricf.js' );
	include 'cupta-dmin.php';
}

add_action( 'admin_enqueue_scripts', 'cuptf_custom_post_admin_css' );
function cuptf_custom_post_admin_css(){
	wp_register_style( 'cuptf_custom_post_admin_wp_admin_css', plugins_url( '/css/admin.css', __FILE__), false, '1.0.0' );
    wp_enqueue_style( 'cuptf_custom_post_admin_wp_admin_css' );	
}

add_action( 'init', 'codex_cupt_custom_post_type_init' );
function codex_cupt_custom_post_type_init() {
	
	if(get_option( 'cuptf_custom_post_opt' )){
		$cuptf_custom_posts_disp = unserialize(get_option( 'cuptf_custom_post_opt' ));
			if($cuptf_custom_posts_disp && sizeof($cuptf_custom_posts_disp)>0){
			foreach($cuptf_custom_posts_disp as $cuptf_custom_post_disp){
				if($cuptf_custom_post_disp)
				foreach($cuptf_custom_post_disp as $slug=>$field){
					
					$cuptslug = $field['type'];
					$cuptsing = $field['ph'];
					$cuptplu = $field['label'];
					
					$labels = array(
						'name'               => _x( $cuptplu, 'post type general name', 'custom-post-type'.$cuptslug ),
						'singular_name'      => _x( $cuptsing, 'post type singular name', 'custom-post-type'.$cuptslug ),
						'menu_name'          => _x( $cuptplu, 'admin menu', 'custom-post-type'.$cuptslug ),
						'name_admin_bar'     => _x( $cuptsing, 'add new on admin bar', 'custom-post-type'.$cuptslug ),
						'add_new'            => _x( 'Add New', 'cupt'.$cuptslug, 'custom-post-type'.$cuptslug ),
						'add_new_item'       => __( 'Add New '.$cuptsing, 'custom-post-type'.$cuptslug ),
						'new_item'           => __( 'New '.$cuptsing, 'custom-post-type'.$cuptslug ),
						'edit_item'          => __( 'Edit '.$cuptsing, 'custom-post-type'.$cuptslug ),
						'view_item'          => __( 'View '.$cuptsing, 'custom-post-type'.$cuptslug ),
						'all_items'          => __( 'All '.$cuptplu, 'custom-post-type'.$cuptslug ),
						'search_items'       => __( 'Search '.$cuptplu, 'custom-post-type'.$cuptslug ),
						'parent_item_colon'  => __( 'Parent '.$cuptplu.':', 'custom-post-type'.$cuptslug ),
						'not_found'          => __( 'No '.$cuptplu.' found.', 'custom-post-type'.$cuptslug ),
						'not_found_in_trash' => __( 'No '.$cuptplu.' found in Trash.', 'custom-post-type'.$cuptslug )
					);
				
					$args = array(
						'labels'             => $labels,
						'description'        => __( 'Description.', 'custom-post-type'.$cuptslug ),
						'public'             => true,
						'publicly_queryable' => true,
						'show_ui'            => true,
						'show_in_menu'       => true,
						'query_var'          => true,
						'rewrite'            => array( 'slug' => 'cupt'.$cuptslug ),
						'capability_type'    => 'post',
						'has_archive'        => true,
						'hierarchical'       => false,
						'menu_position'      => null,
						'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
					);
				
					register_post_type( 'cupt'.$cuptslug, $args );
					
					
				}
			}
		}
	}
	
}
