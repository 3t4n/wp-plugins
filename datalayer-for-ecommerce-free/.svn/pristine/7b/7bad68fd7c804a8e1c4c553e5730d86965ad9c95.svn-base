<?php
/**
 * RenderProduct Init
 *
 * @version 1.0.1
 * @package 'datalayer'
 */

namespace DatalayerForWoocommerceFree;
use DatalayerForWoocommerceFree\JsScriptManager\JsScriptInjector;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'RenderProduct' ) ) :
	/**
	 * Class RenderProduct
	 */
	class RenderProduct {

		/**
		 * Measuring product detail e product related
		 *
		 * @param object $product    Product.
		 * @param array  $products_related   Product Related.
		 * @name 'mount_measuring_views_of_product_details_data_layer'
		 */
		public static function mount_measuring_views_of_product_details_data_layer( $product ) {

			$event_id       = DataLayer::generate_event_id_datalayer();
			$data_layer_ua  = DataLayer::is_data_layer_ua();
			$data_layer_ga4 = DataLayer::is_data_layer_ga4();
			$currency_code  = get_woocommerce_currency();
			$products       = array( $product );

			$impressions = self::prepare_impressions_items( $products, null, 1, $data_layer_ua, $data_layer_ga4, false );

			if ( $data_layer_ga4 ) {
				$data_layer = array(
					'event'     => 'view_item',
					'event_id'  => $event_id,
					'ecommerce' => array(
						'currency' => $currency_code,
						'value' => $impressions[0]['price'],
						'items'    => $impressions
					),
				);
				JsScriptInjector::push_to_data_layer_sleep( $data_layer );
			}

		}

		/**
		 * Prepare impressions items
		 *
		 * @param array  $products          Receive products objects.
		 * @param int|null     $variation_id      Variation_id.
		 * @param int     $quantity      Variation_id.
		 * @param boolean $data_layer_ua     Receive datalayer if ua variable.
		 * @param boolean $data_layer_ga4    Receive datalayer if ga4 variable.
		 * @param boolean $enqueue_script    Receive enqueue_script if impressions will go to javascript.
		 * @name 'prepare_impressions_items'
		 */
		public static function prepare_impressions_items( $products, $variation_id, $quantity, $data_layer_ua, $data_layer_ga4, $enqueue_script ) {

			$product_brand_taxonomy_slug    = '';
			$tax                            = DataLayer::get_woocommerce_tax_display_shop();
			$impressions                    = array();
			$count                          = 1;
			foreach ( $products as $key => $product ) :
				if (!$product) {
					return array();
				}
				$category_ids     = $product->get_category_ids();
				$count_categories = 1;
				$category         = array();
				foreach ($category_ids as $category_id) {
					$category_key            = ( 1 === $count_categories ) ? 'item_category' : 'item_category' . $count_categories;
					$category[$category_key] = get_the_category_by_ID($category_id);
					++$count_categories;
				}

				$brand_ids = wc_get_product_term_ids($product->get_id(), $product_brand_taxonomy_slug);
				$brand     = '';
				if ( isset( $brand_ids[0] ) ) {
					$term = get_term_by('id', $brand_ids[0], $product_brand_taxonomy_slug);
					if ( isset($term) ) {
						$brand = $term->name;
					}
				}

				$variant = '';
				$price   = $product->get_price();

				$name = $product->get_name();

				$product_id = $product->get_id();

				if ( $product->is_type( 'variable' ) && isset( $variation_id ) ) {
					$product_variable = new \WC_Product_Variation( $variation_id );
					$variations_data  = $product_variable->get_attributes();
					$price            = $product_variable->get_price();

					if ( is_array( $variations_data ) && ! empty( $variations_data ) ) {
						foreach ( $variations_data as $variation_data ) {
							if ( end($variations_data) === $variation_data ) {
								$variant .= $variation_data;
							} else {
								$variant .= $variation_data . ',';
							}
						}
					}
				}

				$list = '';
				if ( is_front_page() ) {
					$list = 'Home';
				}
				if ( is_shop() ) {
					$list = 'Shop';
				}
				if ( is_search() ) {
					$list = 'Search';
				}
				if ( is_product_category() ) {
					$list = 'Category';
				}
				if ( is_product_tag() ) {
					$list = 'Tag';
				}
				if ( is_product() ) {
					$list = 'Product Detail';
				}

				if ( $data_layer_ua ) {
					$category = '';
					if ( isset( $category_ids[0] ) ) {
						$category = get_the_category_by_ID( $category_ids[0] );
					}
					$impressions[$key] = array(
						'name'     => $name,
						'id'       => $product_id,
						'price'    => (float) $price,
						'brand' => $brand,
						'category' => $category,
						'variant'  => $variant,
						'list'     => $list,
						'position' => $count,
					);
				}

				if ( $data_layer_ga4 ) {
					$impressions[$key] = array(
						'item_id'        => $product_id,
						'item_name'      => $name,
						'price'          => (float) $price,
						'item_list_name' => $list,
						'index'          => $count,
						'quantity' => $quantity,
						'item_brand' => $brand,
						'item_variant'   => $variant,
						/** 'item_list_id' => */
						/** 'discount' => */
					);
					$impressions[$key] += $category;
				}

				++$count;
			endforeach;
			return $impressions;
		}

		/**
		 * Measuring product impressions
		 *
		 * @param array $products     Receive global Products.
		 * @name 'mount_measuring_product_impressions_data_layer'
		 */
		public static function mount_measuring_product_impressions_data_layer( $products ) {

			$event_id       = DataLayer::generate_event_id_datalayer();
			$data_layer_ua  = DataLayer::is_data_layer_ua();
			$data_layer_ga4 = DataLayer::is_data_layer_ga4();
			$currency_code  = get_woocommerce_currency();

			$impressions = self::prepare_impressions_items( $products, null, 1, $data_layer_ua, $data_layer_ga4, false );

			if (is_product()) {
				$impressions = array_map(function ( $item ) {
					$item['item_list_name'] = 'Related Products';
					return $item;
				}, $impressions);
			}

			if ( $data_layer_ga4 ) {
				$data_layer = array(
					'event'     => 'view_item_list',
					'event_id'  => $event_id,
					'ecommerce' => array(
						'currency' => $currency_code,
						'items'    => $impressions,
					),
				);
				JsScriptInjector::push_to_data_layer_sleep( $data_layer );
			}
		}

	}
endif;
