<?php

namespace Amwal\Http\Controllers;

use Exception;
use WC_Customer;
use WP_REST_Request;
use WP_REST_Response;
use WC_Coupon;


class CreateOrderController extends Controller {

	protected $namespace = 'wc/amwal/v2';
	/**
	 * Route name.
	 *
	 * @var string
	 */
	protected $route = 'order/create';

	/**
	 * Route methods.
	 *
	 * @var string
	 */
	protected $method = 'POST';


	public function __construct() {
		parent::__construct();

	}

	/**
	 * @param WP_REST_Request $request
	 *
	 * @return WP_REST_Response
	 */
	public function handle( $request ) {
		$body = $request->get_json_params();
		$cart = WC()->cart;
		if ( array_key_exists( "amwal_cart_id", $body ) ) {
			$this->amwal_cart_id = $body['amwal_cart_id'];
			$amwal_order_id      = array_key_exists( "amwal_order_id", $body ) ? $body['amwal_order_id'] : null;

			try {
				$transaction_details = $body['transaction_details'];
				[ $validationStatus, $validationMessage ] = $this->validateOrder( $transaction_details );

				if ( ! $validationStatus ) {
					return $this->order_creation_error_response( $validationMessage );
				}

				if ( ! empty( $amwal_order_id ) ) {
					$order_res       = wc_get_order( $amwal_order_id );
					if(empty($order_res->get_meta('amwal_transaction_data'))) {
						$order_res->update_meta_data( 'amwal_transaction_id', $transaction_details['id'] );
					}
					if(empty($order_res->get_meta('amwal_cart_id'))) {
						$order_res->update_meta_data('amwal_cart_id', $transaction_details['ref_id']);
					}
					$order_res->save();
					$old_amount      = (float)$order_res->get_total();
					$bins_to_check   = get_option( AMWALWC_SETTING_BINS_OFFERS );
					$bins_promo_code = get_option( AMWALWC_SETTING_BINS_PROMO_CODE );
					$bins_coupon     = null;
					$new_amount      = null;
					if ( ! empty( $bins_to_check ) && ! empty( $bins_promo_code ) ) {
						try {
							$bins_coupon = new WC_Coupon( $bins_promo_code );
							if ( ! is_wp_error( $bins_coupon ) ) {
								$order_after_bins_coupon = $this->check_and_apply_bin_promo_code_order( $transaction_details, $order_res, $bins_to_check, $bins_coupon );
								if ( ! empty( $order_after_bins_coupon ) ) {
									$new_amount = $order_after_bins_coupon;
								}
							}
						} catch ( Exception $e ) {
							$this->sentryExceptionReport->reportException( $e, $this->amwal_cart_id, );
						}
					}
					$amwal_promo_code = get_option( AMWALWC_SETTING_PROMO_CODE );
					$amwal_coupon     = null;
					if ( ! empty( $amwal_promo_code ) ) {
						try {
							$amwal_coupon             = new WC_Coupon( $amwal_promo_code );
							$order_after_amwal_coupon = amwalwc_get_valid_coupon( $amwal_coupon, $order_res );
							if ( ! empty( $order_after_amwal_coupon ) ) {
								$new_amount = $order_after_amwal_coupon;
							}
						} catch ( Exception $e ) {
							$this->sentryExceptionReport->reportException( $e, $this->amwal_cart_id, );
						}
					}
					$coupon_description = '';
					if ( ! empty( $order_after_bins_coupon ) ) {
						$coupon_description = $bins_coupon->get_description();
						if ( ! empty( $order_after_amwal_coupon ) ) {
							$coupon_description .= amwalwc_get_current_lang() == 'ar' ? ' و ' : ' And ';
							$coupon_description .= $amwal_coupon->get_description();
						}
					} elseif ( ! empty( $order_after_amwal_coupon ) ) {
						$coupon_description = $amwal_coupon->get_description();
					}
					$card_bin_additional_discount_message = amwalwc_get_current_lang() == 'ar' ? 'لقد حصلت على خصم إضافي' : 'You have earned an extra discount';

					$return_result = [
						'amount'                               => ! empty( $new_amount ) ? (float) $new_amount : (float) $order_res->get_total(),
						'card_bin_additional_discount_message' => ! empty( $coupon_description ) ? $card_bin_additional_discount_message . " " . $coupon_description : null,
						'card_bin_additional_discount'         => ! empty( $new_amount ) ? (float) $old_amount - (float) $new_amount : null,
						'old_amount'                           => $old_amount
					];
				}
				else {
					$order_schema = $this->amwalwc_build_order_schema( $transaction_details );
					if ( is_wp_error( $order_schema ) || $order_schema instanceof Exception ) {
						return $this->order_creation_error_response( 'Could not create order schema', $order_schema );
					}

					[ $order_request, $user_id ] = $this->amwalwc_order_core( $order_schema );
					if ( is_wp_error( $order_request ) || $order_request instanceof Exception ) {
						return $this->order_creation_error_response( 'Could not create order request', $order_request );
					}

					foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
						if ( empty( $transaction_id ) ) {
							$cart->cart_contents[ $cart_item_key ]['amwal_transaction_id'] = $transaction_details['id'];
						}
						if ( empty( $amwal_cart_id ) ) {
							$cart->cart_contents[ $cart_item_key ]['amwal_cart_id'] = $transaction_details['ref_id'];
						}
					}
					$address = $order_request->get_ship_to();
					if ( ! empty( $address ) ) {
						$customer = ! empty( $user_id ) ? new WC_Customer( $user_id ) : new WC_Customer();
						$customer->set_props( $address->to_customer_address_props() );
						$customer->save();

						$orderShipping = $order_request->get_order()->get_shipping();
						amwalwc_log_info('shipping_details => ' . print_r($transaction_details['shipping_details'] , true));
						if ( ! empty( $orderShipping ) && isset( $transaction_details['shipping_details'] ) ) {
							amwalwc_log_info('CreateOrderController => 3');
							WC()->session->set( 'chosen_shipping_methods', [ $transaction_details['shipping_details']['id'] ] );
							WC()->session->save_data();
//							WC()->cart->calculate_shipping();
							$cart->set_session();
							if ($cart->get_shipping_total() + $cart->get_shipping_tax() != $transaction_details['shipping_details']['price']) {
								amwalwc_log_info('CreateOrderController => 4');
								$shipping_details = $transaction_details['shipping_details'];
								$shipping_cost = $shipping_details['price'] - $shipping_details['tax'];
								$cart->set_shipping_total( (float)$shipping_cost);
								$cart->set_shipping_tax( $shipping_details['tax']  );
								$cart->set_shipping_taxes( [ $shipping_details['taxes'] ] );
								$cart->set_session();
							}
							$cart->set_session();
							$cart->calculate_shipping();
							if ($cart->get_shipping_total() + $cart->get_shipping_tax() != $transaction_details['shipping_details']['price']) {
								amwalwc_log_info('CreateOrderController: orderShipping = 5');
								$shipping_method = $this->get_shipping_object( $transaction_details['shipping_details']['id'] );
								if ( $shipping_method ) {
									amwalwc_log_info('CreateOrderController: orderShipping = 6 / '.$shipping_method->get_cost() . ' / '.$shipping_method->get_shipping_tax());
									$cart->set_shipping_total( $shipping_method->get_cost() );
									$cart->set_shipping_tax( $shipping_method->get_shipping_tax() );
								}
							}
							amwalwc_log_info('shipping details = ' . $transaction_details['shipping_details']['id'] . ' / order shipping = ' . $orderShipping->get_rate_id() . ' / chosen shipping methods = ' . WC()->session->get( 'chosen_shipping_methods' )[0]);
						}
//						$cart->calculate_totals();
					}
					amwalwc_log_info( print_r( $cart->get_totals() , true) );
					$old_amount = (float)$cart->get_total( 'raw' );

					// Apply BIN-specific discount
					$bins_to_check   = get_option( AMWALWC_SETTING_BINS_OFFERS );
					$bins_promo_code = get_option( AMWALWC_SETTING_BINS_PROMO_CODE );
					$bins_coupon     = null;
					$new_amount      = null;

					if ( ! empty( $bins_to_check ) && ! empty( $bins_promo_code ) ) {
						try {
							$bins_coupon = new WC_Coupon( $bins_promo_code );
							if ( ! is_wp_error( $bins_coupon ) ) {
								$cart_after_bins_coupon = $this->check_and_apply_bin_promo_code( $transaction_details, WC()->cart, $bins_to_check, $bins_coupon );
								if ( ! empty( $cart_after_bins_coupon ) ) {
									$cart->calculate_totals(); // Recalculate totals after applying coupon
									$new_amount = $cart->get_total('raw');
								}
							}
						} catch ( Exception $e ) {
							$this->sentryExceptionReport->reportException( $e, $this->amwal_cart_id );
						}
					}

					// Apply Amwal promo code
					$amwal_promo_code = get_option( AMWALWC_SETTING_PROMO_CODE );
					$amwal_coupon     = null;

					if ( ! empty( $amwal_promo_code ) ) {
						try {
							$amwal_coupon            = new WC_Coupon( $amwal_promo_code );
							$cart_after_amwal_coupon = $this->apply_coupon_to_cart( $amwal_coupon, WC()->cart );
							if ( ! empty( $cart_after_amwal_coupon ) ) {
								$cart->calculate_totals(); // Recalculate totals after applying coupon
								$new_amount = $cart->get_total('raw');
							}
						} catch ( Exception $e ) {
							$this->sentryExceptionReport->reportException( $e, $this->amwal_cart_id );
						}
					}

					// Description and discount message
					$coupon_description = '';
					if ( ! empty( $cart_after_bins_coupon ) ) {
						$coupon_description = $bins_coupon->get_description();
						if ( ! empty( $cart_after_amwal_coupon ) ) {
							$coupon_description .= amwalwc_get_current_lang() == 'ar' ? ' و ' : ' And ';
							$coupon_description .= $amwal_coupon->get_description();
						}
					} elseif ( ! empty( $cart_after_amwal_coupon ) ) {
						$coupon_description = $amwal_coupon->get_description();
					}

					$card_bin_additional_discount_message = amwalwc_get_current_lang() == 'ar' ? 'لقد حصلت على خصم إضافي' : 'You have earned an extra discount';

					$return_result = [
						'amount'                               => ! empty( $new_amount ) ? (float) $new_amount : (float) $old_amount,
						'card_bin_additional_discount_message' => ! empty( $coupon_description ) ? $card_bin_additional_discount_message . " " . $coupon_description : null,
						'card_bin_additional_discount'         => ! empty( $new_amount ) ? (float) $old_amount - (float) $new_amount : null,
						'old_amount'                           => $old_amount
					];
				}

				return new WP_REST_Response( $return_result, 201 );
			} catch ( Exception $e ) {
				return $this->order_creation_error_response( 'Could not find order', $e );
			}
		}

