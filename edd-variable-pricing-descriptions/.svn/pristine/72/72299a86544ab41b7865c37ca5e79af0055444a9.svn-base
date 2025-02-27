<?php
/**
 * Plugin Name: Easy Digital Downloads - Variable Pricing Descriptions
 * Plugin URI: https://easydigitaldownloads.com/downloads/edd-variable-pricing-descriptions/
 * Description: Adds a description field for each variable pricing option.
 * Version: 1.1
 * Requires at least: 4.9
 * Author: Easy Digital Downloads
 * Author URI: https://easydigitaldownloads.com
 * License: GPL-2.0+
 * License URI: http://www.opensource.org/licenses/gpl-license.php
 * Text Domain: edd-variable-pricing-descriptions
 * Domain Path: /languages
 */

require_once __DIR__ . '/includes/deprecated-functions.php';

add_filter( 'edd_settings_sections_extensions', 'edd_vpd_settings_section' );
/**
 * Add plugin section to the EDD extension settings.
 *
 * @param array $sections EDD settings sections.
 *
 * @since 1.1
 */
function edd_vpd_settings_section( $sections ) {
	$sections['edd-variable-pricing-descriptions'] = __( 'Variable Pricing Descriptions', 'edd-variable-pricing-descriptions' );
	return $sections;
}

add_filter( 'edd_settings_extensions', 'edd_vpd_settings', 1 );
/**
 * Add plugin settings.
 *
 * @param array $settings EDD settings.
 *
 * @since 1.1
 */
function edd_vpd_settings( $settings ) {
	$edd_vpd_settings = array(
		'edd-variable-pricing-descriptions' => array(
			array(
				'id'   => 'edd_vpd_show_descriptions_checkout',
				'name' => __( 'Checkout', 'edd-variable-pricing-descriptions' ),
				'desc' => __( 'Show variable pricing descriptions on the Checkout page.', 'edd-variable-pricing-descriptions' ),
				'type' => 'checkbox',
			),
			array(
				'id'   => 'edd_vpd_show_descriptions_receipts',
				'name' => __( 'Receipts', 'edd-variable-pricing-descriptions' ),
				'desc' => __( 'Show variable pricing descriptions on the Receipt page.', 'edd-variable-pricing-descriptions' ),
				'type' => 'checkbox',
			),
		),
	);

	return array_merge( $settings, $edd_vpd_settings );
}

add_action( 'edd_download_price_option_row', 'edd_vpd_download_price_option_row', 10, 3 );
/**
 * Adds the description input field for the EDD >= 2.8.
 *
 * @param int   $post_id Download post ID.
 * @param int   $key Index of the price.
 * @param array $args Price attributes.
 *
 * @since 1.1
 */
function edd_vpd_download_price_option_row( $post_id, $key, $args ) {
	$description = isset( $args['description'] ) ? $args['description'] : null;
	?>
	<div class="edd-custom-price-option-section edd-variable-pricing">
		<span class="edd-custom-price-option-section-title"><?php esc_html_e( 'Option Description', 'edd-variable-pricing-descriptions' ); ?></span>
		<div class="edd-custom-price-option-section-content edd-form-row">
			<input type="text" class="edd_variable_prices_description large-text" value="<?php echo esc_attr( $description ); ?>" placeholder="<?php esc_html_e( 'Option Description', 'edd-variable-pricing-descriptions' ); ?>" name="edd_variable_prices[<?php echo esc_attr( $key ); ?>][description]" id="edd_variable_prices[<?php echo esc_attr( $key ); ?>][description]" />
		</div>
	</div>
	<?php
}

add_filter( 'edd_price_row_args', 'edd_vpd_price_row_args', 10, 2 );
/**
 * Add description field to edd_price_row_args
 *
 * @param array $args Array of price attributes.
 * @param array $price_details Price details array.
 *
 * @since 1.0
 */
function edd_vpd_price_row_args( $args, $price_details ) {
	$args['description'] = isset( $price_details['description'] ) ? $price_details['description'] : '';

	return $args;
}

