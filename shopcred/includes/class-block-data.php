<?php
/**
 * Functions used for Block Data
 *
 * @package ShopCred
 */
namespace ShopCred;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Block_Data {

	/**
	 * Member Variable
	 *
	 * @since 1.0.0
	 * @var instance
	 */
	private static $instance;

	/**
	 *  Initiator
	 *
	 * @since 1.0.0
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Retrive attributes from our blocks.
	 *
	 * @since 1.0.0
	 * @param array $content The content of our page.
	 * @param array $data Data used to loop through the function as needed.
	 * @param int   $depth Keep track of how deep we are in nested blocks.
	 *
	 * @return array
	 */
	public static function get_block_data( $content, $data = array(), $depth = 0 ) {
		if ( ! is_array( $content ) || empty( $content ) ) {
			return;
		}

		foreach ( $content as $index => $block ) {
			if ( ! is_object( $block ) && is_array( $block ) && isset( $block['blockName'] ) ) {
				
				if ( 'spc/woo-product' === $block['blockName'] ) {
					$data['woo-product'][] = $block['attrs'];
				}
			
				if ( 'core/block' === $block['blockName'] ) {
					if ( isset( $block['attrs'] ) && is_array( $block['attrs'] ) ) {
						$atts = $block['attrs'];

						if ( isset( $atts['ref'] ) && ( empty( $data['reusableBlockIds'] ) || ! in_array( $atts['ref'], (array) $data['reusableBlockIds'] ) ) ) {
							$reusable_block = get_post( $atts['ref'] );

							if ( $reusable_block && 'wp_block' === $reusable_block->post_type && 'publish' === $reusable_block->post_status ) {
								$reuse_data_block = parse_blocks( $reusable_block->post_content );

								if ( ! empty( $reuse_data_block ) ) {
									$data['reusableBlockIds'][] = $atts['ref'];
									$data = self::get_block_data( $reuse_data_block, $data );
								}
							}
						}
					}
				}

				if ( isset( $block['innerBlocks'] ) && ! empty( $block['innerBlocks'] ) && is_array( $block['innerBlocks'] ) ) {
					$data = self::get_block_data( $block['innerBlocks'], $data, $depth );
				}
			}
		}
		

		return $data;
	}

	/**
	 * Parse our content for blocks.
	 *
	 * @param string $content Optional content to parse.
	 * @since 1.0.0
	 */
	public static function get_parsed_content( $content = '' ) {
		if ( ! function_exists( 'has_blocks' ) ) {
			return;
		}

		if(!is_plugin_active(SPC_PLUGIN_PRO_FOLDER_NAME_TYPE1.'/shopcred-pro.php')){
			$id = ( isset(get_option( 'shopcred-settings' )['enable_spc_shop_page_template']) ) ? get_option( 'shopcred-settings' )['spc_shop_page_template'] : get_the_ID();
		} else{
			$id = ( isset(get_option( 'shopcred-pro-settings' )['enable_spc_shop_page_template']) ) ? get_option( 'shopcred-pro-settings' )['spc_shop_page_template'] : get_the_ID();
		}

		$enable_custom_shop_tmpl = filter_var( shopCred_admin_settings_config()->get( 'enable_spc_shop_page_template' ), FILTER_VALIDATE_BOOLEAN );
		$custom_shop_tmpl_id = shopCred_admin_settings_config()->get( 'spc_shop_page_template' );

		$content = "";
		$post = "";

		if($enable_custom_shop_tmpl && is_shop()) 
		{
			$post = get_post($custom_shop_tmpl_id);
			// echo "<pre>"; print_r($post); echo "</pre>";
		} 
		else
		{
			return;
		}
		
		if ( ! $content && has_blocks( (int) $id ) ) {
		
			// global $post;

			if ( ! is_object( $post ) ) {
				return;
			}

			if ( Helper::is_shopcred() ) {
				$post = get_post($id);
			} 

			$content = $post->post_content;
			
		}

		$content = apply_filters( 'shopcred_do_content', $content );

		if ( ! function_exists( 'parse_blocks' ) ) {
			return;
		}

		$content = parse_blocks( $content );

		return $content;
	}

