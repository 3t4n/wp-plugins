<?php
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Woo_Variation_Price_Display_Frontend' ) ) {
	/**
	 * Plugin Front-End
	 */
	class Woo_Variation_Price_Display_Frontend {
		protected static $_instance = null;

		protected function __construct() {
			$this->includes();
			$this->hooks();
			$this->init();

			do_action( 'woo_variation_price_display_frontend_loaded', $this );
		}

		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}

		protected function includes() {
		}

		protected function hooks() {
			if ( 'no' == get_option( 'wclp_enable_shop_page', 'yes' ) && 'no' == get_option( 'wclp_enable_product_page', 'yes' ) ) {
				return;
			}

//	        add_filter( 'woocommerce_variable_sale_price_html', array( $this, 'variable_price_html' ), 10, 2 );
//          add_filter( 'woocommerce_variable_price_html', array( $this, 'variable_price_html' ), 10, 2 );
			add_filter( 'woocommerce_get_price_html', array( $this, 'variable_price_html' ), 10, 2 );

			// Hide Reset link from product page
			if ( 'yes' == get_option( 'wclp_hide_reset' ) ) {
				add_filter( 'woocommerce_reset_variations_link', '__return_false', 10 );
			}
		}

		protected function init() {
		}

		public function variable_price_html( $price, $product ) {
			// Do not modify on admin panel
			if ( is_admin() ) {
				return $price;
			}

			if ( 'variable' !== $product->get_type() ) {
				return $price;
			}

			$price_type             = apply_filters( 'woo_variation_price_display_type', get_option( 'wclp_price_types', 'min' ), $product );
			$price_title_before     = get_option( 'wclp_title_before', 'From:' );
			$price_title_after      = get_option( 'wclp_title_after', '' );
			$hide_crossed_price     = get_option( 'wclp_crossed_price', 'no' );
			$enable_on_shop_page    = get_option( 'wclp_enable_shop_page', 'yes' );
			$enable_on_product_page = get_option( 'wclp_enable_product_page', 'yes' );

			if ( apply_filters( 'woo_variation_price_display_disable', false, $product ) ) {
				return $price;
			}

			if ( 'no' == $enable_on_shop_page && ( is_shop() || is_product_taxonomy() ) ) {
				return $price;
			}

			if ( 'no' == $enable_on_product_page && is_product() ) {
				return $price;
			}

			$prefix = apply_filters( 'woo_variation_price_title_prefix', sprintf( '%s', __( $price_title_before, 'woo-variation-price-display' ) ), $product );
			$suffix = apply_filters( 'woo_variation_price_title_suffix', sprintf( '%s', __( $price_title_after, 'woo-variation-price-display' ) ), $product );

			if ( 'min-to-max' == $price_type || 'max-to-min' == $price_type ) {
				$min_price = $product->get_variation_price( 'min', true );
				$max_price = $product->get_variation_price( 'max', true );
			}

			// Minimum to Maximum Price
			if ( 'min-to-max' == $price_type ) {
				$price = wc_format_price_range( $min_price, $max_price );

				$price = sprintf( '%1$s %2$s %3$s',
					$prefix,
					$price,
					$suffix
				);

				return apply_filters( 'wdvpr_price_html', $price, $product );
			}

			// Maximum to Minimum Price
			if ( 'max-to-min' == $price_type ) {
				$price = wc_format_price_range( $max_price, $min_price );

				$price = sprintf( '%1$s %2$s %3$s',
					$prefix,
					$price,
					$suffix
				);

				return apply_filters( 'wdvpr_price_html', $price, $product );
			}

			if ( 'list' == $price_type ) {
				return apply_filters( 'wdvpr_price_html', $this->variation_price_list( $product ), $product );
			}

			$min_var_reg_price  = $product->get_variation_regular_price( 'min', true );
			$max_var_reg_price  = $product->get_variation_regular_price( 'max', true );
			$min_var_sale_price = $product->get_variation_sale_price( 'min', true );
			$max_var_sale_price = $product->get_variation_sale_price( 'max', true );

			// Prepare price based on price type
			$variable_price = ( 'min' == $price_type ) ? $min_var_reg_price : $max_var_reg_price;
			$sale_price     = ( 'min' == $price_type ) ? $min_var_sale_price : $max_var_sale_price;

			// $price = ( $product->is_on_sale() ) ? sprintf( '%1$s <del>%2$s</del> <ins>%3$s</ins>', $prefix, wc_price( $max_var_reg_price ), wc_price( $min_var_sale_price ) ) : sprintf( '%1$s %2$s', $prefix, wc_price( $min_var_reg_price ) );

			if ( $product->is_on_sale() ) {
				// Run if variation on sale

				// if variable price lower then sale price
				// $variable_price = ( $variable_price < $sale_price ) ? $max_var_reg_price : $variable_price;

				if ( $variable_price == $sale_price ) {
					$price = sprintf( '%1$s %2$s %3$s',
						$prefix,
						wc_price( $sale_price ),
						$suffix
					);
				} else {
					if ( 'yes' == $hide_crossed_price ) {
						$price = sprintf( '%1$s <ins>%2$s</ins> %3$s',
							$prefix,
							wc_price( $sale_price ),
							$suffix
						);
					} else {
						$price = sprintf( '%1$s <del>%2$s</del> <ins>%3$s</ins> %4$s',
							$prefix,
							wc_price( $variable_price ),
							wc_price( $sale_price ),
							$suffix
						);
					}
				}
			} else {
				// Run always
				$price = sprintf( '%1$s %2$s %3$s', $prefix, wc_price( $variable_price ), $suffix );
			}

			return apply_filters( 'wdvpr_price_html', $price, $product );
		}

		/**
		 * Display variation price list
		 *
		 * @param $product
		 *
		 * @return string
		 */
		public function variation_price_list( $product ) {
			$prices     = $product->get_variation_prices( true );
			$price_list = '';

			foreach ( $prices['price'] as $id => $price ) {
				$child = wc_get_product( $id );

				if ( $child->is_type( 'variation' ) ) {
					$name = wc_get_formatted_variation( $child->get_variation_attributes(), true, false );
				}

				if ( isset( $prices['regular_price'] ) && (float) $price !== (float) $prices['regular_price'][ $id ] && 'no' == get_option( 'wclp_crossed_price', 'no' ) ) {
					$price = wc_format_sale_price( wc_price( $prices['regular_price'][ $id ] ), wc_price( $prices['price'][ $id ] ) );
				}

				$price = is_numeric( $price ) ? wc_price( $price ) : $price;
				$price .= $child->get_price_suffix();

				$price_list .= sprintf(
					'<span class="variation-list-item">%1$s %2$s %3$s</span><br/>',
					apply_filters( 'wvpd_variation_price_list_name', $name, $id, $child, $product ),
					apply_filters( 'wvpd_variation_price_list_name_price_separator', '-' ),
					apply_filters( 'wvpd_variation_price_list_price', $price, $id, $child, $product )
				);
			}

			return apply_filters( 'wvpd_variation_price_list', wp_kses_post( $price_list ), $prices, $product );
		}
	}
}