<?php
/**
 * Product related events
 *
 * @package super-payments
 */

/**
 * Get common product properties.
 *
 * @param WC_Product $product Product object.
 *
 * @return array
 */
function wcsp_get_product_properties( $product ) {
	return [
		'name'              => $product->get_name(),
		'type'              => $product->get_type(),
		'status'            => $product->get_status(),
		'featured'          => $product->get_featured(),
		'catalogVisibility' => $product->get_catalog_visibility(),
		'description'       => $product->get_description(),
		'shortDescription'  => $product->get_short_description(),
		'sku'               => $product->get_sku(),
		'price'             => $product->get_price(),
		'regularPrice'      => $product->get_regular_price(),
		'salePrice'         => $product->get_sale_price(),
		'dateCreated'       => $product->get_date_created() ? $product->get_date_created()->date( DATE_ISO8601 ) : null,
		'dateModified'      => $product->get_date_modified() ? $product->get_date_modified()->date( DATE_ISO8601 ) : null,
		'virtual'           => $product->is_virtual(),
		'downloadable'      => $product->is_downloadable(),
		'manageStock'       => $product->get_manage_stock(),
		'stockQuantity'     => $product->get_stock_quantity(),
		'stockStatus'       => $product->get_stock_status(),
		'backorders'        => $product->get_backorders(),
		'soldIndividually'  => $product->get_sold_individually(),
		'weight'            => $product->get_weight(),
		'length'            => $product->get_length(),
		'width'             => $product->get_width(),
		'height'            => $product->get_height(),
		'reviewsAllowed'    => $product->get_reviews_allowed(),
		'averageRating'     => $product->get_average_rating(),
		'reviewCount'       => $product->get_review_count(),
		'parentId'          => $product->get_parent_id(),
		'purchaseNote'      => $product->get_purchase_note(),
		'categories'        => array_map(
			function( $term ) {
				return [
					'id'   => $term->term_id,
					'name' => $term->name,
					'slug' => $term->slug,
				];
			},
			$product->get_category_ids() ? get_terms(
				[
					'taxonomy' => 'product_cat',
					'include'  => $product->get_category_ids(),
				]
			) : []
		),
	];
}

/**
 * Get common variation properties.
 *
 * @param WC_Product_Variation $variation Variation object.
 * @param WC_Product           $parent Parent product object.
 *
 * @return array
 */
function wcsp_get_variation_properties( $variation, $parent ) {
	return [
		'variationId'   => $variation->get_id(),
		'parentId'      => $variation->get_parent_id(),
		'parentName'    => $parent->get_name(),
		'attributes'    => $variation->get_attributes(),
		'sku'           => $variation->get_sku(),
		'price'         => $variation->get_price(),
		'regularPrice'  => $variation->get_regular_price(),
		'salePrice'     => $variation->get_sale_price(),
		'dateCreated'   => $variation->get_date_created() ? $variation->get_date_created()->date( DATE_ISO8601 ) : null,
		'dateModified'  => $variation->get_date_modified() ? $variation->get_date_modified()->date( DATE_ISO8601 ) : null,
		'description'   => $variation->get_description(),
		'virtual'       => $variation->is_virtual(),
		'downloadable'  => $variation->is_downloadable(),
		'manageStock'   => $variation->get_manage_stock(),
		'stockQuantity' => $variation->get_stock_quantity(),
		'stockStatus'   => $variation->get_stock_status(),
		'backorders'    => $variation->get_backorders(),
		'weight'        => $variation->get_weight(),
		'length'        => $variation->get_length(),
		'width'         => $variation->get_width(),
		'height'        => $variation->get_height(),
	];
}

/**
 * Send product created event.
 *
 * @param int        $product_id Product ID.
 * @param WC_Product $product Product object.
 *
 * @return void
 */
function wcsp_send_product_created_event( $product_id, $product ) {
	if ( ! $product ) {
		return;
	}

	$event_data = array_merge(
		[ 'productId' => $product_id ],
		wcsp_get_product_properties( $product )
	);

	wcsp_send_event( 'ProductUpserted', $event_data );
}
add_action( 'woocommerce_new_product', 'wcsp_send_product_created_event', 10, 2 );

/**
 * Send product updated event.
 *
 * @param int        $product_id Product ID.
 * @param WC_Product $product Product object.
 *
 * @return void
 */
function wcsp_send_product_updated_event( $product_id, $product ) {
	if ( ! $product ) {
		return;
	}

	$event_data = array_merge(
		[ 'productId' => $product_id ],
		wcsp_get_product_properties( $product )
	);

	wcsp_send_event( 'ProductUpserted', $event_data );
}
add_action( 'woocommerce_update_product', 'wcsp_send_product_updated_event', 10, 2 );

/**
 * Send product deleted event.
 *
 * @param int $product_id Product ID.
 *
 * @return void
 */
function wcsp_send_product_deleted_event( $product_id ) {
	wcsp_send_event(
		'ProductDeleted',
		[
			'productId' => $product_id,
		]
	);
}
// Using the post hooks because the product hooks are not working.
add_action( 'delete_post', 'wcsp_send_product_deleted_event', 10, 1 );
add_action( 'wp_trash_post', 'wcsp_send_product_deleted_event', 10, 1 );

/**
 * Send product variation created event.
 *
 * @param int                  $variation_id Variation ID.
 * @param WC_Product_Variation $variation Variation object.
 *
 * @return void
 */
function wcsp_send_product_variation_created_event( $variation_id, $variation ) {
	if ( ! $variation || ! $variation->is_type( 'variation' ) ) {
		return;
	}

	$parent = wc_get_product( $variation->get_parent_id() );
	if ( ! $parent ) {
		return;
	}

	$event_data = wcsp_get_variation_properties( $variation, $parent );

	wcsp_send_event( 'ProductVariationUpserted', $event_data );
}
add_action( 'woocommerce_new_product_variation', 'wcsp_send_product_variation_created_event', 10, 2 );

/**
 * Send product variation updated event.
 *
 * @param int                  $variation_id Variation ID.
 * @param WC_Product_Variation $variation Variation object.
 *
 * @return void
 */
function wcsp_send_product_variation_updated_event( $variation_id, $variation ) {
	if ( ! $variation || ! $variation->is_type( 'variation' ) ) {
		return;
	}

	$parent = wc_get_product( $variation->get_parent_id() );
	if ( ! $parent ) {
		return;
	}

	$event_data = wcsp_get_variation_properties( $variation, $parent );

	wcsp_send_event( 'ProductVariationUpserted', $event_data );
}
add_action( 'woocommerce_update_product_variation', 'wcsp_send_product_variation_updated_event', 10, 2 );

/**
 * Send product variation deleted event.
 *
 * @param int $variation_id Variation ID.
 *
 * @return void
 */
function wcsp_send_product_variation_deleted_event( $variation_id ) {
	wcsp_send_event(
		'ProductVariationDeleted',
		[
			'variationId' => $variation_id,
		]
	);
}
add_action( 'woocommerce_delete_product_variation', 'wcsp_send_product_variation_deleted_event', 10, 1 );
add_action( 'woocommerce_trash_product_variation', 'wcsp_send_product_variation_deleted_event', 10, 1 );
