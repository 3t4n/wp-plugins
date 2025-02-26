<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly    

use \Automattic\WooCommerce\Utilities\OrderUtil;

if (!function_exists('opbw_check_woocommerce_active')) {
    function opbw_check_woocommerce_active() {
        if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            return true;
        }
        if (is_multisite()) {
            $plugins = get_site_option('active_sitewide_plugins');
            if (isset($plugins['woocommerce/woocommerce.php']))
                return true;
        }
        return false;
    }
}

if (!function_exists('opbw_parse_attr_html')) {
    /**
     * Calculate Price Of Field By Percent
     *
     * @since  1.0.0
     */
    function opbw_parse_attr_html(array $attr, $print = false) {
        $attr_return = implode(' ', array_map(function ($key, $value) {
            if (is_array($value)) {
                $value = implode(' ', $value);
            }
    
            return esc_html($key) . "='" . $value . "'";
        }, array_keys($attr), $attr));

        if ($print) {
            add_filter('esc_html', 'opbw_prevent_escape_html', 99, 2);

            echo esc_html($attr_return);

            remove_filter('esc_html', 'opbw_prevent_escape_html', 99, 2);
        } 
        else {
            return $attr_return;
        }
        
    }
}

if (!function_exists('opbw_str_short')) {
    /**
     * Short String Middle
     *
     * @since  1.0.0
     */
    function opbw_str_short($string, $length, $lastLength = 0, $symbol = '...')
    {
        if (strlen($string) > $length) {
            $result = substr($string, 0, $length - $lastLength - strlen($symbol)) . $symbol;
            return $result . ($lastLength ? substr($string, - $lastLength) : '');
        }

        return $string;
    }
}

if (!function_exists('opbw_swapPos')) {
    function opbw_swapPos(&$arr, $pos1, $pos2){
        $keys = array_keys($arr);
        $vals = array_values($arr);
        $key1 = array_search($pos1, $keys);
        $key2 = array_search($pos2, $keys);
    
        $tmp = $keys[$key1];
        $keys[$key1] = $keys[$key2];
        $keys[$key2] = $tmp;
    
        $tmp = $vals[$key1];
        $vals[$key1] = $vals[$key2];
        $vals[$key2] = $tmp;
    
        $arr = array_combine($keys, $vals);

    }
}

if (!function_exists('opbw_get_option')) {
    /**
     * @return string
     */
    function opbw_get_option($option, $default = false, $settings_value = false)
    {
        if(!get_option(OPBW_SETTINGS_KEY)) return $default;
        $settings = (!$settings_value) ? get_option(OPBW_SETTINGS_KEY) : $settings_value;
        
        $settings = apply_filters('opbw_configurations', json_decode($settings, true));
        $response = (isset($settings[$option]) && !empty($settings[$option])) ? $settings[$option] : $default;
        
        return $response;
    }

}

if (!function_exists('opbw_send_file_headers')) {
    function opbw_send_file_headers( $file_name, $file_size ) {
        header( 'Content-Type: application/octet-stream' );
        header( 'Content-Disposition: attachment; filename=' . $file_name );
        header( 'Expires: 0' );
        header( 'Cache-Control: must-revalidate' );
        header( 'Pragma: public' );
        header( 'Content-Length: ' . $file_size );
    }
}

if (!function_exists('opbw_convert_weekday_to_iso')) {
    function opbw_convert_weekday_to_iso( $weekdays = [] ) {
        $return = [];
        foreach ($weekdays as $day) {
            $return[] = gmdate('N', strtotime($day));;
        }
        return $return;
    }
}

