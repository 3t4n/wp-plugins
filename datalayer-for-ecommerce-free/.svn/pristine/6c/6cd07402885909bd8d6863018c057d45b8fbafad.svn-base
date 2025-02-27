<?php
/**
 * Notices Init
 *
 * @version 1.0.1
 * @package 'datalayer'
 */

namespace DatalayerForWoocommerceFree;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Notices' ) ) :
	/**
	 * Class Notices
	 */
	class Notices {

		/**
		 *  Add_notice_datalayer_ua_deprecated.
		 *
		 * @name 'add_notice_datalayer_ua_deprecated'
		 */
		public static function add_notice_datalayer_ua_deprecated() {
			$message = __('The option <b>DataLayer for WooCommerce Enhanced Ecommerce</b> will be deprecated. <a href="https://woocommerce.com/document/datalayer-for-woocommerce/universal-analytics-deprecated/" target="_blank" rel="nofollow">See more</a>', 'datalayer-for-woocommerce');
			$notice  = new \WC_Admin_Notices();
			$notice->add_notice('datalayer-ua-deprecated', false);
			$notice->add_custom_notice('datalayer-ua-deprecated', $message);
		}

		/**
		 *  Add_notice_requires_woocommerce_activated
		 *
		 * @name 'add_notice_requires_woocommerce_activated'
		 */
		public static function add_notice_requires_woocommerce_activated() {
			$class   = 'notice notice-error';
			$message = __( 'DataLayer for WooCommerce requires WooCommerce activated.', 'datalayer-for-ecommerce-free' );
			printf( '<div class="%1$s"><p><b>%2$s</b></p></div>', esc_attr( $class ), esc_html( $message ) );
		}

	}
endif;
