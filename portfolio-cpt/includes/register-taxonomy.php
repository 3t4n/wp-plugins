<?php
/**
 * Register Tags Taxonomy.
 *
 * @package     portfolio-cpt
 * @copyright   Copyright (c) 2018, Danny Cooper
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Register Taxonomy.
 */
function portfolio_cpt_tags() {

	$labels = array(
		'name'                       => esc_html_x( 'Tags', 'Taxonomy General Name', 'portfolio-cpt' ),
		'singular_name'              => esc_html_x( 'Tag', 'Taxonomy Singular Name', 'portfolio-cpt' ),
		'menu_name'                  => esc_html__( 'Tags', 'portfolio-cpt' ),
		'all_items'                  => esc_html__( 'All Tags', 'portfolio-cpt' ),
		'parent_item'                => esc_html__( 'Parent Tag', 'portfolio-cpt' ),
		'parent_item_colon'          => esc_html__( 'Parent Tag:', 'portfolio-cpt' ),
		'new_item_name'              => esc_html__( 'New Tag Name', 'portfolio-cpt' ),
		'add_new_item'               => esc_html__( 'Add New Tag', 'portfolio-cpt' ),
		'edit_item'                  => esc_html__( 'Edit Tag', 'portfolio-cpt' ),
		'update_item'                => esc_html__( 'Update Tag', 'portfolio-cpt' ),
		'separate_items_with_commas' => esc_html__( 'Separate tags with commas', 'portfolio-cpt' ),
		'search_items'               => esc_html__( 'Search Tags', 'portfolio-cpt' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove tags', 'portfolio-cpt' ),
		'choose_from_most_used'      => esc_html__( 'Choose from the most used tags', 'portfolio-cpt' ),
		'not_found'                  => esc_html__( 'Not Found', 'portfolio-cpt' ),
	);

	$args = array(
		'labels'            => $labels,
		'hierarchical'      => false,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => false,
	);

	register_taxonomy( 'portfolio_tag', array( 'portfolio' ), $args );

}

add_action( 'init', 'portfolio_cpt_tags', 0 );
