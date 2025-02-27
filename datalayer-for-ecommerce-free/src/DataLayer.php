<?php
/**
 * DataLayer Init
 *
 * @version 1.0.1
 * @package 'datalayer'
 */

namespace DatalayerForWoocommerceFree;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'DataLayer' ) ) :
	/**
	 * Class DataLayer
	 */
	class DataLayer {

		/**
		 * Verify if DataLayer is UA option
		 *
		 * @name 'is_data_layer_ua'
		 */
		public static function is_data_layer_ua() {
			$options = get_option( 'options_tracking_option_free' );
			if ( isset( $options['data_layer_google_tag_manager_enhanced_ecommerce'] ) ) {
				if ( $options['data_layer_google_tag_manager_enhanced_ecommerce'] ) {
					return true;
				}
			}
			return false;
		}

		/**
		 * Verify if DataLayer is GA4 option
		 *
		 * @name 'is_data_layer_ga4'
		 */
		public static function is_data_layer_ga4() {
			$options = get_option( 'options_tracking_option_free' );
			if ( isset( $options['data_layer_google_tag_manager_ecommerce_ga4'] ) ) {
				if ( $options['data_layer_google_tag_manager_ecommerce_ga4'] ) {
					return true;
				}
			}
			return false;
		}

		/**
		 * Generate_event_id_datalayer
		 *
		 * @name 'generate_event_id_datalayer'
		 * @return string
		 */
		public static function generate_event_id_datalayer() {
			$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

			return substr( str_shuffle( str_repeat( $pool, 10 ) ), 0, 10 );
		}

		/**
		 * Get_woocommerce_tax_display_shop.
		 *
		 * @name 'get_woocommerce_tax_display_shop'
		 */
		public static function get_woocommerce_tax_display_shop() {
			return get_option( 'woocommerce_tax_display_shop' ) === 'incl';
		}

		/**
		 * Get_related_product_show.
		 *
		 * @name 'get_related_product_show'
		 */
		public static function get_related_product_show() {
			$options = get_option( 'options_tracking_option_free' );
			if ( isset( $options['data_layer_google_tag_manager_related_product_show'] ) ) {
				if ( $options['data_layer_google_tag_manager_related_product_show'] ) {
					return true;
				}
				return false;
			}
			return false;
		}

	}
endif;
