<?php 

/*
Plugin Name: Page Edit Toolbar
Plugin URI: http://www.endocreative.com
Description: Adds most recently edited pages to the WordPress Toolbar for easy access
Version: 1.2
Author: Endo Creative
Author URI: http://www.endocreative.com
*/

add_action( 'admin_bar_menu', 'page_admin_bar_function', 999 );

function page_admin_bar_function( $wp_admin_bar ) {

	// parent page
	$args = array(
		'id' => 'page_list',
		'title' => 'Page List',
		'href' => home_url() . '/wp-admin/edit.php?post_type=page'
	);
	$wp_admin_bar->add_node( $args );

	// get list of pages
	$pages = recently_edited_pages();

	// loop through up to 15git  most recently modified pages
	foreach( $pages as $page ) {

		// add child nodes (pages to edit)
		$args = array(
			'id' => 'page_item_' . $page->ID,
			'title' => $page->post_title,
			'parent' => 'page_list',
			'href' => home_url() . '/wp-admin/post.php?post=' . $page->ID . '&action=edit'
		);
		$wp_admin_bar->add_node( $args );

	}

}

function recently_edited_pages() {

	$args = array(
		'number' => 15,
		'sort_column' => 'post_modified',
		'sort_order' => 'desc'
	);

	$pages = get_pages( $args );

	return $pages;
	
}