	/**
	 * Get our media query.
	 *
	 * @since 1.0.0
	 * @param string $type The media query we're getting.
	 *
	 * @return string
	 */
	public static function get_media_query( $type ) {
		$queries = apply_filters(
			'shopcred_media_query',
			array(
				'desktop'     => '(min-width: 1025px)',
				'tablet'      => '(max-width: 1024px)',
				'tablet_only' => '(max-width: 1024px) and (min-width: 768px)',
				'mobile'      => '(max-width: 767px)',
			)
		);

		return $queries[ $type ];
	}

	/**
	 * Build our list of Google fonts on this page.
	 *
	 * @since 1.0.0
	 * @param string $content Optional content to parse.
	 * @return array
	 */
	public static function get_google_fonts( $content = '' ) {
		$content = self::get_parsed_content( $content );

		if ( ! $content ) {
			return;
		}

		$data = self::get_block_data( $content );

		$defaults = Block_Defaults_Attributes::get_Block_DefaultsAttributes();
		$font_data = array();

		if ( ! empty( $data ) ) {
			foreach ( $data as $name => $blockData ) {

				if ( 'woo-product' === $name ) {
					foreach ( $blockData as $atts ) {
						$woo_grid_settings = wp_parse_args(
							$atts,
							$defaults['woo-product']
						);

						if ( $woo_grid_settings['productTitleLoadGoogleFonts'] || $woo_grid_settings['productExcerptLoadGoogleFonts'] || $woo_grid_settings['productPriceLoadGoogleFonts'] || $woo_grid_settings['addToCartbtnLoadGoogleFonts'] || $woo_grid_settings['productTaxonomyFontFamily'] ) {
							$id = $atts['block_id'];
							$font_data[] = array(
								'name' => $woo_grid_settings['productTitleFontFamily']
							);
							$font_data[] = array(
								'name' => $woo_grid_settings['productPriceFontFamily']
							);	
							$font_data[] = array(
								'name' => $woo_grid_settings['productExcerptFontFamily']
							);
							$font_data[] = array(
								'name' => $woo_grid_settings['addToCartbtnFontFamily']
							);
							$font_data[] = array(
								'name' => $woo_grid_settings['productTaxonomyFontFamily']
							);
						}
					}
				}
				
			}	
		}

		$fonts = array();

		foreach ( (array) $font_data as $font ) {
			$id = str_replace( ' ', '', strtolower( $font['name'] ) );

			$fonts[ $id ]['name'] = $font['name'];

			if ( ! empty( $font['variants'] ) ) {
				foreach ( $font['variants'] as $variant ) {
					if ( isset( $fonts[ $id ]['variants'] ) ) {
						if ( in_array( $variant, (array) $fonts[ $id ]['variants'] ) ) {
							continue;
						}
					}

					$fonts[ $id ]['variants'][] = $variant;
				}
			}
		}

		return apply_filters( 'shopcred_google_fonts', $fonts );
	}

	/**
	 * Build the Google Font request URI.
	 *
	 * @since 1.0.0
	 *
	 * @return string The request URI to Google Fonts.
	 */
	public static function get_google_fonts_uri() {
		$google_fonts = self::get_google_fonts();

		if ( ! $google_fonts ) {
			return;
		}

		$data = array();

		foreach ( $google_fonts as $font ) {
			$variants = array();

			if ( ! empty( $font['variants'] ) ) {
				foreach ( $font['variants'] as $variant ) {
					$variants[] = $variant;
				}
			}

			$variants = apply_filters( 'shopcred_google_font_variants', $variants, $font['name'] );

			$name = str_replace( ' ', '+', $font['name'] );

			if ( $variants ) {
				$data[] = $name . ':' . implode( ',', $variants );
			} else {
				$data[] = $name;
			}
		}

		$font_args = apply_filters(
			'shopcred_google_font_args',
			array(
				'family' => implode( '|', $data ),
				'subset' => null,
				'display' => 'swap',
			)
		);

		return add_query_arg( $font_args, 'https://fonts.googleapis.com/css' );
	}

