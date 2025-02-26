<?php
/**
 * Taxonomy Configuration File
 *
 * Package  AffiliateCoupon\Custom\Taxonomy
 * @since   1.0.0
 * @author  Mission 14
 * @link    https://couponplugin.co
 * @license GNU General Public License 2.0+
 */

namespace AffiliateCoupon\Custom\Taxonomy;

add_action( 'init', __NAMESPACE__ . '\register_custom_taxonomies' );

/**
 * Taxonomy Generator
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_custom_taxonomies() {
	register_custom_taxonomy( 'coupon', 'coupon-store', __( 'Store', 'affiliate-coupon-lite'), __( 'Stores', 'affiliate-coupon-lite') );
	register_custom_taxonomy( 'coupon', 'coupon-category', __( 'Category', 'affiliate-coupon-lite'), __( 'Categories', 'affiliate-coupon-lite') );
}
add_action( 'restrict_manage_posts', __NAMESPACE__.'\store_filter', 10, 2 );
/**
 * Store Filter In Coupon Page
 *
 * @since 1.0.3
 *
 * @return void
 */
function store_filter( $post_type, $which ) {
	if ( 'coupon' !== $post_type ) {
		return; //check to make sure this is your cpt
	}
	$taxonomy      = 'coupon-store'; // change to your taxonomy
	$selected      = isset( $_GET[ $taxonomy ] ) ? sanitize_text_field($_GET[ $taxonomy ]) : '';
	$info_taxonomy = get_taxonomy( $taxonomy );
	wp_dropdown_categories( array(
		'show_option_all' => __( "Show All {$info_taxonomy->label}" ),
		'taxonomy'        => $taxonomy,
		'name'            => $taxonomy,
		'orderby'         => 'name',
		'selected'        => $selected,
		'show_count'      => true,
		'hide_empty'      => true,
	) );
}

add_action( 'restrict_manage_posts', __NAMESPACE__.'\category_filter', 10, 2 );
/**
 * Category Filter In Coupon Page
 *
 * @since 1.0.3
 *
 * @return void
 */
function category_filter( $post_type, $which ) {
	if ( 'coupon' !== $post_type ) {
		return; //check to make sure this is your cpt
	}
	$taxonomy      = 'coupon-category'; // change to your taxonomy
	$selected      = isset( $_GET[ $taxonomy ] ) ? sanitize_text_field($_GET[ $taxonomy ]) : '';
	$info_taxonomy = get_taxonomy( $taxonomy );
	wp_dropdown_categories( array(
		'show_option_all' => __( "Show All {$info_taxonomy->label}" ),
		'taxonomy'        => $taxonomy,
		'name'            => $taxonomy,
		'orderby'         => 'name',
		'selected'        => $selected,
		'show_count'      => true,
		'hide_empty'      => true,
	) );
}

add_filter( 'parse_query', __NAMESPACE__.'\cat_in_query' );
/**
 * Category Query For Category Filter
 *
 * @since 1.0.3
 *
 * @return void
 */
function cat_in_query( $query ) {
	global $pagenow;
	$post_type = 'coupon'; // change to your post type
	$taxonomy  = 'coupon-category'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset( $q_vars['post_type'] ) && $q_vars['post_type'] == $post_type && isset( $q_vars[ $taxonomy ] ) && is_numeric( $q_vars[ $taxonomy ] ) && $q_vars[ $taxonomy ] != 0 ) {
		$term                = get_term_by( 'id', $q_vars[ $taxonomy ], $taxonomy );
		$q_vars[ $taxonomy ] = $term->slug;
	}
}

add_filter( 'parse_query', __NAMESPACE__.'\store_in_query' );
/**
 * Store Query For Store Filter
 *
 * @since 1.0.3
 *
 * @return void
 */
function store_in_query( $query ) {
	global $pagenow;
	$post_type = 'coupon'; // change to your post type
	$taxonomy  = 'coupon-store'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset( $q_vars['post_type'] ) && $q_vars['post_type'] == $post_type && isset( $q_vars[ $taxonomy ] ) && is_numeric( $q_vars[ $taxonomy ] ) && $q_vars[ $taxonomy ] != 0 ) {
		$term                = get_term_by( 'id', $q_vars[ $taxonomy ], $taxonomy );
		$q_vars[ $taxonomy ] = $term->slug;
	}
}