if (!function_exists('opbw_is_product_in_taxs')) {
    function opbw_is_product_in_taxs($product_id, $tax_ids, $taxonomy) {
        // Check empty list tax ids
        if (empty($tax_ids)) {
            return false;
        }

        // Check exist product
        if (!is_numeric($product_id) || !get_post($product_id) || get_post_type($product_id) !== 'product') {
            return false;
        }

        // Get all terms of product
        $product_taxs = wp_get_post_terms($product_id, $taxonomy, array('fields' => 'ids'));

        // Check
        foreach ($tax_ids as $category_id) {
            if (in_array($category_id, $product_taxs)) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('opbw_prevent_escape_html')) {
    /**
     * opbw_prevent_escape_html 
     */
    function opbw_prevent_escape_html($safe_text, $text){
        return $text;
    }
}


if (!function_exists('opbw_precheck_form_args')) {
    /**
     * opbw_precheck_form_args 
     */
    function opbw_precheck_form_args($filtered, $str){
        return $str;
    }
}

/**
 * Output a checkbox input box.
 *
 * @param array   $field Field data.
 * @param WC_Data $data WC_Data object, will be preferred over post object when passed.
 */
function opbw_wp_checkbox( $field, WC_Data $data = null ) {
	global $post;

	$field['class']         = isset( $field['class'] ) ? $field['class'] : 'checkbox';
	$field['style']         = isset( $field['style'] ) ? $field['style'] : '';
	$field['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : '';
	$field['value']         = $field['value'] ?? OrderUtil::get_post_or_object_meta( $post, $data, $field['id'], true );
	$field['cbvalue']       = isset( $field['cbvalue'] ) ? $field['cbvalue'] : 'yes';
	$field['name']          = isset( $field['name'] ) ? $field['name'] : $field['id'];
	$field['desc_tip']      = isset( $field['desc_tip'] ) ? $field['desc_tip'] : false;
	$field['checkbox_ui']   = isset( $field['checkbox_ui'] ) && $field['checkbox_ui'];

	// Custom attribute handling
	$custom_attributes = array();

	if ( ! empty( $field['custom_attributes'] ) && is_array( $field['custom_attributes'] ) ) {

		foreach ( $field['custom_attributes'] as $attribute => $value ) {
			$custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $value ) . '"';
		}
	}

    if ( $field['checkbox_ui'] ) {
		$field['wrapper_class'] .= ' opbw_toggle';
	}

    $html = '';
	$html .= '<p class="form-field ' . esc_attr( $field['id'] ) . '_field ' . esc_attr( $field['wrapper_class'] ) . '">
		<label for="' . esc_attr( $field['id'] ) . '">' . wp_kses_post( $field['label'] ) . '</label>';

	if ( ! empty( $field['description'] ) && false !== $field['desc_tip'] ) {
		$html .= wc_help_tip( $field['description'] );
	}

    if ( $field['checkbox_ui'] ) {
		$field['class'] .= ' opbwv_toggle_input';
	}

	$html .= '<input type="checkbox" class="' . esc_attr( $field['class'] ) . '" style="' . esc_attr( $field['style'] ) . '" name="' . esc_attr( $field['name'] ) . '" id="' . esc_attr( $field['id'] ) . '" value="' . esc_attr( $field['cbvalue'] ) . '" ' . checked( $field['value'], $field['cbvalue'], false ) . '  ' . implode( ' ', $custom_attributes ) . '/>';

    if ( $field['checkbox_ui'] ) {
		$html .= '<label for="' . esc_attr( $field['id'] ) . '" class="opbw_toggle_switch"></label>';
	}

    
	$html .= '</p>';
	if ( ! empty( $field['description'] ) && false === $field['desc_tip'] ) {
		$html .= '<p class="description">' . wp_kses_post( $field['description'] ) . '</p>';
	}

    add_filter('esc_html', 'opbw_prevent_escape_html', 99, 2);
    echo esc_html($html);
    remove_filter('esc_html', 'opbw_prevent_escape_html', 99, 2);
}

/**
 * Output a radio input box.
 *
 * @param array   $field Field data.
 * @param WC_Data $data WC_Data object, will be preferred over post object when passed.
 */
function opbw_wp_radio( $field, WC_Data $data = null ) {
	global $post;

	$field['class']         = isset( $field['class'] ) ? $field['class'] : 'select short';
	$field['style']         = isset( $field['style'] ) ? $field['style'] : '';
	$field['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : '';
	$field['value']         = $field['value'] ?? OrderUtil::get_post_or_object_meta( $post, $data, $field['id'], true );
	$field['name']          = isset( $field['name'] ) ? $field['name'] : $field['id'];
	$field['desc_tip']      = isset( $field['desc_tip'] ) ? $field['desc_tip'] : false;

	$html = '<div class="form-field ' . esc_attr( $field['id'] ) . '_field ' . esc_attr( $field['wrapper_class'] ) . '"><legend>' . wp_kses_post( $field['label'] ) . '</legend>';

	if ( ! empty( $field['description'] ) && false !== $field['desc_tip'] ) {
		$html .= wc_help_tip( $field['description'] );
	}

	$html .= '<ul class="wc-radios">';

	foreach ( $field['options'] as $key => $value ) {

		$html .= '<li><label><input
				name="' . esc_attr( $field['name'] ) . '"
				value="' . esc_attr( $key ) . '"
				type="radio"
				class="' . esc_attr( $field['class'] ) . '"
				style="' . esc_attr( $field['style'] ) . '"
				' . checked( esc_attr( $field['value'] ), esc_attr( $key ), false ) . '
				/> ' . esc_html( $value ) . '</label>
		</li>';
	}
	$html .= '</ul>';

	if ( ! empty( $field['description'] ) && false === $field['desc_tip'] ) {
		$html .= '<span class="description">' . wp_kses_post( $field['description'] ) . '</span>';
	}

	$html .= '</div>';

    add_filter('esc_html', 'opbw_prevent_escape_html', 99, 2);
    echo esc_html($html);
    remove_filter('esc_html', 'opbw_prevent_escape_html', 99, 2);
}


/**
 * Output a multiple checkbox input box.
 *
 * @param array   $field Field data.
 * @param WC_Data $data WC_Data object, will be preferred over post object when passed.
 */
function opbw_wp_multiple_checkbox( $field, WC_Data $data = null ) {
	global $post;

	$field['class']         = isset( $field['class'] ) ? $field['class'] : 'select short';
	$field['style']         = isset( $field['style'] ) ? $field['style'] : '';
	$field['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : '';
	$field['value']         = $field['value'] ?? OrderUtil::get_post_or_object_meta( $post, $data, $field['id'], true );
	$field['name']          = isset( $field['name'] ) ? $field['name'] : $field['id'];
	$field['desc_tip']      = isset( $field['desc_tip'] ) ? $field['desc_tip'] : false;

	$html = '<div class="form-field ' . esc_attr( $field['id'] ) . '_field ' . esc_attr( $field['wrapper_class'] ) . '"><legend>' . wp_kses_post( $field['label'] ) . '</legend>';

	if ( ! empty( $field['description'] ) && false !== $field['desc_tip'] ) {
		$html .= wc_help_tip( $field['description'] );
	}

	$html .= '<ul class="wc-radios">';

	foreach ( $field['options'] as $key => $value ) {

		$html .= '<li><label><input
				name="' . esc_attr( $field['name'] ) . '"
				value="' . esc_attr( $key ) . '"
				type="checkbox"
				class="' . esc_attr( $field['class'] ) . '"
				style="' . esc_attr( $field['style'] ) . '"
				' . checked( esc_attr( $field['value'] ), esc_attr( $key ), false ) . '
				/> ' . esc_html( $value ) . '</label>
		</li>';
	}
	$html .= '</ul>';

	if ( ! empty( $field['description'] ) && false === $field['desc_tip'] ) {
		$html .= '<span class="description">' . wp_kses_post( $field['description'] ) . '</span>';
	}

	$html .= '</div>';

    add_filter('esc_html', 'opbw_prevent_escape_html', 99, 2);
    echo esc_html($html);
    remove_filter('esc_html', 'opbw_prevent_escape_html', 99, 2);
}


/**
 * Output a text input box.
 *
 * @param array   $field Field data.
 * @param WC_Data $data WC_Data object, will be preferred over post object when passed.
 */
function opbw_wp_text_input( $field, WC_Data $data = null ) {
	global $post;

	$field['placeholder']   = isset( $field['placeholder'] ) ? $field['placeholder'] : '';
	$field['class']         = isset( $field['class'] ) ? $field['class'] : 'short';
	$field['style']         = isset( $field['style'] ) ? $field['style'] : '';
	$field['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : '';
	$field['value']         = $field['value'] ?? Automattic\WooCommerce\Utilities\OrderUtil::get_post_or_object_meta( $post, $data, $field['id'], true );
	$field['name']          = isset( $field['name'] ) ? $field['name'] : $field['id'];
	$field['type']          = isset( $field['type'] ) ? $field['type'] : 'text';
	$field['desc_tip']      = isset( $field['desc_tip'] ) ? $field['desc_tip'] : false;
	$data_type              = empty( $field['data_type'] ) ? '' : $field['data_type'];

	switch ( $data_type ) {
		case 'price':
			$field['class'] .= ' wc_input_price';
			$field['value']  = wc_format_localized_price( $field['value'] );
			break;
		case 'decimal':
			$field['class'] .= ' wc_input_decimal';
			$field['value']  = wc_format_localized_decimal( $field['value'] );
			break;
		case 'stock':
			$field['class'] .= ' wc_input_stock';
			$field['value']  = wc_stock_amount( $field['value'] );
			break;
		case 'url':
			$field['class'] .= ' wc_input_url';
			$field['value']  = esc_url( $field['value'] );
			break;

		default:
			break;
	}

	// Custom attribute handling
	$custom_attributes = array();

	if ( ! empty( $field['custom_attributes'] ) && is_array( $field['custom_attributes'] ) ) {

		foreach ( $field['custom_attributes'] as $attribute => $value ) {
			$custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $value ) . '"';
		}
	}

    $html = '';
	$html .= '<p class="form-field ' . esc_attr( $field['id'] ) . '_field ' . esc_attr( $field['wrapper_class'] ) . '">';

    if ( ! empty( $field['label'] ) ) {
        $html .= '<label for="' . esc_attr( $field['id'] ) . '">' . wp_kses_post( $field['label'] ) . '</label>';
    }

	if ( ! empty( $field['description'] ) && false !== $field['desc_tip'] ) {
		$html .= esc_attr(wc_help_tip( $field['description'] ));
	}

	$html .= '<input type="' . esc_attr( $field['type'] ) . '" class="' . esc_attr( $field['class'] ) . '" style="' . esc_attr( $field['style'] ) . '" name="' . esc_attr( $field['name'] ) . '" id="' . esc_attr( $field['id'] ) . '" value="' . esc_attr( $field['value'] ) . '" placeholder="' . esc_attr( $field['placeholder'] ) . '" ' . implode( ' ', $custom_attributes ) . ' /> ';

    if (in_array($field['type'], ['time', 'date', 'datetime-local'])) {
        ?>
        <a class="input-button" title="clear" data-clear>
            <i class="icon-close"></i>
        </a>
        <?php
    }

	if ( ! empty( $field['description'] ) && false === $field['desc_tip'] ) {
		$html .= '<span class="description">' . wp_kses_post( $field['description'] ) . '</span>';
	}

	$html .= '</p>';

    add_filter('esc_html', 'opbw_prevent_escape_html', 99, 2);
    echo esc_html($html);
    remove_filter('esc_html', 'opbw_prevent_escape_html', 99, 2);
}

function opbw_get_main_attr() {
    $attrs = wc_get_attribute_taxonomies();
    $attrs_arr = [];
    if (!empty($attrs)) {
        foreach ($attrs as $attr) {
            $attrs_arr['pa_'.$attr->attribute_name] = $attr->attribute_label;
        }
    }

    return $attrs_arr;
}

// function opbw_get_custom_attr() {
//     $query = $result = [];

//     $attrs_arr = [];
//     if (!empty($result)) {
//         foreach ($result as $item) {
//             if (isset($item->meta_value)) {
//                 $meta_val = $item->meta_value;
//                 $meta_val = unserialize($item->meta_value);
//                 if (is_array($meta_val)) {
//                     foreach ($meta_val as $key => $data) {
//                         if (isset($data['is_taxonomy']) && $data['is_taxonomy'] === 0) {
//                             $attrs_arr[$key] = $data['name'];
//                         }
//                     }
//                 }
//             }
//         }
//     }

//     return $attrs_arr;
// }

function opbw_get_count_product_by_term( $term_id, $taxonomy ) {
    $count = 0;
    $term = get_term($term_id, $taxonomy);
    if (!is_wp_error($term) && !empty($term->count)) {
        $count = $term->count;
    }
	return $count;
}

function opbw_sanitize_array( $arr ) {
    foreach ( (array) $arr as $k => $v ) {
        if ( is_array( $v ) ) {
            $arr[ $k ] = opbw_sanitize_array( $v );
        } else {
            $arr[ $k ] = sanitize_text_field( $v );
        }
    }

    return $arr;
}

function opbw_get_all_variants() {
    $variants = array();
    $attr_tax = wc_get_attribute_taxonomies();
    if (!empty($attr_tax)) {
        foreach ($attr_tax as $atr) { 
            $terms = get_terms(array(
                'taxonomy' => wc_attribute_taxonomy_name($atr->attribute_name),
                'hide_empty' => false,
            ));

            foreach ($terms as $term) {
                $variants['pa_'.$atr->attribute_name.'--'.$term->term_id] = ucwords($atr->attribute_label . ' - ' . $term->name);
            }
        }
    }
    return $variants;
}

function opbw_get_variations_of_product($product) {
    $variations = $product->get_available_variations();

    $var_arr = [];
    if ($variations && !empty($variations)) {
        foreach($variations as $var) {
            $attrs = $var['attributes'];
            foreach($attrs as $key => $attr) {
                $var_arr[] = $key.'_'.$attr;
            }   
        }
    }

    return $var_arr;
}

function opbw_check_string_has_char($string, $charsToCheck) {
    $string = strtolower($string);
    $charsToCheck = strtolower($charsToCheck);
    $containsChar = strpos($string, $charsToCheck);
    return $containsChar !== false;
}

function opbw_check_string_start_with_char($string, $charsToCheck) {
    $string = strtolower($string);
    $charsToCheck = strtolower($charsToCheck);
    return strpos($string, $charsToCheck) === 0;
}

function opbw_check_string_end_with_char($string, $charsToCheck) {
    $string = strtolower($string);
    $charsToCheck = strtolower($charsToCheck);
    $endsWithLength = strlen($charsToCheck);
    $endOfString = substr($string, -$endsWithLength);

    return $endOfString === $charsToCheck;
}

function opbw_check_product_belong_cat_ids($product, $cat_ids) {
    $category_ids = $product->get_category_ids();

    $belongs_to_category = false;
    foreach ($category_ids as $category_id) {
        if (in_array($category_id, $cat_ids)) {
            $belongs_to_category = true;
            break;
        }
    }

    return $belongs_to_category;
}

function opbw_check_product_belong_tag_ids($product, $tag_ids_to_check) {
    $tag_ids = $product->get_tag_ids();

    $belongs_to_tag = false;
    foreach ($tag_ids as $tag_id) {
        if (in_array($tag_id, $tag_ids_to_check)) {
            $belongs_to_tag = true;
            break;
        }
    }

    return $belongs_to_tag;
}

function opbw_get_update_content($content, $data_changed) {
    if (empty($data_changed['action'])) return false;
    $action = $data_changed['action'];
    $value = !empty($data_changed['value']) ? $data_changed['value'] : '';
    $value_find = !empty($data_changed['value_find']) ? $data_changed['value_find'] : '';
    $value_replace = !empty($data_changed['value_replace']) ? $data_changed['value_replace'] : '';

    switch ($action) {
        case 'set_new':
            $new_content = $value;
            break;
        case 'append':
            $new_content = $content . $value;
            break;
        case 'prepand':
            $new_content = $value . $content;
            break;
        case 'replace':
            $new_content = str_replace( $value_find, $value_replace, $content );
            break;
    }

    if (isset($new_content)) {
        return $new_content;
    }

    return false;
}

function opbw_get_update_number($number, $data_changed) {
    if (empty($data_changed['action'])) return false;
    $action = $data_changed['action'];
    $value = !empty($data_changed['value']) ? floatval($data_changed['value']) : 0;
    if ($value < 0) {
        $value = 0;
    }

    switch ($action) {
        case 'increase':
            $new_val = $number + $value;
            break;
        case 'decrease':
            $new_val = $number - $value;
            break;
        case 'fixed':
            $new_val = $value;
            break;
    }

    if (isset($new_val)) {
        return ($new_val < 0) ? 0 : $new_val;
    }

    return false;
}

function opbw_get_update_price($price, $data_changed) {
    if (empty($data_changed['action'])) return false;
    $action = $data_changed['action'];
    $value = !empty($data_changed['value']) ? floatval($data_changed['value']) : 0;
    if ($value < 0) {
        $value = 0;
    }
    $round = (!empty($data_changed['round']) && $data_changed['round'] != 'none') ? $data_changed['round'] : false;

    switch ($action) {
        case 'up_percentage':
            $new_price = $price + ($price * $value / 100);
            break;
        case 'down_percentage':
            $new_price = $price - ($price * $value / 100);
            break;
        case 'up_price':
            $new_price = $price + $value;
            break;
        case 'down_price':
            $new_price = $price - $value;
            break;
        case 'flat_all':
            $new_price = $value;
            break;
    }

    if (isset($new_price)) {
        return ($new_price < 0) ? 0 : $new_price;
    }

    return false;
}

function opbw_get_update_tax($tax_ids, $data_changed, $taxonomy) {
    if (empty($data_changed['action'])) return false;
    $action = $data_changed['action'];
    
    if ($action == 'add') {
        if (!empty($data_changed['data']['tax_ids']) && is_array($data_changed['data']['tax_ids'])) {
            $tax_ids = array_unique(array_map('absint', array_merge($tax_ids, $data_changed['data']['tax_ids'])));
        }
        if (!empty($data_changed['data']['new_vals']) && is_array($data_changed['data']['new_vals'])) {
            foreach ($data_changed['data']['new_vals'] as $new_tax) {
                if ($check_new = term_exists($new_tax, $taxonomy)) {
                    if (is_array($check_new)) {
                        $id_new = $check_new['term_id'];
                    } else {
                        $id_new = $check_new;
                    }
                } else {
                    $add_new = wp_insert_term($new_tax, $taxonomy);
                    if (!is_wp_error($add_new) && isset($add_new['term_id'])) {
                        $id_new = $add_new['term_id'];
                    }
                }
                if (isset($id_new) && !in_array($id_new, $tax_ids)) {
                    $tax_ids[] = $id_new;
                }
            }
        }
    } elseif ($action == 'remove') {
        if (!empty($data_changed['data']['tax_ids']) && is_array($data_changed['data']['tax_ids'])) {
            $tax_ids = array_values(array_diff($tax_ids, $data_changed['data']['tax_ids']));
            if (empty($tax_ids) && $taxonomy == 'product_cat') {
                $tax_ids[] = absint( get_option( 'default_product_cat', 0 ) );
            }
        }
    }
    
    return $tax_ids;
}

function opbw_get_update_attributes($product_attributes, $data_changed) {
    if (empty($data_changed['action'])) return false;
    if (empty($data_changed['data'])) return false;

    $action = $data_changed['action'];
    $data = $data_changed['data'];
    $attrs_custom = [];

    if ($action == 'add') {
        if (!empty($data['attrs_add']) && !empty($data['attrs_tax_add'])) {
			$taxonomy = wc_clean( wp_unslash( $data['attrs_add'] ) );
			if ( taxonomy_exists( $taxonomy ) ) {
                $attrs_tax_add = wc_clean( wp_unslash( $data['attrs_tax_add'] ) );
                foreach ($attrs_tax_add as $term) {
                    if ($check_new = term_exists($term, $taxonomy)) {
                        $id_new = is_array($check_new) ? $check_new['term_id'] : $check_new;
                        $attrs_custom[$taxonomy][] = $id_new;
                    } else {
                        $add_new = wp_insert_term($term, $taxonomy);
                        if (!is_wp_error($add_new) && isset($add_new['term_id'])) {
                            $id_new = $add_new['term_id'];
                            $attrs_custom[$taxonomy][] = $id_new;
                        }
                    }
                }
			}
        }
    }

    $variants_change = !empty($data['variants_change']) ? $data['variants_change'] : false;
    if ($variants_change) {
        foreach ($variants_change as $item) {
            $temp = explode('--', trim($item));
            if (empty($temp[0]) || empty($temp[1])) {
                continue;
            }
            $attrs_custom[$temp[0]][] = absint($temp[1]);
        }
    }

    $changed = false;
    if (!empty($attrs_custom)) {
        if ($action == 'add') {
            foreach ($attrs_custom as $attr_tax => $options) {
                if (empty($options)) continue;
                $options = wp_parse_id_list($options);
    
                if (isset($product_attributes[$attr_tax])) {
                    $attr_obj = $product_attributes[$attr_tax];
                    if ($attr_obj instanceof WC_Product_Attribute) {
                        $options_exist = $attr_obj->get_options();
                        $options_update = array_values(array_unique(array_merge($options_exist, $options)));
    
                        $attr_obj = opbw_create_attr_obj($attr_tax, $options_update, $attr_obj->get_position());
                        if ($attr_obj) {
                            $product_attributes[$attr_tax] = $attr_obj;
                            $changed = true;
                        }
                    }
                } else {
                    $position = count($product_attributes);
                    $attr_obj = opbw_create_attr_obj($attr_tax, $options, $position);
                    if ($attr_obj) {
                        $product_attributes[$attr_tax] = $attr_obj;
                        $changed = true;
                    }
                }
            }
        } elseif ($action == 'remove') {
            foreach ($attrs_custom as $attr_tax => $options) {
                if (empty($options)) continue;
                $options = wp_parse_id_list($options);
    
                if (isset($product_attributes[$attr_tax])) {
                    $attr_obj = $product_attributes[$attr_tax];
                    if ($attr_obj instanceof WC_Product_Attribute) {
                        $options_exist = $attr_obj->get_options();
                        $options_update = array_values(array_diff($options_exist, $options));

                        if (empty($options_update)) {
                            unset($product_attributes[$attr_tax]);
                            $changed = true;
                        } else {
                            $attr_obj = opbw_create_attr_obj($attr_tax, $options_update, $attr_obj->get_position());
                            if ($attr_obj) {
                                $product_attributes[$attr_tax] = $attr_obj;
                                $changed = true;
                            }
                        }
                    }
                }
            }
        }
    }
    
    if ($changed) {
        return $product_attributes;
    }
    return false;
}

function opbw_create_attr_obj($attr_tax, $options, $position = null) {
    $attr_id = wc_attribute_taxonomy_id_by_name($attr_tax);
    if ($attr_id) {
        $attr_obj = new WC_Product_Attribute();
        $attr_obj->set_id($attr_id);
        $attr_obj->set_name($attr_tax);
        $attr_obj->set_options($options);
        $attr_obj->set_visible(true);
        $attr_obj->set_variation(true);
        if (!empty($position)) {
            $attr_obj->set_position($position);
        }

        return $attr_obj;
    }
    return false;
}

function opbw_get_unique_sku_update($sku, $index = 0) {
    $sku = $index ? $sku.'-'.$index : $sku;
    $unique = wc_get_product_id_by_sku($sku);
    if ( 0 === $unique ) {
        return $sku;
    } else {
        $pad = $index + 1;
        opbw_get_unique_sku_update($sku, $pad);
    }
}

function opbw_convert_to_attrid(array $attr_slugs, $tax) {
    $convert_arr = [];

    if (!empty($attr_slugs)) {
        foreach ($attr_slugs as $value) {
            $term = get_term_by( 'slug', $value, $tax );
            if ($term && !is_wp_error($term)) {
                $convert_arr[] = $term->term_id;
            }
        }
    }

    return $convert_arr;
}

function opbw_delete_product($product, $force = false) {
    if ($force) {
        if ($product->is_type('variable')) {
            foreach ($product->get_children() as $child_id) {
                $child = wc_get_product($child_id);
                $child->delete(true);
            }
        }
        elseif ($product->is_type('grouped')) {
            foreach ($product->get_children() as $child_id) {
                $child = wc_get_product($child_id);
                $child->set_parent_id(0);
                $child->save();
            }
        }
        $product->delete(true);
        $result = $product->get_id() > 0 ? false : true;

    } else {
        if ($product->is_type('variation')) {
            return false;
        } else {
            $product->delete();
            $result = 'trash' === $product->get_status();
        }
    }

    if (empty($result)) {
        /* translators: %s: Product name */
        return sprintf(__('This %s cannot be deleted', 'opal-bulkedit-for-woocommerce'), $product->get_name());
    }

    // Delete parent product transients.
    $product_id = $product->get_id();
    if ($parent_id = wp_get_post_parent_id($product_id)) {
        wc_delete_product_transients($parent_id);
    } else {
        wc_delete_product_transients($product_id);
    }
    return true;
}

function opbw_delete_history(array $statuses = ['draft'], bool $remove_backup = true) {
    $current_user_id = get_current_user_id();

    $posts_to_delete = get_posts(array(
        'post_type'   => 'opbw-history',
        'post_status' => $statuses,
        'numberposts' => -1,
        'author'      => $current_user_id
    ));

    foreach ($posts_to_delete as $post) {
        $id = $post->ID;
        if ($remove_backup) {
            $backup_file = get_post_meta($id, '_opbw_backup_file', true);
            if ($backup_file && @file_exists( $backup_file ) ) { // phpcs:ignore Generic.PHP.NoSilencedErrors.Discouraged
				wp_delete_file($backup_file);
			}
        }
        wp_delete_post($id, true);
    }
}

function opbw_get_batch(array $array, int $batchNumber, int $batchSize = 10): array {
    $startIndex = ($batchNumber - 1) * $batchSize;
    return array_slice($array, $startIndex, $batchSize);
}

function opbw_cal_processed_percentage(array $array, int $batchNumber, int $batchSize): float {
    $totalItems = count($array);
    $processedItems = min($batchNumber * $batchSize, $totalItems);
    $percentage = ($processedItems / $totalItems) * 100;
    return round($percentage, 2);
}

function opbw_pad_number(int $num) {
    return str_pad($num, 2, '0', STR_PAD_LEFT);
}

// function opbw_p($var) {
//     echo '<pre>';
//     print_r($var);
//     echo '</pre>';
// }
