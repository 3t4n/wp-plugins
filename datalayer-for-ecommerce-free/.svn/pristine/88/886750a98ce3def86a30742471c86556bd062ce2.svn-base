<?php
/**
 * JsScriptInjector Init
 *
 * @version 1.0.1
 * @package 'datalayer'
 */

namespace DatalayerForWoocommerceFree\JsScriptManager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'JsScriptInjector' ) ) :
	/**
	 * Class JsScriptInjector
	 */
	class JsScriptInjector {

		/**
		 * Code Handler
		 *
		 * @var string $code_handler Code Handler.
		 */
		private static $code_handler;

		/**
		 * Get_code_handler.
		 *
		 * @name 'get_code_handler'
		 */
		private static function get_code_handler() {
			if ( ! isset( self::$code_handler ) ) {
				self::$code_handler = new JsQueueManager();
				add_action( 'wp_footer', array( self::$code_handler, 'print_js' ), 25 );
			}
			return self::$code_handler;
		}

		/**
		 * Push to JsScriptInjector
		 *
		 * @param array $data_layer     Receive values and encoded.
		 * @name 'push_to_data_layer'
		 */
		public static function push_to_data_layer( $data_layer ) {
			$queue_manager = self::get_code_handler();
			$queue_manager->enqueue_js($data_layer, 'push_to_data_layer');
		}

		/**
		 * Push to JsScriptInjector with TimeOut
		 *
		 * @param array $data_layer     Receive values and encoded.
		 * @name 'push_to_data_layer'
		 */
		public static function push_to_data_layer_sleep( $data_layer ) {
			$queue_manager = self::get_code_handler();
			$queue_manager->enqueue_js($data_layer, 'push_to_data_layer_sleep');
		}

		/**
		 * Push to Script
		 *
		 * @param string $script     Receive values and encoded.
		 * @name 'push_to_data_layer'
		 */
		public static function push_script( $script ) {
			$queue_manager = self::get_code_handler();
			$queue_manager->enqueue_js($script, 'push_script');
		}
	}
endif;
