<?php
/**
 * Coupon Post Type
 *
 * Package  AffiliateCoupon\Custom\PostType;
 * @since   1.0.0
 * @author  Mission 14
 * @link    https://couponplugin.co
 * @license GNU General Public License 2.0+
 */

namespace AffiliateCoupon\Custom\PostType;

add_action( 'init', __NAMESPACE__ . '\register_coupon_post_type' );
/**
 * Register Custom Post Type
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_coupon_post_type() {
	$args = array(
		'label'         => __('Coupons', 'affiliate-coupon-lite'),
		'labels'        => label_generator_post_tyepe( 'coupon', __('Coupon', 'affiliate-coupon-lite'), __('Coupons', 'affiliate-coupon-lite') ),
		'show_ui'       => true,
		'menu_position' => 5,
		'rewrite'       => false,
		'supports'      => array( 'title' ),
		'menu_icon'     => 'dashicons-tickets-alt ',

	);
	register_post_type( 'coupon', $args );
}

/**
 * Custom Post Type Label Generator
 *
 * @since 1.0.0
 *
 * @param  string $post_type post type name
 * @param  string $singular_name display singular name of post type
 * @param  string $plural_name display plural name of post type
 *
 * @return array $labels
 */
function label_generator_post_tyepe( $post_type, $singular_name, $plural_name ) {
	$labels = array(
		'name'               => _x( "{$plural_name}", 'post type general name', 'affiliate-coupon-lite'),
		'singular_name'      => _x( "{$singular_name}", 'post type singular name', 'affiliate-coupon-lite'),
		'menu_name'          => _x( "{$plural_name}", 'admin menu', 'affiliate-coupon-lite'),
		'name_admin_bar'     => _x( "{$singular_name}", 'add new on admin bar', 'affiliate-coupon-lite'),
		'add_new'            => _x( 'Add New', $post_type, 'affiliate-coupon-lite'),
		'add_new_item'       => __( "Add New {$singular_name}", 'affiliate-coupon-lite'),
		'new_item'           => __( "New {$singular_name}", 'affiliate-coupon-lite'),
		'edit_item'          => __( "Edit {$singular_name}", 'affiliate-coupon-lite'),
		'view_item'          => __( "View {$singular_name}", 'affiliate-coupon-lite'),
		'all_items'          => __( "All {$plural_name}", 'affiliate-coupon-lite'),
		'search_items'       => __( "Search {$plural_name}", 'affiliate-coupon-lite'),
		'parent_item_colon'  => __( "Parent {$plural_name}:", 'affiliate-coupon-lite'),
		'not_found'          => __( "No {$plural_name} found", 'affiliate-coupon-lite'),
		'not_found_in_trash' => __( "No {$plural_name} found in Trash", 'affiliate-coupon-lite')
	);

	return $labels;

}
