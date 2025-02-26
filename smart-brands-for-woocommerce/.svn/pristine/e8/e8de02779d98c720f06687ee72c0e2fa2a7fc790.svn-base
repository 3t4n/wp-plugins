<?php
/**
 * Update version.
 *
 * @package    smart_brands_for_wc
 * @subpackage smart_brands_for_wc/Admin
 * @author     ShapedPlugin <support@shapedplugin.com>
 */

update_option( 'smart_brands_version', '2.0.0' );
update_option( 'smart_brands_db_version', '2.0.0' );

/**
 * Shortcode query for id.
 */
$args = new WP_Query(
	array(
		'post_type'      => 'smart_brand_sc',
		'post_status'    => 'any',
		'posts_per_page' => 300,
	)
);

/**
 * Shortcode IDs collection
 *
 * @return object && array
 *
 * @since 1.2.0
 */
$shortcode_ids = wp_list_pluck( $args->posts, 'ID' );

if ( count( $shortcode_ids ) > 0 ) {
	foreach ( $shortcode_ids as $shortcode_key => $shortcode_id ) {
		/**
		 * Collect metadata
		 */
		$shortcode_data = get_post_meta( $shortcode_id, 'sp_smart_brand_metaboxes', true );
		if ( ! is_array( $shortcode_data ) ) {
			continue;
		}

		$old_layouts                  = isset( $shortcode_data['brand_layout_preset'] ) ? $shortcode_data['brand_layout_preset'] : 'carousel_layout';
		$old_brand_border_radius      = isset( $shortcode_data['brand_border_radius']['all'] ) ? $shortcode_data['brand_border_radius']['all'] : '0';
		$old_brand_border_radius_unit = isset( $shortcode_data['brand_border_radius']['unit'] ) ? $shortcode_data['brand_border_radius']['unit'] : '0';

		// Update main layouts.
		if ( $old_layouts ) {
			$layout_data['brand_layout_preset'] = $old_layouts;
		}

		// Update the brand border radius property.
		if ( $old_brand_border_radius ) {
			$shortcode_data['product_brand_border']['radius'] = $old_brand_border_radius;
			$shortcode_data['product_brand_border']['unit']   = $old_brand_border_radius_unit;
		}

		/**
		 * Update metadata
		 */
		update_post_meta( $shortcode_id, 'sp_smart_brand_metabox_layouts', $layout_data );
		update_post_meta( $shortcode_id, 'sp_smart_brand_metaboxes', $shortcode_data );
	}
}