	/**
	 * Convert hex to RGBA
	 *
	 * @since 1.0.0
	 * @param string $hex The hex value.
	 * @param int    $alpha The opacity value.
	 *
	 * @return string The RGBA value.
	 */
	public static function hex2rgba( $hex, $alpha ) {
		if ( ! $hex ) {
			return;
		}

		if ( 1 === $alpha || ! is_numeric( $alpha ) ) {
			return $hex;
		}

		// Make sure we're dealing with a hex value.
		if ( isset( $hex[0] ) && '#' !== $hex[0] ) {
			return $hex;
		}

		$hex = str_replace( '#', '', $hex );

		if ( strlen( $hex ) == 3 ) { // phpcs:ignore WordPress.PHP.StrictComparisons.LooseComparison
			$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
			$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
			$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
		} else {
			$r = hexdec( substr( $hex, 0, 2 ) );
			$g = hexdec( substr( $hex, 2, 2 ) );
			$b = hexdec( substr( $hex, 4, 2 ) );
		}

		$rgba = 'rgba(' . $r . ', ' . $g . ', ' . $b . ', ' . $alpha . ')';

		return $rgba;
	}

	/**
	 * Get an option from the database.
	 *
	 * @param string $option The option to get.
	 * @since 1.0.0
	 */
	public static function shopcred_get_option( $option ) {
		$defaults = Block_Defaults_Attributes::get_option_defaults();

		if ( ! isset( $defaults[ $option ] ) ) {
			return;
		}

		$options = wp_parse_args(
			get_option( 'shop-cred', array() ),
			$defaults
		);

		return $options[ $option ];
	}

	/**
	 * Build list of attributes into a string and apply contextual filter on string.
	 *
	 * The contextual filter is of the form `attributes_{context}_output`.
	 *
	 * @since 1.0.0
	 *
	 * @param string $context    The context, to build filter name.
	 * @param array  $attributes Optional. Extra attributes to merge with defaults.
	 * @param array  $settings   Optional. Custom data to pass to filter.
	 * @return string String of HTML attributes and values.
	 */
	public static function attributes( $context, $attributes = array(), $settings = array() ) {
		$attributes = self::parse_attributes( $context, $attributes, $settings );

		$output = '';

		// Cycle through attributes, build tag attribute string.
		foreach ( $attributes as $key => $value ) {

			if ( ! $value ) {
				continue;
			}

			if ( true === $value ) {
				$output .= esc_html( $key ) . ' ';
			} else {
				$output .= sprintf( '%s="%s" ', esc_html( $key ), esc_attr( $value ) );
			}
		}

		$output = apply_filters( "attributes_{$context}_output", $output, $attributes, $settings, $context );

		return trim( $output );
	}

	/**
	 * Merge array of attributes with defaults, and apply contextual filter on array.
	 *
	 * The contextual filter is of the form `attributes_{context}`.
	 *
	 * @since 1.0.0
	 *
	 * @param string $context    The context, to build filter name.
	 * @param array  $attributes Optional. Extra attributes to merge with defaults.
	 * @param array  $settings   Optional. Custom data to pass to filter.
	 * @return array Merged and filtered attributes.
	 */
	public static function parse_attributes( $context, $attributes = array(), $settings = array() ) {
		$defaults = array(
			'class' => sanitize_html_class( $context ),
		);

		$attributes = wp_parse_args( $attributes, $defaults );

		// Contextual filter.
		return apply_filters( "attributes_{$context}", $attributes, $settings, $context );
	}

}

Block_Data::get_instance();