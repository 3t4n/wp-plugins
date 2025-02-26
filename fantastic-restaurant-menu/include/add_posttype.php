<?php

//Register custom post type
function fantasticmenu_post_type() {

	$labels = array(
	    'name' => __('Restaurant Menu', 'fantasticmenu-menu'),
	    'singular_name' => __('Restaurant Menu', 'fantasticmenu-menu'),
	    'menu_name' => __('Restaurant Menus', 'giraffe_pricing_table'),
	    'name_admin_bar' => __('Restaurant Menu', 'giraffe_pricing_table'),
	    'all_items' => __('All Restaurant Menus', 'fantasticmenu-menu'),
	    'add_new' => __('Add New', 'fantasticmenu-menu'),
	    'add_new_item' => __('Add New Restaurant Menu', 'fantasticmenu-menu'),
	    'edit_item' => __('Edit Restaurant Menu', 'fantasticmenu-menu'),
	    'new_item' => __('New Restaurant Menu', 'fantasticmenu-menu'),
	    'view_item' => __('View Restaurant Menu', 'fantasticmenu-menu'),
	    'search_items' => __('Search Restaurant Menus', 'fantasticmenu-menu'),
	    'not_found' =>  __('No Restaurant Menus found', 'fantasticmenu-menu'),
	    'not_found_in_trash' => __('No Restaurant Menus found in Trash', 'fantasticmenu-menu'),
	    'parent_item_colon' => '',
	  );

  	$args = array(
	    'labels' => $labels,
	    'public' => false,
	    'exclude_from_search' => true,
	    'publicly_queryable' => false,
	    'show_ui' => true, 
	    'show_in_nav_menu' => true, 
	    'show_in_menu' => true, 
	    'query_var' => false,
	    'rewrite' => array( 'slug' => 'fantasticmenu-menu' ),
	    'capability_type' => 'post',
	    'has_archive' => false, 
	    'hierarchical' => false,
	    'menu_position' => 10,
	    'menu_icon' => 'dashicons-image-filter',
	    'supports' => array( 'title', 'revisions'),
  	); 

  	
	$table = $GLOBALS['wpdb']->posts;
	$existing_menus = $GLOBALS['wpdb']->get_results(
		"
		SELECT *
		FROM $table
		WHERE post_type = 'fantasticmenu_menu'
		"
	);

  	if(count($existing_menus) > 0)
  	{
		if ( version_compare( $GLOBALS['wp_version'], '4.5', '<' ) ) {
	    	$args['capabilities'] = array('create_posts' => false ); // false < WP 4.5, credit @Ewout
	    }else{
	    	$args['capabilities'] = array('create_posts' => 'do_not_allow' ); // false < WP 4.5, credit @Ewout
	    }

  		$args['map_meta_cap'] = true; // Set to `false`, if users are not allowed to edit/delete existing posts
  	}

  	/******************* End of code for basic version only *******************/

	register_post_type( 'fantasticmenu_menu', $args);

}
add_action( 'init', 'fantasticmenu_post_type');


// customize UI interaction messages
function fantasticmenu_updated_interaction_messages( $messages ) {
	global $post, $post_ID;
	$messages['fantasticmenu_menu'] = array(
		0 => '', 
		1 => sprintf( __('Restaurant Menu saved. Please use the shortcode to publish the menu in the page', 'fantasticmenu-menu'), esc_url( get_permalink($post_ID) ) ),
		2 => __('Restaurant Menu updated.', 'fantasticmenu-menu'),
		3 => __('Restaurant Menu deleted.', 'fantasticmenu-menu'),
		4 => __('Restaurant Menu saved.', 'fantasticmenu-menu'),
		5 => isset($_GET['revision']) ? sprintf( __('Restaurant Menu restored to revision from %s', 'fantasticmenu-menu'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Restaurant Menu saved. Please use the shortcode to publish the menu in the page', 'fantasticmenu-menu'), esc_url( get_permalink($post_ID) ) ),
		7 => __('Restaurant Menu saved.', 'fantasticmenu-menu'),
		//8 => sprintf( __('Restaurant Menu submitted. <a target="_blank" href="%s">Preview Restaurant Menu</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		8 => __('Restaurant Menu submitted.', 'fantasticmenu-menu'),
		9 => sprintf( __('Restaurant Menu scheduled for: <strong>%1$s</strong>.', 'fantasticmenu-menu'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => __('Restaurant Menu saved.', 'fantasticmenu-menu'),
	);
	return $messages;
}
add_filter( 'post_updated_messages', 'fantasticmenu_updated_interaction_messages' );

//activation
function fantasticmenu_rewrite_flush() {
    fantasticmenu_post_type();
    flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'fantasticmenu_rewrite_flush()' );


function fantasticmenu_deactivation()
{
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'fantasticmenu_deactivation' );