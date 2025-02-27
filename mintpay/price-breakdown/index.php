<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function is_woo_discount_rules_active() {
	return is_plugin_active( 'woo-discount-rules/woo-discount-rules.php' );
}

// add jquery
add_action( 'wp_enqueue_scripts', function () {
	// register css
	wp_register_style( 'mintpay_style', plugins_url( '/assets/style.css', __FILE__ ) );
	wp_enqueue_style( 'mintpay_style' );

	// register js
	wp_register_script( 'mintpay_script', plugins_url( 'assets/script.js', __FILE__ ), array( 'jquery' ), '1.1', true );
	wp_enqueue_script( 'mintpay_script' );
} );

function mintpay_generate_education_url($price = 0.0) {
    $cashback_value = (float) get_option('mintpay_cashback_value', 0);
    $cashback_value = (is_numeric($cashback_value) && $cashback_value > 0) ? $cashback_value : 0;

    $price = is_numeric($price) ? (float) $price : 0.0;
    
    $base_url = 'https://mintpay.lk/education';

    if ($price <= 0 && $cashback_value <= 0) {
        return $base_url;
    }

    return sprintf('%s?price=%s&cashback=%s', 
        $base_url,
        number_format($price * 3 * 100, 0, '', ''),
        number_format($cashback_value * 100, 0, '', '')
    );
}



// method to calculate installment for variable product - with woo discount rules
function mintpay_calculate_variable_product_installment_with_wdr( $product ) {
	$min_price = $product->get_variation_price( 'min' );
	$max_price = $product->get_variation_price( 'max' );


	if ( ! is_woo_discount_rules_active() ) {
		return array( $min_price, $max_price );
	}

	$quantity       = 1;
	$return_details = 'all';
	$manual_request = true;
	$is_cart        = false;

	// get min_price
	$wdr_min = apply_filters( 'advanced_woo_discount_rules_get_product_discount_price_from_custom_price',
		$min_price,
		$product,
		$quantity,
		$min_price,
		$return_details,
		$manual_request,
		$is_cart
	);

	// if wdr is applied
	if ( $wdr_min !== false ) {
		$min_price = $wdr_min['discounted_price'];
	}

	// get max_price
	$wdr_max = apply_filters( 'advanced_woo_discount_rules_get_product_discount_price_from_custom_price',
		$max_price,
		$product,
		$quantity,
		$max_price,
		$return_details,
		$manual_request,
		$is_cart
	);

	// if wdr is applied
	if ( $wdr_max !== false ) {
		$max_price = $wdr_max['discounted_price'];
	}

	return array( $min_price, $max_price );
}

// method to calculate installment for simple product - with woo discount rules
function mintpay_calculate_simple_product_installment_with_wdr( $product ) {
	$price = $product->get_price(); //gets active price


	if ( ! is_woo_discount_rules_active() ) {
		return $price;
	}


	$quantity       = 1;
	$custom_price   = 0;
	$return_details = 'discounted_price';
	$manual_request = true;
	$is_cart        = false;

	$wdr = apply_filters( 'advanced_woo_discount_rules_get_product_discount_price_from_custom_price',
		$price,
		$product,
		$quantity,
		$custom_price,
		$return_details,
		$manual_request,
		$is_cart
	);

	// wdr is not applied on product - returns active price
	if ( $wdr === false ) {
		return $price;
	}

	// wdr is applied on product - returns discounted price
	return $wdr;
}

// method to calculate installment for simple product
function mintpay_calculate_simple_product_installment( $product ) {
	if ( $product->get_type() != 'simple' ) {
		return;
	}

	// check for conflicts with wdr
	$price = mintpay_calculate_simple_product_installment_with_wdr( $product );

	$price = floatval( $price );

	// Prevent division by zero
	if ( $price == 0 ) {
		return number_format( 0, 2, '.', ',' );
	}

	return number_format( $price / 3, 2, '.', ',' );
}

// method to calculate installment for variable product
function mintpay_calculate_variable_product_installment( $product ) {
	if ( $product->get_type() != 'variable' ) {
		return;
	}

	// check for conflicts with wdr
	list( $min_price, $max_price ) = mintpay_calculate_variable_product_installment_with_wdr( $product ); //this function returns an array

	// if max price == min price return a single price
	if ( $min_price === $max_price ) {
		return number_format( $min_price / 3, 2, '.', ',' );
	}

	// convert to decimals
	$min_price = number_format( $min_price / 3, 2, '.', ',' );
	$max_price = number_format( $max_price / 3, 2, '.', ',' );

	$currency_symbol = get_woocommerce_currency_symbol();

	// if not return the range
	return sprintf( "%s - %s%s", $min_price, $currency_symbol, $max_price );
}


