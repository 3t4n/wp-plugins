<?php

/*
 *
 * @wordpress-plugin
 * Plugin Name:       Add Categories to Pages
 * Description:       With this plugin you can finally add categories to pages.
 * Version:           0.1
 * Author:            Christos Gamvroulas
 * Author URI:        https://profiles.wordpress.org/christosgam/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 *
 */

function ADCTPAG_add_categories_to_pages() {
	register_taxonomy_for_object_type( 'category', 'page' );
} 
//Add categories to pages on the initialization of WordPress.
add_action( 'init', 'ADCTPAG_add_categories_to_pages' );

function ADCTPAG_show_the_categories($wp_query) {
	if ($wp_query->is_category()) $wp_query->set('post_type', 'any');
}
//Show your page in the category archive.
add_action( 'pre_get_posts', 'ADCTPAG_show_the_categories' );

?>