		return $this->order_creation_error_response( 'Could not find amwal cart id' );
	}


	function validateOrder( $transaction_details ) {
		if ( ! WC()->cart ) {
			return [ false, 'cart is empty' ];
		}
		$prev_orders      = $this->get_order_by_amwal_transaction_id( $transaction_details['id'], 1 );
		$invalid_statuses = $this->getInvalidOrderStatus();
		if ( ! empty( $prev_orders ) ) {
			if ( is_array( $prev_orders ) ) {
				foreach ( $prev_orders as $order ) {
					if ( ! in_array( $order->get_status(), $invalid_statuses ) ) {
						return [ false, 'Order with this transaction id already exists' ];
					}
				}
			} elseif ( ! in_array( $prev_orders->get_status(), $invalid_statuses ) ) {
				return [ false, 'Order with this transaction id is already exists' ];
			}
		}
		if ( in_array( 'status', $transaction_details ) && $transaction_details['status'] == 'success' ) {
			return [ false, 'Invalid Payment Transaction Status' ];
		}
		if ( $transaction_details['merchant_key'] != amwalwc_get_app_id() ) {
			return [ false, 'Invalid Payment Transaction Merchant Key' ];
		}

		return [ true, null ];
	}

	private function check_and_apply_bin_promo_code( $transaction_details, $cart, $bins_to_check, $coupon ): ?float {
		$bins = explode( ',', $bins_to_check );
		if ( ! empty( $transaction_details['card_bin'] ) ) {
			foreach ( $bins as $bin ) {
				if ( str_contains( $transaction_details['card_bin'], $bin ) ) {
					return $this->apply_coupon_to_cart( $coupon, $cart );
				}
			}
		}

		return null;
	}

	private function apply_coupon_to_cart( $coupon, $cart ) {
		try {
			// Check if the coupon has already been applied to the cart
			foreach ( $cart->get_applied_coupons() as $applied_coupon ) {
				if ( $coupon->get_code() === $applied_coupon ) {
					return null;
				}
			}

			// Apply the coupon to the cart
			$cart->apply_coupon( $coupon->get_code() );
			$cart->calculate_totals();

			$discount_amount = WC()->cart->get_coupon_discount_amount( $coupon->get_code(), true );

			// Optionally apply a maximum discount limit
			$max_discount = (float)$cart->get_total('row') + 1;
			foreach ( $coupon->get_meta_data() as $data ) {
				if ( $data->get_data()['key'] == '_wt_max_discount' ) {
					$max_discount = $data->get_data()['value'];
					break;
				}
			}
			$discount_amount = min( $discount_amount, $max_discount );

			return $discount_amount;

		} catch ( Exception $e ) {
			$this->sentryExceptionReport->reportException( $e );
		}

		return null;
	}

	public function get_permission_callback() {
		return $this->WCBasicAuth();
	}

	private function check_and_apply_bin_promo_code_order( $transaction_details, $order, $bins_to_check, $coupon ): ?float {
		$bins = explode( ',', $bins_to_check );
		if ( ! empty( $transaction_details['card_bin'] ) ) {
			foreach ( $bins as $bin ) {
				if ( str_contains( $transaction_details['card_bin'], $bin ) ) {
					return amwalwc_get_valid_coupon( $coupon, $order );
				}
			}
		}

		return null;
	}

}