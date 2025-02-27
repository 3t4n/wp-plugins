<?php
/**
 * RenderCheckout Init
 *
 * @version 1.0.1
 * @package 'datalayer'
 */

namespace DatalayerForWoocommerceFree;

use DatalayerForWoocommerceFree\JsScriptManager\JsScriptInjector;
use DatalayerForWoocommerceFree\User\User;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'RenderCheckout' ) ) :

	/**
	 * Class RenderCheckout
	 */
	class RenderCheckout {

		/**
		 * Measuring Checkout Step Transaction
		 *
		 * @param int $order_id     Get global Transaction.
		 * @name 'measuring_checkout_purchase_data_layer'
		 */
		public static function measuring_checkout_purchase_data_layer( $order_id ) {
			$order = wc_get_order( $order_id );

			$transaction_total    = $order->get_total();
			$transaction_tax      = $order->get_total_tax();
			$transaction_shipping = $order->get_shipping_total();
			$transaction_id       = $order->get_order_number();

			$visitor_contact_info = array();
			$usr                  = new User();
			$show_user_info       = $usr->show_user_info();

			if ( $show_user_info ) {
				$email        = $order->get_billing_email();
				$phone_number = $usr->getPhoneNumberE164( $order->get_billing_phone() );
				$first_name   = $order->get_billing_first_name();
				$last_name    = $order->get_billing_last_name();
				$street       = $order->get_billing_address_1();
				$city         = $order->get_billing_city();
				$region       = $order->get_billing_state();
				$postal_code  = $order->get_billing_postcode();
				$country      = $order->get_billing_country();

				$visitor_contact_info = array(
					'email' => $email,
					'phone_number' => $phone_number,
					'address' => array(
						'first_name' => $first_name,
						'last_name' => $last_name,
						'street' => $street,
						'city' => $city,
						'region' => $region,
						'postal_code' => $postal_code,
						'country' => $country
					)
				);
			}

			$status = $order->get_status();

			$coupons = $order->get_coupon_codes();
			$coupon  = '';
			if ( is_array( $coupons ) ) {
				foreach ( $coupons as $item ) {
					$coupon = $item;
				}
			}

			$event_id       = DataLayer::generate_event_id_datalayer();
			$data_layer_ua  = DataLayer::is_data_layer_ua();
			$data_layer_ga4 = DataLayer::is_data_layer_ga4();
			$currency_code  = get_woocommerce_currency();
			$discount     = $order->get_discount_total();
			$items = self::prepare_order_items( $order, $data_layer_ua, $data_layer_ga4);

			if ( $data_layer_ua ) {
				$data_layer = array(
					'event_id'         => $event_id,
					'ecommerce'          => array(
						'currencyCode' => $currency_code,
						'purchase'     => array(
							'actionField' => array(
								'id'          => $transaction_id,
								'affiliation' => 'Online Store',
								'revenue'     => $transaction_total,
								'tax'         => $transaction_tax,
								'shipping'    => $transaction_shipping,
								'coupon'      => $coupon,
							),
							'products'    => $items,
							'status'      => $status,
						),
					),
					'visitorContactInfo' => $visitor_contact_info,
				);
			}
			if ( $data_layer_ga4 ) {
				$data_layer = array(
					'event'              => 'purchase',
					'event_id'           => $event_id,
					'ecommerce'          => array(
						'currency'       => $currency_code,
						'transaction_id' => $transaction_id,
						'affiliation'    => 'Online Store',
						'value'          => (float) $transaction_total,
						'tax'            => (float) $transaction_tax,
						'shipping'       => (float) $transaction_shipping,
						'discount'       => (float) $discount,
						'coupon'         => $coupon,
						'items'          => $items,
						'status'         => $status,
					),
					'visitorContactInfo' => $visitor_contact_info,
				);
			}

			if ( $data_layer_ua ) {
				JsScriptInjector::push_to_data_layer( $data_layer );
			}
			if ( $data_layer_ga4 ) {
				JsScriptInjector::push_to_data_layer_sleep( $data_layer );
			}

		}

		/**
		 * Prepare order items
		 *
		 * @param object  $products          Receive products objects.
		 * @param boolean $data_layer_ua     Receive datalayer if ua variable.
		 * @param boolean $data_layer_ga4    Receive datalayer if ga4 variable.
		 * @name 'prepare_order_items'
		 */
		public static function prepare_order_items( $products, $data_layer_ua, $data_layer_ga4 ) {

			$tax                         = DataLayer::get_woocommerce_tax_display_shop();
			$product_data                = array();
			$count                       = 0;
			$count_index                 = 1;

			foreach ( $products->get_items() as $item ) {

				$price = $products->get_item_total($item);
				if ($tax) {
					$price = $products->get_item_total($item, true);
				}

				$sku = $item->get_product_id();

				$category           = array();
				$product_categories = get_the_terms($sku, 'product_cat');
				if ( ( is_array($product_categories) ) && ( count($product_categories) > 0 ) ) {
					$count_category = 1;
					foreach ($product_categories as $product_cat) {
						$category_key            = ( 1 === $count_category ) ? 'item_category' : 'item_category' . $count_category;
						$category[$category_key] = $product_cat->name;
						++$count_category;
					}
				}

				$product_get = wc_get_product( $sku );
				$name        = $product_get->get_name();

				$variant = '';
				if ( $item->get_variation_id() !== '0' ) {
					$product_variable = new \WC_Product_Variation($item->get_variation_id());

					$sku  = $product_variable->get_id();

					$variations_data = $product_variable->get_attributes();
					if ( is_array($variations_data) && ! empty($variations_data) ) {
						foreach ( $variations_data as $variation_data ) {
							if ( end($variations_data) === $variation_data ) {
								$variant .= $variation_data;
							} else {
								$variant .= $variation_data . ',';
							}
						}
					}
				}

				if ( $data_layer_ua ) {
					if ( ( is_array($product_categories) ) && ( count($product_categories) > 0 ) ) {
						$product_cat = array_shift($product_categories);
						$product_cat = $product_cat->name;
					} else {
						$product_cat = '';
					}
					$product_data[$count] = array(
						'name'     => $name,
						'id'       => $sku,
						'price'    => (float) $price,
						'category' => $product_cat,
						'variant' => $variant,
						'quantity' => (float) abs($item['qty']),
					);
				}
				if ( $data_layer_ga4 ) {
					$product_data[$count]  = array(
						'item_name'     => $name,
						'item_id'       => $sku,
						'price'         => (float) $price,
						'index'         => $count_index,
						'item_variant'   => $variant,
						'quantity'      => (float) abs($item['qty']),
					);
					$product_data[$count] += $category;
				}

				++$count;
				++$count_index;
			}

			return $product_data;
		}

	}
endif;
