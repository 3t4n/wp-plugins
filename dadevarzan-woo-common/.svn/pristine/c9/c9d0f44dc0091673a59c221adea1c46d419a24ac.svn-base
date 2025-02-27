<?php
/**
 * Plugin Name: Dadevarzan Common for WooCommerce
 * Plugin URI: https://wordpress.org/plugins/dadevarzan-woo-common
 * Description: Dadevarzan co. common shortcodes and functionality for WooCommerce.
 * Version: 1.1.2
 * Author: Dadevarzan Team
 * Author URI: http://www.dadevarzan.com
 * Text Domain: dadevarzancw
 * Domain Path: /languages
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	if ( !class_exists( 'dadevarzanWooCommon' ) ) {

		class dadevarzanWooCommon
		{

			public function __construct() {
				
				if ( !shortcode_exists( 'dv_wc_product_images' ) ) {
					add_shortcode( 'dv_wc_product_images', 'dadevarzanWooCommon::product_images' );
				}
				
				if ( !shortcode_exists( 'dv_wc_product_variation_swatches' ) ) {
					add_shortcode( 'dv_wc_product_variation_swatches', 'dadevarzanWooCommon::variation_swatches' );
				}
				
				if ( !shortcode_exists( 'dv_product_additional_information' ) ) {
					add_shortcode('dv_product_additional_information', 'dadevarzanWooCommon::display_additional_information');
				}
				
				if ( !shortcode_exists( 'dv_display_product_review' ) ) {
					add_shortcode('dv_display_product_review', 'dadevarzanWooCommon::display_product_review');
				}
				
				if ( !shortcode_exists( 'dv_product_wishlist' ) ) {
					add_shortcode('dv_product_wishlist', 'dadevarzanWooCommon::display_wishlist');
				}
				
				if ( !shortcode_exists( 'dv_product_compaire' ) ) {
					add_shortcode('dv_product_compaire', 'dadevarzanWooCommon::display_compaire');
					add_filter( 'woosc_button_position_archive', '__return_false' );
					add_filter( 'woosc_button_position_single', '__return_false' );
				}
				
				if ( !shortcode_exists( 'dv_display_product_sorting' ) ) {
					add_shortcode('dv_display_product_sorting','dadevarzanWooCommon::catalog_ordering');
				}
				
				if ( !shortcode_exists( 'dv_display_product_discount' ) ) {
					add_shortcode('dv_display_product_discount','dadevarzanWooCommon::display_discount');
				}
				

			}
					
			public static function product_images( $atts ) {
				
				if ( !function_exists( 'wp_get_attachment_image' ) )
					return;

				global $product;
				
				if ( empty($product) || !$product instanceof WC_Product)
					return '';
				
				$productId = $product->get_id();
				
				if( empty($productId) )
					return '';

				$atts = shortcode_atts(array(
					'count' => '1',
					'size' => 'medium',
				), $atts );
				
				extract( $atts );

				if( !in_array($size, get_intermediate_image_sizes()) ) {
					$size = 'medium';
				}
				
				if( empty($count) ) {
					return '';
				}

				$attachment_ids = $product->get_gallery_attachment_ids();
				
				if( empty($attachment_ids) ) {
					return '';
				}
		
				$attachment_ids = array_slice($attachment_ids,0,$count);
				
				$return = '';
				
				foreach( $attachment_ids as $attachment_id ) 
				{
					$return .= sprintf('<a class="dv-product-gallery" href="%s">%s</a>', esc_attr(esc_url(get_permalink( $productId ))), wp_get_attachment_image( $attachment_id, $size, "", array( "class" => "dv-product-alter-img") ));
				}
				
				return $return;
			}



			public static function variation_swatches( $atts ) {
				
				if ( !class_exists('woo_variation_swatches') )
					return '';
				
				global $product;
				
				if ( empty($product) || !$product instanceof WC_Product)
					return '';

				$productId = $product->get_id();
				if( empty($productId) )
					return '';

				$atts = shortcode_atts(array(
					'term' => '',
					'type' => '',
				), $atts );
				
				extract( $atts );

				$term = 'pa_'.$term;

				$attributes = wp_get_post_terms( $productId, $term);
				if ( empty($attributes) )
					return '';

				unset($options);
				
				$item = '';
				foreach ($attributes as $key => $attribute) {
                    
					if ($type === 'color') {
						
						$color = sanitize_hex_color( woo_variation_swatches()->get_frontend()->get_product_attribute_color( $attribute ) );
						$item .= sprintf( '<li class="variable-item"><span class="variable-item-span variable-item-span-color" style="background-color:%s;"></span></li>', esc_attr( $color ) );
						
					}
					
					if ($type === 'image') {
						
						$attachment_id = woo_variation_swatches()->get_frontend()->get_product_attribute_image($attribute);
						$image_size    = sanitize_text_field( woo_variation_swatches()->get_option( 'attribute_image_size', 'variation_swatches_image_size' ) );
						$image = wp_get_attachment_image_src( $attachment_id, $image_size );
						$item .= sprintf( '<li class="variable-item"><span class="variable-item-span variable-item-span-image"><img class="variable-item-image" aria-hidden="true" src="%s" width="%d" height="%d" /></span></li>', esc_url( $image[ 0 ] ), esc_attr( $image[ 1 ] ), esc_attr( $image[ 2 ] ) );
						
					}
					
					if ($type === 'button') {
						$item .= sprintf( '<li class="variable-item"><span class="variable-item-span variable-item-span-button">%s</span></li>', esc_html( $attribute->name ) );
					}

				}
				
				return sprintf('<ul class="dv-variation_swatches dv-%s">%s</ul>',esc_attr($type), $item);

			}


			public static function display_additional_information($atts) {

				// Shortcode attribute (or argument)
				$atts = shortcode_atts( array(
					'id'    => ''
				), $atts, 'product_additional_information' );

				// If the "id" argument is not defined, we try to get the post Id
				if ( ! ( ! empty($atts['id']) && $atts['id'] > 0 ) ) {
				   $atts['id'] = get_the_id();
				}

				// We check that the "id" argument is a product id
				if ( get_post_type($atts['id']) === 'product' ) {
					$product = wc_get_product($atts['id']);
				}
				// If not we exit
				else {
					return;
				}

				ob_start(); // Start buffering

				do_action( 'woocommerce_product_additional_information', $product );

				return ob_get_clean(); // Return the buffered outpout
			}

			public static function display_product_review($atts) {
				if ( !function_exists( 'comments_template' ) )
					return;

				ob_start(); // Start buffering

				comments_template();

				return ob_get_clean(); // Return the buffered outpout
			}

			public static function display_wishlist($atts) {
				
				if ( !in_array( 'woo-smart-wishlist/wpc-smart-wishlist.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) )
					return;

				// Shortcode attribute (or argument)
				$atts = shortcode_atts( array(
					'id'    => ''
				), $atts, 'wpc_smart_wishlist' );

				// If the "id" argument is not defined, we try to get the post Id
				if ( ! ( ! empty($atts['id']) && $atts['id'] > 0 ) ) {
				   $atts['id'] = get_the_id();
				}

				// We check that the "id" argument is a product id
				if ( get_post_type($atts['id']) !== 'product' ) {
					return;
				}

				return do_shortcode( '[woosw id='.$atts['id'].']' );
			}

			public static function display_compaire($atts) {
				
				if ( !in_array( 'woo-smart-compare/wpc-smart-compare.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) )
					return;

				// Shortcode attribute (or argument)
				$atts = shortcode_atts( array(
					'id'    => ''
				), $atts, 'wpc_smart_compare' );

				// If the "id" argument is not defined, we try to get the post Id
				if ( ! ( ! empty($atts['id']) && $atts['id'] > 0 ) ) {
				   $atts['id'] = get_the_id();
				}

				// We check that the "id" argument is a product id
				if ( get_post_type($atts['id']) !== 'product' ) {
					return;
				}
				
				return do_shortcode( '[woosc id='.$atts['id'].']' );
			}

			public static function catalog_ordering() {
				if ( !function_exists( 'woocommerce_catalog_ordering' ) )
					return;
				
				ob_start(); // Start buffering

				woocommerce_catalog_ordering();

				return ob_get_clean(); // Return the buffered outpout
			}
			
			public static function display_discount() {
			
				global $product;

				if ( empty($product) || !$product instanceof WC_Product)
					return '';
				
				$productId = $product->get_id();
				if( empty($productId) )
					return '';


				if( !$product->is_on_sale() )
					return '';
				
				if ($product->is_type( 'variable' )) {
					$product_variations = $product->get_available_variations();
					if (!empty($product_variations)) {
						$variation_product_id = $product_variations[0]['variation_id'];
						$variation_product = new WC_Product_Variation( $variation_product_id );
						$regularPrice = $variation_product->get_regular_price();
						$salePrice = $variation_product->get_sale_price();
						$price = $variation_product->get_price();
					} else {

						$regularPrice = $product->get_regular_price();
						$salePrice = $product->get_sale_price();
						$price = $product->get_price();
						
					}
				} else {

					$regularPrice = $product->get_regular_price();
					$salePrice = $product->get_sale_price();
					$price = $product->get_price();
					
				}
		 
				if ( empty($regularPrice) || empty($salePrice) )
					return '';

				$regular_price = (float)$regularPrice;
				$sale_price = (float)$salePrice;

				// "Saving Percentage" calculation and formatting
				$precision = 1; // Max number of decimals
				$saving_percentage = round( 100 - ( $sale_price / $regular_price * 100 ), 1 ) . '%';
				
				return sprintf( '<div class="dv-discount-percentage">%s</div>', esc_html($saving_percentage) );
			}
			
			public static function filter_wvs($input_object, $sfid)
			{
				if ( strpos($input_object['name'], '_sft_pa_') ===false )
					return $input_object;
				
				if(!isset($input_object['options']))
				{
					return $input_object;
				}
				
				foreach($input_object['options'] as $key => $option)
				{
					if( empty($option->value) || strpos($option->attributes['class'], 'sf-item-') === false )
						continue;
					
					preg_match_all('/sf-item-([0-9]+)/m', $option->attributes['class'], $matches, PREG_SET_ORDER, 0);

					if (isset($matches[0][1]))
						
						$term_id = $matches[0][1];
						$taxonomy = str_replace('_sft_', '', $input_object['name']);
						$attribute= wvs_get_wc_attribute_taxonomy( $taxonomy );
						$fields = wvs_taxonomy_meta_fields( $attribute->attribute_type );
						$available_types = wvs_available_attributes_types( $attribute->attribute_type );
						
						if ( isset( $available_types[ 'preview' ] ) && is_callable( $available_types[ 'preview' ] ) ) {
							
							ob_start();
							call_user_func( $available_types[ 'preview' ], $term_id, $attribute, $fields );
							$out = ob_get_clean();

							$clearedLabel = preg_replace('/<span class="sf-count">.*?<\/span>/m', '', $input_object['options'][$key]->label);
							
							$out = str_replace(' class="wvs-preview',' title="'.$clearedLabel.'" class="wvs-preview',$out);
							$input_object['options'][$key]->attributes = array('class' => 'dv-filter-wvs');
							$input_object['options'][$key]->label = $out.sprintf(' <div class="dv-filter-label">%s</div>', $input_object['options'][$key]->label );
						}
				}

				return $input_object;
			}
			
			public static function address_fields( $address_fields ) {
				 
				 if (get_locale() !== 'fa_IR')
					return $address_fields;
					
				 $address_fields['state']['priority'] = 50;
				 $address_fields['city']['priority'] = 60;
				 $address_fields['address_1']['priority'] = 70;
				 
				 if (isset($address_fields['address_2'])) {
					$address_fields['address_2']['priority'] = 80;
				 }
				 
				 return $address_fields;
			}

		}
		

		function dv_initialize_woo_plugin() {
			$dadevarzanWooCommon = new dadevarzanWooCommon();
			if ( function_exists('wvs_get_wc_attribute_taxonomy') ) {
				add_filter('sf_input_object_pre', 'dadevarzanWooCommon::filter_wvs', 10, 2);
			}
			add_filter( 'woocommerce_default_address_fields' , 'dadevarzanWooCommon::address_fields', PHP_INT_MAX );
		}

		add_action( 'woocommerce_init', 'dv_initialize_woo_plugin', PHP_INT_MAX );
		
	}

}
