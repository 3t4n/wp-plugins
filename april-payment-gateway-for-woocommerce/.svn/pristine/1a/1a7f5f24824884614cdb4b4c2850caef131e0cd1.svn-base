<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function april_get_bnpl_installment_amount( $amount ) {
  return ( $amount / 4 );
}

function april_enqueue_related_pages_scripts_and_styles() {
  wp_enqueue_style( 'april-installment-style', plugins_url( '../public/css/april-installment-show.css', __FILE__ ) );
}

add_action( 'wp_enqueue_scripts','april_enqueue_related_pages_scripts_and_styles' );

function april_installment_script() {
  wp_enqueue_script('april-installment-show', plugins_url( '../public/js/april-installment-show.js', __FILE__ ), array( 'jquery' ), true );
}

add_action( 'wp_enqueue_scripts', 'april_installment_script' );

/* April Shortcodes */
/*
@params ['amount', 'color']
==========================
Default Values:
amount: cartAmount
color: #3A3CA6
*/

function april_bnpl_toggle_shortcode( $params ) {
  global $woocommerce;

  $april_one_time_class = 'active';
  $april_split_payment_class = null;
  $is_option_checked = null;
  $payplan_disabled_class = null;
  $bnpl_default_amount = "cartAmount";
  $bnpl_switch_default_color = APRIL_TOGGLE_DEFAULT_COLOR;

  $amount = array_key_exists( 'amount', $params ) && !empty( $params['amount'] ) ? $params['amount'] : $bnpl_default_amount;
  $color = array_key_exists( 'color', $params ) && !empty( $params['color'] ) ? $params['color'] : $bnpl_switch_default_color;
  $cart_amount = $amount == "cartAmount" || !is_numeric( $amount ) ? $woocommerce->cart->total : $amount;

  if ( $cart_amount <= 0 ) {
      return;
  }

  if( !empty( $_COOKIE['april-preferred-bnpl-option'] ) ) {
      $april_one_time_class = null;
      $april_split_payment_class = 'active';
      $is_option_checked = 'checked';
  }

  $html = '<div class="april-switcher-toggle-container april-toggle-container '. $payplan_disabled_class .'">
			<div class="april-one-time payment-type '. $april_one_time_class .'">
				<h6>One Time Payment</h6>
				<div class="payment-amt"><span>' . wc_price( $cart_amount ) . '</span></div>
			</div>
			<div class="april-switcher">
				<label class="switch">
					<input type="checkbox" id="aprilInstallmentSwitch" '. $is_option_checked .'>
					<span class="slider round"></span>
				</label>
			</div>
			<div class="april-split-payment payment-type '. $april_split_payment_class . '">
				<h6>4 <strong>Interest Free</strong> Payments of</h6>
				<div class="payment-amt"><span>' . wc_price( april_get_bnpl_installment_amount( $cart_amount ) ) . '</span></div>
			</div>
		</div>';

  $html .= "<style>
			.april-switcher input:checked + .slider {
				background-color: ". $color .";
			}
		</style>";
  return $html;
}

add_shortcode('april_bnpl_toggle', 'april_bnpl_toggle_shortcode');

/*
@params ['amount', 'color']
==========================
Default Values:
amount: productPrice
color: #fa5402
*/

function april_product_bnpl_price_shortcode( $params ) {
  global $woocommerce;

  $bnpl_default_amount = "productPrice";
  $bnpl_default_amount_color = APRIL_BNPL_AMOUNT_DEFAULT_COLOR;

  $amount = is_array( $params ) && array_key_exists( 'amount', $params ) && !empty( $params['amount'] ) ? $params['amount'] : $bnpl_default_amount;
  $color = is_array( $params ) && array_key_exists( 'color', $params ) && !empty( $params['color'] ) ? $params['color'] : $bnpl_default_amount_color;

  $product = wc_get_product( get_the_ID() );

  $actual_product_price = empty( $product ) ? 0.00 : $product->get_price();
  $product_price = !empty( $amount ) && $amount !== "productPrice" && is_numeric( $amount ) ? $amount : $actual_product_price;

  if ($product_price <= 0) {
      return;
  }
  $formatted_price = wc_price( april_get_bnpl_installment_amount( $product_price ) );
  $html = '<div class="april_installment_offer april-installment-offer__shortcode">
			<div class="grey-option-text"><span>or</span></div>
			<div class="april-installment-price">' . __( '4 <strong>Interest Free</strong> Payments of ', 'april' ) . '<span class="formatted-installment-amt">' . $formatted_price . '</span></div>
		</div>';

  $html .= "<style>
			.april_installment_offer.april-installment-offer__shortcode .april-installment-price .formatted-installment-amt {
				color: " . $color . ";
			}
		</style>";

  return $html;
}

add_shortcode( 'april_product_bnpl_price', 'april_product_bnpl_price_shortcode' );

/*
@params ['amount', 'price_color', 'toggle_color']
==========================
Default Values:
amount: productPrice
price_color: #fa5402
toggle_color: #3A3CA6
*/

function april_product_bnpl_toggle_shortcode( $params ) {
  $product = wc_get_product( get_the_ID() );
  $bnpl_default_amount = 'productPrice';
  $bnpl_default_amount_color = APRIL_BNPL_AMOUNT_DEFAULT_COLOR;
  $bnpl_toggle_default_color = APRIL_TOGGLE_DEFAULT_COLOR;
  $is_option_checked = null;
  $april_split_payment_class = null;

  $amount = is_array( $params ) && array_key_exists( 'amount', $params ) && !empty( $params['amount'] ) ? $params['amount'] : $bnpl_default_amount;
  $price_color = is_array( $params ) && array_key_exists( 'price_color', $params ) && !empty( $params['price_color'] ) ? $params['price_color'] : $bnpl_default_amount_color;
  $toggle_color = is_array( $params ) && array_key_exists( 'toggle_color', $params ) && !empty( $params['toggle_color'] ) ? $params['toggle_color'] : $bnpl_toggle_default_color;

  $actual_product_price = empty( $product ) ? 0.00 : $product->get_price();
  $product_price = !empty( $amount ) && $amount !== "productPrice" && is_numeric( $amount ) ? $amount : $actual_product_price;

  if ($product_price <= 0) {
    return;
  }

  if( !empty($_COOKIE['april-preferred-bnpl-option']) ) {
    $april_split_payment_class = 'active';
    $is_option_checked = 'checked';
  }

  $formatted_price = wc_price( april_get_bnpl_installment_amount( $product_price ) );
  $html = '<div class="april_installment_offer april-toggle-container april-installment-offer__toggle april-installment-offer__shortcode">
  		<div class="april-switch-container">
  			<div class="april-switcher">
  				<label class="switch">
  					<input type="checkbox" id="aprilInstallmentSwitch" '. $is_option_checked .'>
  					<span class="slider round"></span>
  				</label>
  			</div>
  		</div>
  		<div class="april-installment-price '. $april_split_payment_class . '">' . __( '4 <strong>Interest Free</strong> Payments of ', 'april' ) . '<span class="formatted-installment-amt">' . $formatted_price . '</span></div>
  	</div>';

  $html .= "<style>
			.april_installment_offer.april-installment-offer__shortcode .april-installment-price .formatted-installment-amt {
				color: " . $price_color . ";
			}
			.april_installment_offer.april-installment-offer__shortcode input:checked + .slider {
				background-color: " . $toggle_color . ";
			}
		</style>";

  return $html;
}

add_shortcode('april_product_bnpl_toggle', 'april_product_bnpl_toggle_shortcode');