// method to calculate installment for a single variant - with woo discount rules
function mintpay_calculate_variant_installment_with_wdr( $variant, $product ) {
	if ( $product->get_type() !== 'variable' ) {
		return 'Error: not a variable product';
	}

	$price = $variant['display_price']; //gets active price

	if ( ! is_woo_discount_rules_active() ) {
		return $price;
	}


	$quantity       = 1;
	$custom_price   = 0;
	$return_details = 'discounted_price';
	$manual_request = true;
	$is_cart        = false;

	$wdr = apply_filters( 'advanced_woo_discount_rules_get_product_discount_price_from_custom_price',
		$price,
		$variant,
		$quantity,
		$custom_price,
		$return_details,
		$manual_request,
		$is_cart
	);

	// wdr is not applied on product - returns active price
	if ( $wdr === false ) {
		return $price;
	}

	// wdr is applied on product - returns discounted price
	return $wdr;
}


// method to create the sentence for displaying price breakdown - `or 3 X/installments of $123.00 with`
/**
 * !!input formatted price!!
 */
function mintpay_create_sentence_for_pay_later( $price, $currency_symbol, $wording ) {
	return sprintf( "3 %s <b>%s %s</b>", $wording, $currency_symbol, $price );
}

function mintpay_create_sentence_for_pay_now( $cashback_value ) {
	return sprintf( "<b>%s%%</b> Cashback", $cashback_value );
}

function mintpay_generate_sentence( $price, $currency_symbol, $wording ) {
	$cashback_value = get_option( 'mintpay_cashback_value', 0 );
	$inst_type      = get_option( 'mintpay_inst_type', 'LTR' );

	$price_string = "";


	if ( $inst_type == 'BTH' ) {
		$price_string = mintpay_create_sentence_for_pay_later( $price, $currency_symbol, $wording );
		$price_string .= " or ";
		$price_string .= mintpay_create_sentence_for_pay_now( $cashback_value );
	} elseif ( $inst_type == 'LTR' ) {
		$price_string = mintpay_create_sentence_for_pay_later( $price, $currency_symbol, $wording );
	} elseif ( $inst_type == 'NOW' ) {
		$price_string = mintpay_create_sentence_for_pay_now( $cashback_value );
	}

	$price_string .= " with ";

	return $price_string;

}

// method to display selected single variant product price
add_filter( 'woocommerce_available_variation', 'mintpay_get_variable_product_installment', 9, 3 );
function mintpay_get_variable_product_installment( $variation_data, $product, $variation ) {
	$mintpay_logo_src      = 'https://static.mintpay.lk/static/base/logo/mintpay-pill.png';
	$mintpay_info_icon_src = 'https://static.mintpay.lk/static/base/logo/information.png';

	$mintpay_font_size     = '15px';
	$mintpay_wording       = 'X';
	$mintpay_css_classname = 'mintpay-price-variation';
	$mintpay_logo_height   = '19px';
	$mintpay_icon_height   = '12px';
	$currency_symbol       = 'Rs.';

	// get variable products price
	$price    = mintpay_calculate_variant_installment_with_wdr( $variation_data, $product );
	$price    = number_format( (float)$price / 3, 2, '.', ',' );
	$sentence = mintpay_generate_sentence( $price, $currency_symbol, $mintpay_wording );
	$education_url = mintpay_generate_education_url($price);

	if ( ! empty( $variation_data['price_html'] ) ) {
		$mintpay_logo = '
		<span>
			<img style="display: inline-flex; position: relative; height: ' . $mintpay_logo_height . '; vertical-align: middle; width: auto;" class="mintpay-logo" src="' . $mintpay_logo_src . '" alt="mintpay_logo_woocommerce">
			<a href="' . esc_url($education_url) . '" target="_blank" style="display: inline-block;">
				<img style="display: inline-flex; position: relative; cursor: pointer; height: ' . $mintpay_icon_height . '; vertical-align: middle; width: auto;" class="mintpay-info-icon" src="' . $mintpay_info_icon_src . '" alt="mintpay_info_icon_woocommerce">
			</a>
		</span>';

		$variation_data['price_html'] .= '<div style="font-size: ' . $mintpay_font_size . '; color: #8e8e8e; line-height: 30px; font-weight: 500" class=' . $mintpay_css_classname . '>' . $sentence . $mintpay_logo . '</div><br>';
	}

	return $variation_data;
}


