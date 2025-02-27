<?php
/**
 * Price related functions.
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if (!function_exists('cre_format_amount')) {
	/**
	 * Return given amount in a configured format.
	 *
	 * @since  1.0.0
	 * @param  string $amount An amount that has to be formatted.
	 * @return string
	 */
	function cre_format_amount($amount)
	{

		// Return if amount is empty or not a number.
		if (empty($amount) || is_nan($amount)) {
			return '';
		}

        $currency_sign       = cre_get_currency_sign();
        $decimals            = '0';
        $decimal_point       = '.';
        $thousands_separator = ',';
        $currency_position   = get_option('cre_currency_sign_position', 'before');
        $formatted_price     = number_format($amount, $decimals, $decimal_point, $thousands_separator);
        $formatted_price     = apply_filters('cre_property_price', $formatted_price, $amount);
        return ('after' == $currency_position) ? $formatted_price . $currency_sign : $currency_sign . $formatted_price;
	}
}

if (!function_exists('cre_get_currency_sign')) {
	/**
	 * Get Currency
	 *
	 * @return string
	 */
	function cre_get_currency_sign()
	{
		return apply_filters('cre_currency_sign', get_option('cre_currency_sign', esc_html__('$', 'crucial-real-estate')));
	}
}

if (!function_exists('cre_no_price_text')) {
	/**
	 * Returns text to display in case of empty price
	 *
	 * @return string
	 */
	function cre_no_price_text()
	{
		return apply_filters('cre_no_price_text', get_option('cre_empty_price_text', esc_html__('Price On Call', 'crucial-real-estate')));
	}
}

if (!function_exists('cre_property_sale_price')) {
	/**
	 * Returns property current and old price if not empty otherwise current price.
	 *
	 * @param  string $current_price current price.
	 * @param  string $old_price Old price.
	 *
	 * @return string
	 */
	function cre_property_sale_price($current_price, $old_price)
	{

		if (!empty($current_price) && !empty($old_price)) {
			return sprintf('<span class="property-price-wrapper"><ins class="property-current-price">%s</ins> <del class="property-old-price">%s</del></span>', esc_html($current_price), esc_html($old_price));
		}

		return $current_price;
	}
}

if (!function_exists('cre_get_property_old_price')) {
	/**
	 * Returns property old price in configured format.
	 *
	 * @since  1.0.0
	 *
	 * @param int $property_id Property ID to get old price for.
	 *
	 * @return string
	 */
	function cre_get_property_old_price($property_id = 0)
	{

		// Set property ID if it's not given.
		if (empty($property_id)) {
			$property_id = get_the_ID();
		}

		// Get property old price.
		$amount = get_post_meta($property_id, 'cre_property_old_price', true);

		return cre_format_amount($amount);
	}
}

if (!function_exists('cre_get_property_price')) {
	/**
	 * Returns property price in configured format.
	 *
	 * @param int $property_id Property ID to get price for.
	 * @param bool $show_old_price
	 *
	 * @return string
	 */
	function cre_get_property_price($property_id = 0, $show_old_price = false)
	{

		// Set property ID if it's not given.
		if (empty($property_id)) {
			$property_id = get_the_ID();
		}

		// Get property price.
		$amount = get_post_meta($property_id, 'cre_property_price', true);

		// Return no price text if price is empty.
		if (empty($amount) || is_nan($amount)) {
			return cre_no_price_text();
		}

		$price = cre_format_amount($amount);

		/**
		 * Filter condition to show property current and old price for all or specific properties.
		 *
		 * @since 1.0.0
		 *
		 * @param bool $show_old_price Current boolean. False by default.
		 * @param int $property_id Current property id.
		 */
		if (true === apply_filters('cre_show_properties_old_price', $show_old_price, $property_id)) {
			$price = cre_property_sale_price($price, cre_get_property_old_price());
		}

		// Get price prefix & postfix.
		$price_prefix  = get_post_meta($property_id, 'cre_property_price_prefix', true);
		$price_postfix = get_post_meta($property_id, 'cre_property_price_postfix', true);

        $output = '';
        if ( $price_prefix ) {
            $output .= '<span class="cre-price-prefix">';
            $output .= esc_html( $price_prefix );
            $output .= '</span>';
        }

        $output .= '<span class="cre-price">'.wp_kses_post($price).'</span>';

        if ( $price_postfix ) {
            $output .= '<span class="cre-price-postfix">';
            $output .= esc_html( $price_postfix );
            $output .= '</span> ';
        }

        return $output;
	}
}

if (!function_exists('cre_property_price')) {
	/**
	 * Output property price.
	 *
	 * @param int $property_id
	 * @param bool $show_old_price
	 */
	function cre_property_price($property_id = 0, $show_old_price = false)
	{
		echo cre_get_property_price($property_id, $show_old_price); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if (!function_exists('cre_get_property_floor_price')) {
	/**
	 * Returns floor price in configured format
	 *
	 * @param  array $floor_plan An array of floor plan information.
	 * @return string
	 */
	function cre_get_property_floor_price($floor_plan)
	{

		// Find floor plan price.
		$amount = doubleval($floor_plan['cre_floor_plan_price']);

		// Return no price text if price is empty.
		if (empty($amount) || is_nan($amount)) {
			return cre_no_price_text();
		}

		$price = cre_format_amount($amount);

		// Retrieve floor plan price postfix.
		$price_postfix = isset($floor_plan['cre_floor_plan_price_postfix']) ? esc_html($floor_plan['cre_floor_plan_price_postfix']) : '';
		$price_markup  = '<span class="floor-price-value">' . wp_kses_post($price) . '</span> ' . esc_html($price_postfix);

		return $price_markup;
	}
}

if (!function_exists('cre_property_floor_price')) {
	/**
	 * Display floor plan price.
	 *
	 * @param  array $floor_plan An array of floor plan information.
	 * @return void
	 */
	function cre_property_floor_price($floor_plan)
	{
		echo cre_get_property_floor_price($floor_plan); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
