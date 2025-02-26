<?php
/**
 * Plugin Name:       Admin Bar ID Menu
 * Plugin URI:        https://github.com/efc/admin-bar-id-menu
 * Description:       Makes the ID number of the current page or post visible in the Admin Bar.
 * Version:           1.1.1
 * Requires at least: 3.1
 * Tested up to:      5.4.2
 * Requires PHP:      5.6
 * Author:            Eric Celeste
 * Author URI:        http://eric.clst.org/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

/*
Relevant WP core files:
http://core.trac.wordpress.org/browser/trunk/wp-includes/class-wp-admin-bar.php
http://core.trac.wordpress.org/browser/trunk/wp-includes/admin-bar.php

Explanation of changes for WP3.3:
http://wpdevel.wordpress.com/2011/12/07/admin-bar-api-changes-in-3-3/

For future consideration:
http://codex.wordpress.org/Plugin_API/Action_Reference/wp_before_admin_bar_render
 */

// note that this action will fire late,
// after $wp_admin_bar has been populated
add_action( 'admin_bar_menu', 'efc_admin_bar_menu', 95 );

function efc_admin_bar_menu() {
	global $wp_admin_bar;
	global $wp_version;
	global $post;

	$current_object = get_queried_object();

	// IDs live in different places for posts or taxonomy items, why?
	if ( !empty( $current_object->post_type ) ) {
		$id = $current_object->ID;
	} elseif ( !empty( $current_object->taxonomy ) ) {
		$id = $current_object->term_id;
	} elseif ( !empty( $post ) ) {
		$id = $post->ID;
	} elseif ( !empty( $_GET['tag_ID'] ) ) {
		$id = $_GET['tag_ID'];
	} else {
		$id = '';
	}

	// error_log('nodes ['.implode('][',array_keys($wp_admin_bar->get_nodes())).']'); // for debugging

	// update the menu title, which is a different process before and after WP 3.3
	if ( $wp_version >= 3.3 ) {

		if ( is_object( $node = $wp_admin_bar->get_node( 'edit' ) ) ) {
			$wp_admin_bar->add_node( [
				'id'    => 'edit',
				'title' => $node->title . " $id",
			] );
		}
		if ( is_object( $node = $wp_admin_bar->get_node( 'view' ) ) ) {
			$wp_admin_bar->add_node( [
				'id'    => 'view',
				'title' => $node->title . " $id",
			] );
		}

	} else {

		if ( is_array( $wp_admin_bar->menu->edit ) && $id ) { // is there an edit menu?
			$wp_admin_bar->menu->edit['title'] .= " $id"; // then append the id
		}

	}
}
