<?php
/**
 * DatalayerForWoocommerceFree Deactivate
 *
 * @version 1.0.1
 * @package 'datalayer-for-ecommerce-free'
 */

namespace DatalayerForWoocommerceFree;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Deactivate' ) ) :
	/**
	 * Class Deactivate
	 */
	final class Deactivate {

		/**
		 *  Deactivate
		 */
		public static function deactivate() {
			flush_rewrite_rules();
		}

	}
endif;
