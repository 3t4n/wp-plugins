<?php

/**
 * Products class file
 */

if( !defined( 'ABSPATH' ) ) {
	exit;
}

if( !class_exists( 'LDASH_Products' ) ) {

	/**
	 * Products
	 *
	 * Retrieval of data related to products
	 *
	 * @package LightningDashboard/Classes
	 * @since   1.0.0
	 */

	class LDASH_Products {

		/**
		 * Get all product categories
		 *
		 * @since 1.0.0
		 * @return array Product categories
		 */

		public static function categories() {

			$args = array(
				'taxonomy'			=> "product_cat",
				'orderby'           => 'name', 
				'order'             => 'ASC',
				'hide_empty'        => false, 
				'fields'            => 'all',
				'parent'            => 0,
				'hierarchical'      => true,
				'child_of'          => 0,
				'pad_counts'        => false,
			);

			$categories = get_terms( $args );

			return $categories;

		}

		/**
		 * Return all product ids
		 *
		 * @since 1.0.0
		 * @param string $option Option to get product IDs by
		 * @return array Product ids
		 */

		public function ids( $option ) {

			global $wpdb;

			$product_ids = array();

			if( $option == 'all-inc-variations' )  {

				$post_ids = $wpdb->get_results( "SELECT ID FROM {$wpdb->prefix}posts WHERE post_type IN( 'product', 'product_variation' ) AND post_status != 'auto-draft'" );

			} else {

				$post_ids = $wpdb->get_results( "SELECT ID FROM {$wpdb->prefix}posts WHERE post_type = 'product' AND post_status != 'auto-draft'" );
			
			}

			if( !empty( $post_ids ) ) {

				foreach( $post_ids as $post_id ) {

					$product_ids[] = $post_id->ID;

				}

			}

			return $product_ids;

		}

		/**
		 * Return if product is on sale
		 *
		 * @since 1.0.0
		 * @param int $product_id Product ID
		 * @return bool
		 */

		public static function on_sale( $product_id ) {

			$regular_price = get_post_meta( $product_id, '_regular_price', true );
			$sale_price = get_post_meta( $product_id, '_sale_price', true );
			$sale_price_from = get_post_meta( $product_id, '_sale_price_dates_from', true );
			$sale_price_to = get_post_meta( $product_id, '_sale_price_dates_to', true );

			if( !empty( $sale_price ) && $sale_price < $regular_price ) {

				$on_sale = true;

				if( !empty( $sale_price_from ) && $sale_price_from > current_time( 'timestamp', true ) ) {

					$on_sale = false;

				}

				if( !empty( $sale_price_to ) && $sale_price_to < current_time( 'timestamp', true ) ) {

					$on_sale = false;

				}

			} else {

				$on_sale = false;

			}

			return $on_sale;

		}

		/**
		 * Gets a product's type
		 *
		 * @since 1.0.0
		 * @param int $product_id Product ID
		 * @return string Product type
		 */

		public static function type( $product_id ) { // static as called from other classes

			global $wpdb;

			if( get_post_type( $product_id ) == 'product_variation' ) {

				$product_type = 'variation';

			} else {

				$product_type = $wpdb->get_results( "
				SELECT terms.slug FROM {$wpdb->prefix}posts AS posts
				INNER JOIN {$wpdb->prefix}term_relationships AS term_relationships ON posts.ID = term_relationships.object_id
				INNER JOIN {$wpdb->prefix}term_taxonomy AS term_taxonomy ON term_relationships.term_taxonomy_id = term_taxonomy.term_taxonomy_id
				INNER JOIN {$wpdb->prefix}terms AS terms ON term_taxonomy.term_id = terms.term_id
				WHERE term_taxonomy.taxonomy = 'product_type' AND posts.ID = '$product_id'
				" );

				$product_type = $product_type[0]->slug;

			}

			return $product_type;

		}

		/**
		 * Get all product types
		 *
		 * @since 1.0.0
		 * @return array Product types
		 */

		public static function types() {

			$product_types = wc_get_product_types();
			$product_types['variation'] = 'Variation product'; // Added on

			return $product_types;

		}

		/**
		 * Get all product statuses
		 *
		 * @since 1.0.0
		 * @return array Product statuses
		 */

		public static function statuses() {

			return array(
				'publish' => __( 'Published', 'lightning-dashboard' ),
				'pending' => __( 'Pending Review', 'lightning-dashboard' ),
				'draft' => __( 'Draft', 'lightning-dashboard' ),
				'trash' => __( 'Trash', 'lightning-dashboard' )
			);

		}

		/**
		 * Get all stock statuses registered in WooCommerce
		 *
		 * @since 1.0.0
		 * @return array Stocks statuses
		 */

		public static function stock_statuses() {

			return wc_get_product_stock_status_options();

		}

	}

	new LDASH_Products();

}