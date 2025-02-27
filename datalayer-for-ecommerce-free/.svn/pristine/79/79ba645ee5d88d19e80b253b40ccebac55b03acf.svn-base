<?php
/**
 * User Init
 *
 * @version 1.0.1
 * @package 'datalayer'
 */

namespace DatalayerForWoocommerceFree\User;

use DatalayerForWoocommerceFree\DataLayer;
use DatalayerForWoocommerceFree\JsScriptManager\JsScriptInjector;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'User' ) ) :
	/**
	 * Class User
	 */
	class User {

		/**
		 * User
		 *
		 * @var object $user User.
		 */
		public $user;

		/**
		 * Init constructor.
		 */
		public function __construct( $user = null ) {
			if ($user) {
				$this->user = $user;
			}
		}

		/**
		 * Show_user_info.
		 *
		 * @name 'show_user_info'
		 */
		public function show_user_info() {
			$options = get_option( 'options_tracking_option_free' );
			return $options['data_layer_google_tag_manager_show_user_info'];
		}

		/**
		 * GetPhoneNumberE164.
		 *
		 * @param string $phone_number
		 */
		public function getPhoneNumberE164( $phone_number ) {
			$shipping_country = WC()->customer->get_shipping_country();
			$country_code     = str_replace('+', '', WC()->countries->get_country_calling_code($shipping_country));

			if (strpos($phone_number, $country_code) !== 0) {
				$phone_number = $country_code . $phone_number;
			}

			return preg_replace('/[+\s()-]/', '', $phone_number);
		}
	}
endif;
