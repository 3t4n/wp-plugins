<?php

/**
 * The add to cart hook implementation
 *
 * @package    ReachoWooCommerce
 * @subpackage ReachoWooCommerce/includes
 * @author     Reacho <support@reacho.com>
 */

class Reacho_WooCommerce_Add_To_Cart {

	/**
	 * Set customer identity, call reacho_build_add_to_cart_data and then call reacho_track_request
	 * to trigger the event.
	 *
	 * @param string $cart_item_key Unique key for item in cart.
	 * @param int $product_id ID of item added to cart.
	 * @param int $quantity Quantity of item added to cart.
	 *
	 * @returns null
	 */

	public function reachowc_add_to_cart( $cart_item_key, $product_id, $quantity ) {
		if ( ! isset( $_COOKIE['__reachowc_id'] ) ) {
			return;
		}
		$reachowc_cookie         = sanitize_text_field( wp_unslash( $_COOKIE['__reachowc_id'] ) );
		$reachowc_decoded_cookie = json_decode( base64_decode( $reachowc_cookie ), true );
		$has_exchange_id         = isset( $reachowc_decoded_cookie['$exchange_id'] );
		$has_email               = isset( $reachowc_decoded_cookie['email'] );
		$customer_identify       = array();

		if ( $has_exchange_id ) {
			$customer_identify['_reachox'] = $reachowc_decoded_cookie['$exchange_id'];
		}

		if ( $has_email ) {
			$customer_identify['email'] = $reachowc_decoded_cookie['email'];
		}

		if ( ! $has_exchange_id && ! $has_email ) {
			return;
		}

		$added_product = wc_get_product( $product_id );
		if ( ! $added_product instanceof WC_Product ) {
			return;
		}

		$this->reachowc_track_request( $customer_identify, $this->reachowc_build_add_to_cart_data( $added_product, $quantity, WC()->cart ) );
		$reacho_api = new Reacho_WooCommerce_API_Wrapper();
		$reacho_api->trigger_event( 'add_to_cart', $this->reachowc_build_add_to_cart_data( $added_product, $quantity, WC()->cart ) );
	}

	/**
	 * Set wcr_cart data then build the Added Item and return the array
	 * of the full cart data.
	 *
	 * @param object $added_product Added product data.
	 * @param int $quantity Quantity of item added to cart.
	 * @param WC_Cart $cart Cart data.
	 *
	 * @return array
	 */
	function reachowc_build_add_to_cart_data( $added_product, $quantity, $cart ) {
		$cartRebuild      = new Reacho_WooCommerce_Cart_Rebuild();
		$wcr_cart         = $cartRebuild->reachowc_build_cart_data( $cart );
		$added_product_id = $added_product->get_id();

		$added_to_cart = array(
			'value'                => (float) $cart->total,
			'AddedItemCategories'  => (array) $this->reachowc_strip_explode( wc_get_product_category_list( $added_product_id ) ),
			'AddedItemImageURL'    => (string) wp_get_attachment_url( get_post_thumbnail_id( $added_product_id ) ),
			'AddedItemPrice'       => (float) $added_product->get_price(),
			'AddedItemQuantity'    => (int) $quantity,
			'AddedItemProductID'   => (int) $added_product_id,
			'AddedItemProductName' => (string) $added_product->get_name(),
			'AddedItemSKU'         => (string) $added_product->get_sku(),
			'AddedItemTags'        => (array) $this->reachowc_strip_explode( wc_get_product_tag_list( $added_product_id ) ),
			'AddedItemURL'         => (string) $added_product->get_permalink(),
			'ItemNames'            => (array) $wcr_cart['ItemNames'],
			'Categories'           => isset( $wcr_cart['Categories'] ) ? (array) $wcr_cart['Categories'] : array(),
			'ItemCount'            => (int) $wcr_cart['Quantity'],
			'Tags'                 => isset( $wcr_cart['Tags'] ) ? (array) $wcr_cart['Tags'] : array(),
			'extra'                => $wcr_cart['$extra'],
		);

		/**
		 * Allow developers to customise the payload before it is sent to Reacho.
		 *
		 * The `reachowc_added_to_cart` filter allows you to add additional properties to the [Added to Cart]
		 * (https://help.reacho.com/hc/en-us/articles/360030732832#added-to-cart2) event.
		 *
		 * This example below shows you how to add custom fields to the event
		 *
		 * add_filter('reachowc_added_to_cart','reachowc_modify_added_to_cart', 1, 4);
		 *
		 * function reachowc_modify_added_to_cart($added_to_cart, $added_product, $quantity, $wcr_cart) {
		 *        $product_lead_time =  get_field('leadtime',$added_product->get_id());
		 *        $product_designer = get_field('designer', $added_product->get_id());
		 *        $added_to_cart['LeadTime'] = $product_lead_time;
		 *        $added_to_cart['Designer'] = $product_designer;
		 *        return $added_to_cart;
		 * }
		 *
		 * @param array $added_to_cart The Reacho added to cart payload
		 * @param WC_Product $added_product The product being added to the cart
		 * @param integer $quantity The quantity of the item being added
		 * @param array $wcr_cart The entire Reacho cart object.
		 *
		 * @since 3.0.12
		 *
		 */
		$added_to_cart = apply_filters( 'reachowc_added_to_cart', $added_to_cart, $added_product, $quantity, $wcr_cart );

		return $added_to_cart;
	}

