<?php
/**
 * FunctionsWoocommerceBlocks Init
 *
 * @version 1.0.1
 * @package 'datalayer'
 */

namespace DatalayerForWoocommerceFree\Blocks;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'FunctionsWoocommerceBlocks' ) ) :
	/**
	 * Class FunctionsWoocommerceBlocks
	 */
	final class FunctionsWoocommerceBlocks {

		/**
		 * Has_block_product_category.
		 */
		public static function has_block_product_category() {
			if (has_block('woocommerce/product-category') || has_block('woocommerce/product-new') ||
				has_block('woocommerce/handpicked-products') || has_block('woocommerce/product-top-rated') ||
				has_block('woocommerce/product-best-sellers') ) {
				return true;
			}
			return false;
		}
	}
endif;
