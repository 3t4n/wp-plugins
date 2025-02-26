<?php

namespace ProfitBlue\Helpers;

/**
 * Helper
 * 
 * Helper class
 * 
 * @since 1.0.0
 * 
 */
class Helper {
		
	/**
	 * is_checked
	 * Control if checkbox is have value, and return string with checked attributte
	 *
	 * @since    1.0.0
	 * @access public
	 * 
	 * @param  string $default
	 * @param  string $value
	 *  
	 * @return string
	 */
	public static function is_checked( $default, $value ) {

		if ( $default == $value ) {
			return 'checked="checked"';
		} else {
			return '';
		}

	}

	/**
	 * is_active
	 * Control if field is have value, and return string with active css class
	 *
	 * @since    1.0.0
	 * @access public
	 * 
	 * @param  string $default
	 * @param  string $value
	 *  
	 * @return string
	 */
	public static function is_active( $default, $value ) {

		if ( $default == $value ) {
			return 'active';
		} else {
			return '';
		}

	}

	/**
	 * get_price_field_step
	 * Returns step value for form number input, based on variable value
	 *
	 * @since    1.0.0
	 * @access public
	 * 
	 * @param  int $number
	 *  
	 * @return string
	 */
	public static function get_price_field_step( $number ) {
		
		$step = '1';
		if ( $number == 1 ) {
			$step = '0.1';
		} elseif ( $number == 2 ) {
			$step = '0.01';
		} elseif ( $number == 3 ) {
			$step = '0.001';
		} elseif ( $number == 4 ) {
			$step = '0.0001';
		} elseif ( $number == 5 ) {
			$step = '0.00001';
		} elseif ( $number == 6 ) {
			$step = '0.000001';
		} elseif ( $number == 7 ) {
			$step = '0.0000001';
		} elseif ( $number == 8 ) {
			$step = '0.00000001';
		}

		return $step;

	}

	/**
	 * formated_price
	 * Returns formated price for admin pages, based on WooCommerce setting
	 *
	 * @since    1.0.0
	 * @access public
	 * 
	 * @param  float $price
	 * @param  array $args
	 *  
	 * @return string
	 */
	public static function formated_price( $price, $args = array() ) {

		$args = apply_filters(
			'wc_price_args',
			wp_parse_args(
				$args,
				array(
					'ex_tax_label'       => false,
					'currency'           => '',
					'decimal_separator'  => wc_get_price_decimal_separator(),
					'thousand_separator' => wc_get_price_thousand_separator(),
					'decimals'           => wc_get_price_decimals(),
					'price_format'       => get_woocommerce_price_format(),
				)
			)
		);
	
		$original_price = $price;
	
		// Convert to float to avoid issues on PHP 8.
		$price = (float) $price;
	
		$unformatted_price = $price;
		$negative          = $price < 0;
	
		/**
		 * Filter raw price.
		 *
		 * @param float        $raw_price      Raw price.
		 * @param float|string $original_price Original price as float, or empty string. Since 5.0.0.
		 */
		$price = apply_filters( 'raw_woocommerce_price', $negative ? $price * -1 : $price, $original_price );
	
		/**
		 * Filter formatted price.
		 *
		 * @param float        $formatted_price    Formatted price.
		 * @param float        $price              Unformatted price.
		 * @param int          $decimals           Number of decimals.
		 * @param string       $decimal_separator  Decimal separator.
		 * @param string       $thousand_separator Thousand separator.
		 * @param float|string $original_price     Original price as float, or empty string. Since 5.0.0.
		 */
		$price = apply_filters( 'formatted_woocommerce_price', number_format( $price, $args['decimals'], $args['decimal_separator'], $args['thousand_separator'] ), $price, $args['decimals'], $args['decimal_separator'], $args['thousand_separator'], $original_price );
	
		if ( apply_filters( 'woocommerce_price_trim_zeros', false ) && $args['decimals'] > 0 ) {
			$price = wc_trim_zeros( $price );
		}
	
		$formatted_price = ( $negative ? '-' : '' ) . sprintf( $args['price_format'], '', $price );
		
		return $formatted_price;

	}

	/**
	 * Get value from array
	 * 
	 * @param array        $item      Array of values.
	 * @param string       $key       Array key.
	 * @param string       $type      Data type.
	 * 
	 * @return float|int|string
	 */
	public static function get_value_from_array(  $item, $key, $type = 'float' ) {

		if ( !empty( $item[$key] ) ) {
			if ( 'float' == $type ) {
				return (float)$item[$key];
			} elseif ( 'int' == $type ) {
				return (int)$item[$key];
			} elseif ( 'string' == $type ) {
				return (string)$item[$key];
			} elseif ( 'bool' == $type ) {
				return true;
			}
		} else {
			if ( 'float' == $type ) {
				return 0;
			} elseif ( 'int' == $type ) {
				return 0;
			} elseif ( 'string' == $type ) {
				return '';
			} elseif ( 'bool' == $type ) {
				return false;
			}
		}
	}

