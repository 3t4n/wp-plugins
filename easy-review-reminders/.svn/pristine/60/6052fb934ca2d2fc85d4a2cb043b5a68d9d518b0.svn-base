<?php
	global $wpdb;

	$metadata = ERR_Functions::errGetLineItemMeta( $itemID , $order );

	if ( !empty( $metadata ) ) {

		foreach ( $metadata as $meta ) {

			// Skip hidden core fields
			if ( in_array( $meta->key, apply_filters( 'woocommerce_hidden_order_itemmeta', array(
				'_qty',
				'_tax_class',
				'_product_id',
				'_variation_id',
				'_line_subtotal',
				'_line_subtotal_tax',
				'_line_total',
				'_line_tax',
				'method_id',
				'cost'
			) ) ) ) {
				continue;
			}

			// Skip serialised meta
			if ( is_serialized( $meta->value ) ) {
				continue;
			}

			// Get attribute data
			if ( taxonomy_exists( wc_sanitize_taxonomy_name( $meta->key ) ) ) {
				$term               	= get_term_by( 'slug', $meta->value, wc_sanitize_taxonomy_name( $meta->key ) );
				$meta->key   		= wc_attribute_label( wc_sanitize_taxonomy_name( $meta->key ) );
				$meta->value	 	= isset( $term->name ) ? $term->name : $meta->value;
			} else {
				$item = $order->get_item( $itemID );
				$product = $item->get_product();
				$meta->key = wc_attribute_label( $meta->key, $product );
			}

			echo '<div class="err-order-item-variation"><b>' . ucwords( wp_kses_post( rawurldecode( $meta->key ) ) ) . '</b>: ' . ucwords( wp_kses_post( make_clickable( rawurldecode( $meta->value ) ) ) ) . '</div>';
		}
	}
?>
