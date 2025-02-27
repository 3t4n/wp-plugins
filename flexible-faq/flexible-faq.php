<?php
/**
 * Plugin Name: Flexible FAQ
 * Plugin URI: http://www.wpsnippet.com
 * Description: A very flexible plugin to manage your FAQ using shortcodes
 * Version: 0.1
 * Author: S. Bage
 * Author URI: http://www.wpsnippet.com
 * License: GPLv2 or later
 */
 
define( 'ROOT', plugins_url( '', __FILE__ ) );
define( 'IMAGES', ROOT . '/images/' );
define( 'STYLES', ROOT . '/css/' );
define( 'SCRIPTS', ROOT . '/js/' );
define( 'THEME', get_stylesheet_directory() );
define( 'THEMEURI', get_stylesheet_directory_uri() );

/*------------------------ Add necessary styles and scripts --------------------------*/
function flfaq_admin_script_style( $hook ) {
	global $post_type;
	if ( 'edit.php' == $hook && 'faq' == $post_type ) {
		wp_enqueue_script('page-ordering', SCRIPTS . 'page-resorting.js', array( 'jquery-ui-sortable' ), '0.1', true);
        wp_enqueue_style('flfaq-admin', STYLES . 'flexible-faq-admin.css',  false, '0.1', 'all');
    }
}
add_action( 'admin_enqueue_scripts', 'flfaq_admin_script_style' );

function flfaq_style_script() {
	if(file_exists(THEME . '/flexible-faq.css')) {
		wp_enqueue_style('flexible-faq', THEMEURI . '/flexible-faq.css', false, '0.1', 'all');
	} else {
		wp_enqueue_style('flexible-faq', STYLES . 'flexible-faq.css', false, '0.1', 'all');
	}
	wp_enqueue_script('flexible-faq', SCRIPTS . 'flexible-faq.js', array( 'jquery'), '0.1', true);
}
add_action( 'wp_enqueue_scripts', 'flfaq_style_script' );

/*------------------------ Register FAQ post type --------------------------*/

function flfaq_custom_post_type() {
	$labels = array(
		'name'                  =>   __( 'FAQ', 'flfaq' ),
		'singular_name'         =>   __( 'FAQ', 'flfaq' ),
		'add_new_item'          =>   __( 'Add New FAQ', 'flfaq' ),
		'all_items'             =>   __( 'All FAQ', 'flfaq' ),
		'edit_item'             =>   __( 'Edit FAQ', 'flfaq' ),
		'new_item'              =>   __( 'New FAQ', 'flfaq' ),
		'view_item'             =>   __( 'View FAQ', 'flfaq' ),
		'not_found'             =>   __( 'No FAQ Found', 'flfaq' ),
		'not_found_in_trash'    =>   __( 'No FAQ Found in Trash', 'flfaq' )
	);
	$args = array(
		'label'         =>   __( 'FAQ', 'flfaq' ),
		'labels'        =>   $labels,
		'description'   =>   __( 'A list of faq', 'flfaq' ),
		'public'        =>   true,
		'show_in_menu'  =>   true,
		'menu_icon'     =>   'dashicons-editor-help',
		'has_archive'   =>   true,
		'rewrite'       =>   true,
		'hierarchical'	=>	 true,
		'supports'      =>   array('title', 'editor')
	);
	register_taxonomy('faq-category','faq',array(
		'hierarchical' => true, 
		'label' =>  __('Categories','flfaq'), 
		'singular_label' =>  __('Category','flfaq'), 
		'rewrite' => true,
		'query_var' => true
	));
	
	register_post_type( 'faq', $args );
}
add_action( 'init', 'flfaq_custom_post_type' );

/*------------------------ Custom Columns --------------------------*/

function flfaq_custom_columns_head( $defaults ) {
	unset( $defaults['date'] );
	$defaults['faq_category'] = __( 'Category', 'flfaq' );
	$defaults['faq_id'] = __( 'FAQ ID', 'flfaq' );
	return $defaults;
}
add_filter( 'manage_edit-faq_columns', 'flfaq_custom_columns_head', 10 );

function flfaq_custom_columns_content( $column_name ) {
    if ( 'faq_category' == $column_name ) {
    	global $post;
    	echo get_the_term_list($post->ID, 'faq-category', '', ', ','');
    }
    if ( 'faq_id' == $column_name ) {
    	global $post;
    	echo $post->ID;
    }
}
add_action( 'manage_faq_posts_custom_column', 'flfaq_custom_columns_content', 10, 2 );

/*------------------------ Labels --------------------------*/

function change_flfaq_title( $title ){
     $screen = get_current_screen();
     if  ( 'faq' == $screen->post_type ) {
          $title = 'Question';
     }
     return $title;
}
add_filter('enter_title_here', 'change_flfaq_title' );

/*------------------------ Include additional files --------------------------*/

include( 'inc/shortcodes.php' );
include( 'inc/reorder.php' );

/*------------------------ Flush rewrite rules --------------------------*/

function flfaq_activation_callback() {
    flfaq_custom_post_type();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'flfaq_activation_callback' );