	/**
	 * Get value from array
	 * 
	 * @return array
	 */
	public static function get_allowed_tags() {

		//wp_kses( , Helper::get_allowed_tags() )

		$allowed_tags = array(
			'a' => array(
				'class' 			=> array(),
				'id'				=> array(),
				'href'  			=> array(),
				'rel'   			=> array(),
				'title' 			=> array(),
				'data-url'			=> array(),
				'data-search'		=> array(),
				'data-show'			=> array(),
				'data-type'			=> array(),
				'data-periodyear'	=> array(),
				'data-current'		=> array(),
				'data-start'		=> array(),
				'data-end'			=> array(),
				'data-redirect'		=> array(),
				'data-year'		=> array(),
				'data-offset'		=> array(),
				'data-period'		=> array(),
				'data-step'		=> array(),
				'data-item'		=> array(),
			),
			'abbr' => array(
				'title' => array(),
			),
			'b' => array(),
			'blockquote' => array(
				'cite'  => array(),
			),
			'cite' => array(
				'title' => array(),
			),
			'code' => array(),
			'del' => array(
				'datetime' => array(),
				'title' => array(),
			),
			'dd' => array(),
			'div' => array(
				'class' => array(),
				'id'	=> array(),
				'title' => array(),
				'style' => array(),
				'data-id'	=> array(),
				'data-url'	=> array(),
				'data-line'	=> array(),
				'data-rateid'	=> array(),
				'data-target'	=> array(),
				'data-value'	=> array(),
				'data-period'	=> array(),
				'data-net-profit'	=> array(),
				'data-cogs'	=> array(),
				'data-taxes'	=> array(),
				'data-variable'	=> array(),
				'data-fixed'	=> array(),
				'data-show'	=> array(),
				'data-step'	=> array(),
				'data-hide'	=> array(),
				'data-product'	=> array(),
				'data-notexists'	=> array(),
				'data-product'	=> array(),
				'data-orders'	=> array(),
				'data-start-date'	=> array(),
				'data-end-date'	=> array(),
				'data-orders-by-date'	=> array(),
				'data-actual-year'	=> array(),
				'data-last-year'	=> array(),
				'data-ads-data'	=> array(),
				'data-type'	=> array(),
				'data-label'	=> array(),
				'data-string'	=> array(),
				'data-first-day'	=> array(),
				'data-last-day'	=> array(),
				'data-year'	=> array(),
				'data-wizard'	=> array(),
				'data-wizard-part'	=> array(),
				'data-wizard-step'	=> array(),
				'data-wizard-user'	=> array(),
				'data-micromodal-close' => array(),
			),
			'dl' => array(),
			'dt' => array(),
			'em' => array(),
			'h1' => array(),
			'h2' => array(),
			'h3' => array(),
			'h4' => array(),
			'h5' => array(),
			'h6' => array(),
			'i' => array(),
			'img' => array(
				'alt'    => array(),
				'class'  => array(),
				'height' => array(),
				'src'    => array(),
				'width'  => array(),
				'id'	=> array(),
			),
			'li' => array(
				'class' => array(),
				'data-tab' => array(),
			),
			'ol' => array(
				'class' => array(),
			),
			'p' => array(
				'class' => array(),
				'id'	=> array(),
			),
			'q' => array(
				'cite' => array(),
				'title' => array(),
			),
			'span' => array(
				'class' => array(),
				'title' => array(),
				'style' => array(),
				'id'	=> array(),
				'data-id'	=> array(),
				'data-order'	=> array(),
			),
			'strike' => array(),
			'strong' => array(),
			'ul' => array(
				'class' => array(),
				'id'	=> array(),
			),
			'form'      => array(
				'action'    => array(),
				'method'    => array(),
				'id'        => array(),
				'class'     => array(),
			),
			'input'     => array(
				'type'      => array(),
				'name'      => array(),
				'value'     => array(),
				'id'        => array(),
				'class'     => array(),
				'placeholder' => array(),
				'required'  => array(),
				'checked'   => array(),
				'data-id' => array(),
				'data-type' => array(),
				'data-month' => array(),
				'data-settings' => array(),
			),
			'textarea'  => array(
				'name'      => array(),
				'id'        => array(),
				'class'     => array(),
				'rows'      => array(),
				'cols'      => array(),
				'placeholder' => array(),
			),
			'select'    => array(
				'name'      => array(),
				'id'        => array(),
				'class'     => array(),
				'data-url'	=> array(),
				'data-start'	=> array(),
				'data-end'	=> array(),
				'data-id'	=> array(),
			),
			'option'    => array(
				'value'     => array(),
				'selected'  => array(),
				'disabled'  => array(),
			),
			'button'    => array(
				'type'      => array(),
				'name'      => array(),
				'id'        => array(),
				'class'     => array(),
			),
			'label'     => array(
				'for'       => array(),
				'class'     => array(),
				'id'	=> array(),
			),
			'svg'       => array(
				'class'         => array(),
				'id'	=> array(),
				'xmlns'         => array(),
				'viewbox'       => array(),
				'fill'          => array(),
				'stroke'        => array(),
				'width'         => array(),
				'height'        => array(),
			),
			'g'         => array(
				'fill'          => array(),
			),
			'path'      => array(
				'd'             => array(),
				'fill'          => array(),
				'stroke'        => array(),
				'stroke-width'  => array(),
			),
			'circle'    => array(
				'cx'            => array(),
				'cy'            => array(),
				'r'             => array(),
				'fill'          => array(),
			),
			'rect'      => array(
				'x'             => array(),
				'y'             => array(),
				'width'         => array(),
				'height'        => array(),
				'fill'          => array(),
			),
			'line'      => array(
				'x1'            => array(),
				'y1'            => array(),
				'x2'            => array(),
				'y2'            => array(),
				'stroke'        => array(),
			),
			'polygon'   => array(
				'points'        => array(),
				'fill'          => array(),
			),
			'polyline'  => array(
				'points'        => array(),
				'stroke'        => array(),
			),
			'ellipse'   => array(
				'cx'            => array(),
				'cy'            => array(),
				'rx'            => array(),
				'ry'            => array(),
				'fill'          => array(),
			),
		);

		return $allowed_tags;

	}

}