<?php
/**
 * Custom View Count
 *
 * @package momoacg
 */
class MoMo_ACGWC_View_Count {
	/**
	 * Increment the product views count and store the date.
	 *
	 * @param int $product_id The product ID.
	 */
	public static function increment_views_count( $product_id ) {
		$views_count = (int) get_post_meta( $product_id, 'momo_views_count', true );

		$views_count++;

		$view_date = gmdate( 'Y-m-d' );

		update_post_meta( $product_id, 'momo_views_count', $views_count );
		update_post_meta( $product_id, 'momo_view_date', $view_date );
	}

	/**
	 * Retrieve the views count for a product.
	 *
	 * @param int $product_id The product ID.
	 * @return int The product views count.
	 */
	public static function get_views_count( $product_id ) {
		return (int) get_post_meta( $product_id, 'momo_views_count', true );
	}

	/**
	 * Retrieve the last view date for a product.
	 *
	 * @param int $product_id The product ID.
	 * @return string The last view date.
	 */
	public static function get_view_date( $product_id ) {
		return get_post_meta( $product_id, 'momo_view_date', true );
	}

	/**
	 * Retrieve the total sales for a product.
	 *
	 * @param int $product_id The product ID.
	 * @return int The total sales for the product.
	 */
	public static function get_sales_count( $product_id ) {
		return (int) get_post_meta( $product_id, 'total_sales', true );
	}

	/**
	 * Retrieve other product meta information (custom).
	 *
	 * @param int    $product_id The product ID.
	 * @param string $meta_key The meta key.
	 * @return mixed The value of the meta key.
	 */
	public static function get_meta_data( $product_id, $meta_key ) {
		return get_post_meta( $product_id, $meta_key, true );
	}

	/**
	 * Update product meta.
	 *
	 * @param int    $product_id The product ID.
	 * @param string $meta_key The meta key.
	 * @param mixed  $meta_value The value to store.
	 */
	public static function update_meta_data( $product_id, $meta_key, $meta_value ) {
		update_post_meta( $product_id, $meta_key, $meta_value );
	}

	/**
	 * Track product views when the page loads and store the view date.
	 */
	public static function track_product_views() {
		if ( is_product() ) {
			global $post;
			$product_id = $post->ID;
			self::increment_views_count( $product_id );
		}
	}

	/**
	 * Register the wp_head hook to track views.
	 */
	public static function register_hooks() {
		add_action( 'wp_head', array( __CLASS__, 'track_product_views' ) );
	}
}
MoMo_ACGWC_View_Count::register_hooks();
