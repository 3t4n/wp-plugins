<?php

// Change add to cart button when outside the product/customizer page on Axial products
// TODO: Do also for cart product suggestions
add_filter( 'woocommerce_loop_add_to_cart_link', 'axialnest_woo_custom_text_replace_button', 10, 2 );
function axialnest_woo_custom_text_replace_button( $button, $product  ) {
	global $product;
	$axialNestId = get_post_meta( $product->get_id(), 'axial-nest-id', true );
	if ($axialNestId) {
		$button_text = __("🎨", "axialnest-for-woocommerce");
		return '<a style="margin: auto; text-decoration: none; display: block; text-align: center;" class="view-product button" href="' . $product->get_permalink() . '">' . $button_text . '</a>';
	}
	return $button;
}

// Add custom fields to cart item upon add to cart call
add_filter( 'woocommerce_add_to_cart_validation', 'axialnest_woo_wk_add_to_cart_validation', 10, 4 );
function axialnest_woo_wk_add_to_cart_validation( $passed, $product_id, $quantity, $variation_id = null ) {
	if ( ! isset( $_POST['_axialnonce'] ) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_axialnonce'])), plugin_dir_path( __FILE__ ).'/src') )
		return false;
	$isAxialProduct = !empty( $_POST['axial-id'] );
	if ($isAxialProduct && (empty( $_POST['customization-text'] ) || empty( $_POST['customization-json'] ) || empty( $_POST['customization-screenshots'] ) || empty( $_POST['customization-thumbnail'] ))) {
		$passed = false;
		wc_add_notice( __( 'Customization not present.', 'axialnest-for-woocommerce' ), 'error' );
	}
	return $passed;
}

add_filter( 'woocommerce_add_cart_item_data', 'axialnest_woo_wk_add_cart_item_data', 10, 3 );
function axialnest_woo_wk_add_cart_item_data( $cart_item_data, $product_id, $variation_id ) {
	if ( ! isset( $_POST['_axialnonce'] ) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_axialnonce'])), plugin_dir_path( __FILE__ ).'/src') )
		return false;
	$isAxialProduct = !empty($_POST['axial-id']) && isset($_POST['customization-text']) && isset($_POST['customization-json']) && isset($_POST['customization-screenshots']) && isset($_POST['customization-thumbnail']);
	if ($isAxialProduct) {
		$cart_item_data['axial-id'] = sanitize_text_field(wp_unslash( $_POST['axial-id'] ));
		$cart_item_data['customization-text'] = sanitize_text_field(wp_unslash( $_POST['customization-text'] ));
		$cart_item_data['customization-json'] = sanitize_text_field(wp_unslash( $_POST['customization-json'] ));
		$cart_item_data['customization-screenshots'] = sanitize_text_field(wp_unslash( $_POST['customization-screenshots'] ));
		$cart_item_data['customization-thumbnail'] = sanitize_text_field(wp_unslash( $_POST['customization-thumbnail'] ));
	}
	return $cart_item_data;
}

// Process dynamic pricing
add_action( 'woocommerce_before_calculate_totals', 'axialnest_woo_add_custom_price', 1000, 1);
function axialnest_woo_add_custom_price( $cart ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return;
    // Avoiding hook repetition (when using price calculations for example | optional)
    if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 )
        return;

    foreach ( $cart->get_cart() as $cart_item ) {
		if (!empty($cart_item['axial-id'])) {
			$customizationJSON = json_decode($cart_item['customization-json'], false);
			$customizationPrice = $customizationJSON->body->extraPrice;
			if ($customizationPrice > 0)
				$cart_item['data']->set_price( $cart_item['data']->get_price() + $customizationPrice );
		}
    }
}

// Show field on cart item name
add_filter( 'woocommerce_get_item_data', 'axialnest_woo_wk_get_item_data', 10, 2 );
function axialnest_woo_wk_get_item_data( $item_data, $cart_item_data ) {
	$isAxialProduct = !empty( $cart_item_data['axial-id'] );
	if ($isAxialProduct) {
		// $thumbnailHTML = '<img src="' . $cart_item_data['customization-thumbnail'] . '" />';
		$item_data[] = array(
			'key'   => __( 'Customization', 'axialnest-for-woocommerce' ),
			'value' => wc_clean( $cart_item_data['customization-text'] ),
		);
	}
	return $item_data;
}

// Copy cart item custom fields to custom order metadata fields
add_action( 'woocommerce_checkout_create_order_line_item', 'axialnest_woo_wk_checkout_create_order_line_item', 10, 4 );
function axialnest_woo_wk_checkout_create_order_line_item( $item, $cart_item_key, $values, $order ) {
	$isAxialProduct = !empty( $values['axial-id'] );
	if ($isAxialProduct) {
		$item->add_meta_data(
			__( 'AxialNest ID', 'axialnest-for-woocommerce' ),
			$values['axial-id'],
			true);
		$item->add_meta_data(
			'Customization',
			$values['customization-text'],
			true);
		$item->add_meta_data(
			'__customization_json',
			$values['customization-json'],
			true);
		$item->add_meta_data(
			'__customization_screenshots',
			$values['customization-screenshots'],
			true);
	}
}

// Flag our metadata as hidden so it doesn't show raw on the order page
function axialnest_woo_custom_woocommerce_hidden_order_itemmeta($arr) {
    $arr[] = 'Customization';
	$arr[] = '__customization_json';
	$arr[] = '__customization_screenshots';
    return $arr;
}

add_filter('woocommerce_hidden_order_itemmeta', 'axialnest_woo_custom_woocommerce_hidden_order_itemmeta', 10, 1);