// single function to display monthly installment
add_filter( 'woocommerce_get_price_html', 'mintpay_display_price_breakdown', 9, 2 );
function mintpay_display_price_breakdown( $default_price, $product ) {
	// display koko price breakdown - only in frontend
	if ( is_admin() && ! wp_doing_ajax() ) {
		return $default_price;
	}

	$mintpay_css_classname = 'product-price-installments-not-in-variation';
	$mintpay_logo_height   = '14px';
	$mintpay_font_size     = '13px';
	$mintpay_wording       = "X";
	$mintpay_icon_height   = '12px';

	// get store currency symbol
	$currency_symbol = "Rs.";

	// get current product
	if ( wc_get_product() !== null ) {
		$product = wc_get_product();
	}

	// filter hook to display certain categories only
	$display = 1;
	$display = apply_filters( 'mintpay_price_breakdown_display', $display, $product );
	if ( $display !== 1 ) {
		return $default_price;
	}

	// check product type : simple, variation, download, grouped, external etc.
	$product_type = '';
	if ( $product != null ) {
		$product_type = strtolower( substr( get_class( $product ), strrpos( get_class( $product ), "_" ) + 1 ) );
	}
	// check if product is in single page and NOT in a loop
	global $woocommerce_loop;

	if ( is_product() && isset( $woocommerce_loop['name'] ) && $woocommerce_loop['name'] == "" ) {
		$mintpay_css_classname = 'product-price-installments-not-in-variation-single';
		$mintpay_wording       = "X";
		$mintpay_font_size     = "18px";
		$mintpay_logo_height   = '19px';
		$mintpay_icon_height   = '12px';
	}


	switch ( $product_type ) {
		case 'variable':
			$price    = mintpay_calculate_variable_product_installment( $product );
			$sentence = mintpay_generate_sentence( $price, $currency_symbol, $mintpay_wording );

			break;

		case 'simple':
			$price    = mintpay_calculate_simple_product_installment( $product );
			$sentence = mintpay_generate_sentence( $price, $currency_symbol, $mintpay_wording );
			break;

		default:
			return $default_price;
	}

	if ( ! is_product() || $product_type == 'simple' || ( $product->get_variation_price( 'min' ) === $product->get_variation_price( 'max' ) ) ) {
		$mintpay_logo_src      = 'https://static.mintpay.lk/static/base/logo/mintpay-pill.png';
		$mintpay_info_icon_src = 'https://static.mintpay.lk/static/base/logo/information.png';

		$education_url = mintpay_generate_education_url($price);

		$mintpay_logo = '
		<span>
			<img style="display: inline-flex; position: relative; height: ' . $mintpay_logo_height . '; vertical-align: middle; width: auto;" class="mintpay-logo" src="' . $mintpay_logo_src . '" alt="mintpay_logo_woocommerce">
			<a href="' . esc_url($education_url) . '" target="_blank" style="display: inline-block;">
				<img style="display: inline-flex; position: relative; cursor: pointer; height: ' . $mintpay_icon_height . '; vertical-align: middle; width: auto;" class="mintpay-info-icon" src="' . $mintpay_info_icon_src . '" alt="mintpay_info_icon_woocommerce">
			</a>
		</span>';

		$default_price .= '<br><div style="font-size: ' . $mintpay_font_size . '; color: #8e8e8e; line-height: 20px;" class=' . $mintpay_css_classname . '>' . $sentence . $mintpay_logo . '</div>';

		return $default_price;
	} else {
		return $default_price;
	}
}


// method to display price breakdown in checkout page
add_action( 'woocommerce_review_order_before_payment', 'mintpay_display_price_breakdown_in_checkout_page' );
function mintpay_display_price_breakdown_in_checkout_page() {
	//
	$cart = WC()->cart;
	if ( ! $cart->is_empty() ) {
		$mintpay_logo = 'https://static.mintpay.lk/static/base/logo/mintpay-pill.png';

		$new_price_html = '';
		$new_price_html .= '<script src="' . plugins_url( '/assets/script.js', __FILE__ ) . '"></script>';
		$new_price_html .= '<link rel="stylesheet" href="' . plugins_url( '/assets/style.css', __FILE__ ) . '">';

		$mintpay_info = $new_price_html .
		                '<div class="mintpay-clean-style mintpay-info-icon mintpay-big-text mintpay-checkout-promo">
				<span class="mintpay-cashback">Get upto <b>Rs. 500.00 off</b> on your first <b>Pay Now</b> purchase with</span>
				<img class="mintpay-logo" src="' . $mintpay_logo . '" alt="Mintpay">
				
			</div>';

		_e( $mintpay_info );
	}
}