	/**
	 * Check that the Public API token is set, build Added to Cart event payload,
	 * create an options request array using reachowc_added_to_cart_options function and
	 * send the request.
	 *
	 * @param array $customer_identify Identifies the customer based on email or exchange_id.
	 * @param array $data Cart and AddedItem data.
	 *
	 * @returns null
	 */
	function reachowc_track_request( $customer_identify, $data ) {
		$public_api_key = ReachoWC()->options->get_reacho_option( 'reachowc_public_api_key' );
		if ( ! $public_api_key ) {
			return;
		}

		$metric_data = array(
			'data' => array(
				'type'       => 'metric',
				'attributes' => array(
					'name' => 'Added to Cart',
				),
			),
		);

		$profile_data = array(
			'data' => array(
				'type'       => 'profile',
				'attributes' => $customer_identify,
			),
		);

		// 'value' should be a key under 'attributes'
		$value = $data['value'];
		unset( $data['value'] );
		$attributes = array(
			'properties' => $data,
			'metric'     => $metric_data,
			'profile'    => $profile_data,
			'value'      => $value,
		);

		$atc_data = array(
			'data' => array(
				'type'       => 'event',
				'attributes' => $attributes,
			),
		);

		$url = 'https://a.reacho.com/client/events/?company_id=' . $public_api_key;

		$options = $this->reachowc_added_to_cart_options( $atc_data );

		wp_remote_post( $url, $options );
	}

	/**
	 * Creates a Request argument that can be used within
	 * wp_remote_post method for added to cart event
	 *
	 * @param array $payload of the added to cart event.
	 *
	 * @return array
	 */

	function reachowc_added_to_cart_options( $payload ) {
		return array(
			'blocking' => false,
			'headers'  => array(
				'Content-Type'        => 'application/json',
				'X-Reacho-User-Agent' => reachowc_get_plugin_usage_meta_data(),
				'revision'            => '2024-07-30',
			),
			'body'     => wp_json_encode( $payload ),
		);
	}

	/**
	 * If the param is an instance of a WP_Error, returns
	 * an empty array. If the param is not a WP_Error then
	 * runs strip_tags and explode to return an array of strings.
	 *
	 * @param string $list String of product terms.
	 *
	 * @return array
	 */
	public function reachowc_strip_explode( $list ) {
		if ( $list instanceof WP_Error ) {
			return array();
		}

		return explode( ', ', wp_strip_all_tags( $list ) );
	}

}