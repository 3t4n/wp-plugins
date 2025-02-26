<?php
/**
 * Main class for payout via Store Credit/ Gift Certificate via WooCommerce Smart Coupons
 *
 * @package   /includes/integration/woocommerce-smart-coupons/
 * @since     1.0.0
 * @version   1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WSC_AFWC_Store_Credit_API' ) ) {

	/**
	 * Compatibility class for payout via WooCommerce Smart Coupons.
	 */
	class WSC_AFWC_Store_Credit_API {

		/**
		 * Enabled
		 *
		 * @var bool $enabled
		 */
		public $enabled = false;

		/**
		 * Smart Coupons discount type for Store Credit / Gift Cerfiticate.
		 *
		 * @var bool $enabled
		 */
		public $sc_discount_type = 'smart_coupon';

		/**
		 * Variable to hold instance of WSC_AFWC_Store_Credit_API
		 *
		 * @var $instance
		 */
		private static $instance = null;

		/**
		 * Constructor
		 */
		private function __construct() {
			add_filter( 'afwc_allowed_coupon_type_for_payouts', array( $this, 'add_smart_coupons' ), 10, 1 );
			add_filter( 'afwc_coupon_payouts_setting_description', array( $this, 'update_description' ), 10, 1 );
			add_filter( 'afwc_automatic_payout_classes', array( $this, 'add_support_for_automatic_payouts' ), 10, 1 );
			add_filter( 'afwc_payout_classes', array( $this, 'add_post_payout_class' ), 10, 1 );
		}

		/**
		 * Get single instance of WSC_AFWC_Store_Credit_API
		 *
		 * @return WSC_AFWC_Store_Credit_API Singleton object of WSC_AFWC_Store_Credit_API
		 */
		public static function get_instance() {
			// Check if instance is already exists.
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Method to handle WC compatibility related function call from appropriate class
		 *
		 * @param string $function_name Function to call.
		 * @param array  $arguments     Array of arguments passed while calling $function_name.
		 *
		 * @return mixed Result of function call.
		 */
		public function __call( $function_name = '', $arguments = array() ) {
			if ( empty( $function_name ) || ! is_callable( 'SA_WC_Compatibility', $function_name ) ) {
				return;
			}

			if ( ! empty( $arguments ) ) {
				return call_user_func_array( 'SA_WC_Compatibility::' . $function_name, $arguments );
			} else {
				return call_user_func( 'SA_WC_Compatibility::' . $function_name );
			}
		}

		/**
		 * Method to check whether the Smart Coupons > Store Credit is enabled for payout.
		 * It detects based on whether the plugin is active and setting is selected.
		 *
		 * @return bool Return true if enabled otherwise false.
		 */
		public function is_enabled() {
			// SC should be active.
			if ( ! afwc_is_plugin_active( 'woocommerce-smart-coupons/woocommerce-smart-coupons.php' ) ) {
				return false;
			}

			// Check in settings if coupon type is selected.
			$allowed_coupon_types_for_payout = get_option( 'afwc_enabled_for_coupon_payout', array() );
			if ( empty( $allowed_coupon_types_for_payout ) || ! is_array( $allowed_coupon_types_for_payout ) ) {
				return false;
			}

			return in_array( $this->sc_discount_type, $allowed_coupon_types_for_payout, true );
		}

		/**
		 * Method to add Smart Coupons > Store Credit as option in the payout via coupon setting.
		 *
		 * @param array $allowed_coupon_types Array of allowed coupon types.
		 *
		 * @return array Updated $allowed_coupon_types
		 */
		public function add_smart_coupons( $allowed_coupon_types = array() ) {
			// Push Smart Coupons' Store Credit if we get empty array.
			if ( empty( $allowed_coupon_types ) || ! is_array( $allowed_coupon_types ) ) {
				return array( $this->sc_discount_type );
			}

			// Otherwise, push Smart Coupons' Store Credit in existing array.
			$allowed_coupon_types[] = $this->sc_discount_type;

			return $allowed_coupon_types;
		}

		/**
		 * Method to update payout via coupon setting description when this is found.
		 * why: If this class is found, it means we don't want to show Smart Coupons as the plugin will be active, so simply send back updated description.
		 *
		 * @param string $description The setting description.
		 *
		 * @return string Updated $description
		 */
		public function update_description( $description = '' ) {
			return _x( 'Select coupon types to allow payouts via coupons. Leave it blank to disable payout via coupon.', 'setting description', 'affiliate-store-credit-payouts-integration-for-woocommerce' );
		}

		/**
		 * Method to add support for this payout method in automatic payouts.
		 *
		 * @param array $method_classes The available classes allowed for automatic payouts.
		 *
		 * @return array Updated $method_classes
		 */
		public function add_support_for_automatic_payouts( $method_classes = array() ) {
			if ( false === $this->is_enabled() ) {
				return $method_classes;
			}

			if ( empty( $method_classes ) || ! is_array( $method_classes ) ) {
				return array();
			}

			$method_classes['wsc-store-credit'] = get_class( $this );

			return $method_classes;
		}

		/**
		 * Method to add support for this payout method in post-payout actions.
		 *
		 * @param array $post_payout_method_classes The available classes.
		 *
		 * @return array Updated $post_payout_method_classes
		 */
		public function add_post_payout_class( $post_payout_method_classes = array() ) {
			if ( false === $this->is_enabled() ) {
				return $post_payout_method_classes;
			}

			if ( empty( $post_payout_method_classes ) || ! is_array( $post_payout_method_classes ) ) {
				return array();
			}

			$post_payout_method_classes['wsc-store-credit'] = 'AFWC_WSC_Store_Credit_Payout_Method';

			return $post_payout_method_classes;
		}

		/**
		 * Process Smart Coupons Store Credit payout via WooCommerce coupon - create a coupon.
		 *
		 * @param array  $payout_records Array of payout records.
		 * @param string $currency       Currency for payout.
		 *
		 * @return array|WP_Error|null  $response
		 */
		public function process_coupon_payout( $payout_records = array(), $currency = '' ) {
			// Check if setting is enabled/allowed.
			if ( false === $this->is_enabled() ) {
				Affiliate_For_WooCommerce::get_instance()->log(
					'error',
					_x( 'Payout Method: Smart Coupons Store Credit is disabled.', 'Logger for Smart Coupons Store Credit payout', 'affiliate-store-credit-payouts-integration-for-woocommerce' )
				);
				return;
			}

			if ( empty( $currency ) ) {
				Affiliate_For_WooCommerce::get_instance()->log(
					'error',
					_x( 'Currency missing for Smart Coupons Store Credit payout.', 'Logger for Smart Coupons Store Credit payout', 'affiliate-store-credit-payouts-integration-for-woocommerce' )
				);
				return;
			}

			if ( empty( $payout_records ) || ! is_array( $payout_records ) ) {
				Affiliate_For_WooCommerce::get_instance()->log(
					'error',
					_x( 'Payout records are not available for Smart Coupons Store Credit payout.', 'Logger for Smart Coupons Store Credit payout', 'affiliate-store-credit-payouts-integration-for-woocommerce' )
				);
				return;
			}

			// check if we find affiliate.
			if ( empty( $payout_records['id'] ) ) {
				Affiliate_For_WooCommerce::get_instance()->log(
					'error',
					_x( 'Missing affiliate ID for Smart Coupons Store Credit payout.', 'Logger for Smart Coupons Store Credit payout', 'affiliate-store-credit-payouts-integration-for-woocommerce' )
				);
				return;
			}

			$affiliate_account_email = '';
			$affiliate_user          = get_user_by( 'id', $payout_records['id'] );
			if ( is_object( $affiliate_user ) && $affiliate_user instanceof WP_User ) {
				$affiliate_account_email = ( ! empty( $affiliate_user->user_email ) ? $affiliate_user->user_email : '' );
			}

			if ( empty( $affiliate_account_email ) ) {
				Affiliate_For_WooCommerce::get_instance()->log(
					'error',
					sprintf(
						/* translators: The affiliate ID */
						_x( 'Missing affiliate (ID: %s) account email address Smart Coupons Store Credit payout.', 'Logger for Smart Coupons Store Credit payout', 'affiliate-store-credit-payouts-integration-for-woocommerce' ),
						$payout_records['id']
					)
				);
				return;
			}

			// Check if Smart Coupons is available.
			if ( ! class_exists( 'WC_Smart_Coupons' ) ) {
				if ( file_exists( AFW_PLUGIN_DIRPATH . 'woocommerce-smart-coupons/includes/class-wc-smart-coupons.php' ) ) {
					include_once AFW_PLUGIN_DIRPATH . 'woocommerce-smart-coupons/includes/class-wc-smart-coupons.php';
				}
			}

			if ( class_exists( 'WC_Smart_Coupons' ) && is_callable( array( 'WC_Smart_Coupons', 'get_instance' ) ) ) {
				$woocommerce_smart_coupon = WC_Smart_Coupons::get_instance();
			}

			// create a coupon.
			$args = array(
				'return'             => 'code',
				'discount_type'      => $this->sc_discount_type,
				'amount'             => ( ( ! empty( $payout_records['amount'] ) ) ? floatval( $payout_records['amount'] ) : 0.00 ),
				'description'        => ( _x( 'Store Credit coupon created as affiliate commission payout', 'coupon description', 'affiliate-store-credit-payouts-integration-for-woocommerce' ) ),
				'email_restrictions' => array( $affiliate_account_email ), // SC needs it in array format.
				// 'post_author'        => get_current_user_id(), // TODO: check if working.
			);
			$coupon_code = $woocommerce_smart_coupon->generate_coupon( $args );

			$result = array();
			if ( empty( $coupon_code ) ) {
				$result = array(
					'ACK' => 'Failed',
					'msg' => _x( 'Unable to create coupon', 'coupon creation failed', 'affiliate-store-credit-payouts-integration-for-woocommerce' ),
				);
			} else {
				$result = array(
					'ACK'         => 'Success',
					'coupon_code' => $coupon_code,
				);

				// Calculate total amount if 'amount' is missing in the result.
				// amount addition will be here in amount received.
				if ( empty( $args['amount'] ) ) {
					$amounts          = ! empty( $payout_records ) && is_array( $payout_records ) ? array_column( $payout_records, 'amount' ) : array();
					$result['amount'] = ! empty( $amounts ) && is_array( $amounts ) ? floatval( array_sum( $amounts ) ) : 0.00;
				} else {
					$result['amount'] = $args['amount'];
				}
			}

			/**
			 * Fires immediately after Smart Coupons Store Credit commission payout.
			 *
			 * @param array $result         The results
			 * @param array $payout_records  The Payout records.
			 * @param array
			 */
			do_action( 'afwc_after_sc_store_credit_commission_payout', $result, $payout_records, array( 'source' => $this ) );

			return $result;
		}

	}
}

WSC_AFWC_Store_Credit_API::get_instance();