/**
 * Get variable price details from order item.
 *
 * @param array $item Product item.
 *
 * @since 1.1
 */
function edd_vpd_get_item_variable_details( $item = array() ) {
	if ( empty( $item['id'] ) ) {
		return false;
	}

	$prices = edd_get_variable_prices( $item['id'] );
	if ( empty( $prices ) ) {
		return false;
	}

	if ( isset( $item['item_number'] ) ) {
		$price_id = isset( $item['item_number']['options']['price_id'] ) ? $item['item_number']['options']['price_id'] : null;
	} else {
		$price_id = isset( $item['options']['price_id'] ) ? $item['options']['price_id'] : null;
	}

	if ( empty( $prices[ $price_id ] ) ) {
		return false;
	}

	return $prices[ $price_id ];
}

add_action( 'edd_after_price_option', 'edd_vpd_output_description', 10, 3 );
/**
 * Outputs the variable description after price option.
 *
 * @param int   $key Index of the price in an array.
 * @param array $price Price details array.
 * @param int   $download_id ID of the product.
 *
 * @since 1.0.2
 */
function edd_vpd_output_description( $key, $price, $download_id ) {
	$description = isset( $price['description'] ) ? $price['description'] : null;
	if ( empty( $description ) ) {
		return;
	}

	echo '<p class="edd-variable-pricing-desc">' . esc_html( $description ) . '</p>';
}

add_action( 'edd_checkout_cart_item_title_after', 'edd_vpd_output_checkout_description', 10, 2 );
/**
 * Outputs the variable description after cart item title.
 *
 * @param array   $item Cart item.
 * @param integer $key Index of the item in the array.
 *
 * @since 1.1
 */
function edd_vpd_output_checkout_description( $item, $key ) {
	if ( ! edd_get_option( 'edd_vpd_show_descriptions_checkout', false ) ) {
		return;
	}

	$price_details = edd_vpd_get_item_variable_details( $item );
	if ( ! $price_details ) {
		return;
	}

	edd_vpd_output_description( $key, $price_details, $item['id'] );
}

add_action( 'edd_order_receipt_after_files', 'edd_vpd_output_receipt_description', 10, 2 );
add_action( 'edd_purchase_receipt_after_files', 'edd_vpd_output_receipt_description', 10, 4 );
/**
 * Outputs the variable description in the order receipt.
 *
 * @param \EDD\Orders\Order_Item|int $order_item_or_id The order item in EDD 3.x; the item ID in EDD 2.x.
 * @param \EDD\Orders\Order|int      $order The order in EDD 3.x; the payment ID in EDD 2.x.
 * @param array                      $meta The payment meta in EDD 2.x (not used in EDD 3.x).
 * @param null|int                   $price_id The price ID in EDD 2.x (not used in EDD 3.x).
 *
 * @since 1.1
 */
function edd_vpd_output_receipt_description( $order_item_or_id, $order, $meta = array(), $price_id = null ) {
	if ( ! edd_get_option( 'edd_vpd_show_descriptions_receipts', false ) ) {
		return;
	}

	$item = array();

	if ( $order_item_or_id instanceof EDD\Orders\Order_Item ) {
		$item = array(
			'id'      => $order_item_or_id->product_id,
			'options' => array(
				'price_id' => $order_item_or_id->price_id,
			),
		);
	} elseif ( ! is_null( $price_id ) ) {
		$item = array(
			'id'      => $order_item_or_id,
			'options' => array(
				'price_id' => $price_id,
			),
		);
	}

	if ( empty( $item ) ) {
		return;
	}

	$price_details = edd_vpd_get_item_variable_details( $item );
	if ( ! $price_details ) {
		return;
	}

	edd_vpd_output_description( null, $price_details, $item['id'] );

	// EDD 3.0 calls the `edd_purchase_receipt_after_files` hook so we have to remove it to avoid duplication.
	remove_action( 'edd_purchase_receipt_after_files', 'edd_vpd_output_receipt_description' );
}
