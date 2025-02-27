<?php
namespace WC_Vendors\Classes\Includes;

use WC_Vendors\Classes\Includes\WCV_Product_Dropdown_Walker;

/**
 * Get the global default product template for the store.
 *
 * @since  2.5.2
 * @access public
 * @return array $default_product_template - details for the default product edit template
 */
function wcv_get_default_product_template() {

    $template  = get_option( 'wcvendors_product_form_template', 'standard' );
    $template  = ( 'standard' === $template ) ? $template : $template . '/';
    $file_name = ( 'standard' === $template ) ? 'product-edit.php' : 'product-' . $template . '.php';
    $url_path  = ( 'standard' === $template ) ? 'product/edit' : 'product/' . $template . 'edit/';

    $default_product_template = apply_filters(
        'wcv_default_product_template',
        array(
            'filename' => $file_name,
            'url_path' => $url_path,
            'label'    => __( 'Product', 'wc-vendors' ),
            'url'      => \WCV_Vendor_Dashboard::get_dashboard_page_url( $url_path ),
        )
    );

    return $default_product_template;
}


/**
 * Check to see if the current page is a pro dashboard page
 *
 * @param int $current_page The current page ID.
 *
 * @version 2.5.2
 */
function wcv_is_dashboard_page( $current_page = 0 ) {
    if ( ! $current_page ) {
        $current_page = get_the_ID();
    }

    if ( ! $current_page ) {
        return false;
    }

    $current_page = (int) apply_filters( 'wcv_is_dashboard_current_page', $current_page );

    $dashboard_page_id = get_option( 'wcvendors_vendor_dashboard_page_id', 0 );

    if ( $current_page === (int) $dashboard_page_id ) {
        return true;
    }

    return false;
}


/**
 * Walk the Product Categories Dropdown Tree.
 */
function wcv_walk_category_dropdown_tree() {

    $args = func_get_args();

    // the user's options are the third parameter.
    if ( empty( $args[2]['walker'] ) || ! is_a( $args[2]['walker'], 'Walker' ) ) {
        $walker = new WCV_Product_Dropdown_Walker();
    } else {
        $walker = $args[2]['walker'];
    }

    return call_user_func_array( array( &$walker, 'walk' ), $args );
}


/**
 * Get product types.
 *
 * @since 2.5.2
 * @return array
 */
function wcv_get_product_types() {
    return apply_filters(
        'wcv_product_type_selector',
        array(
            'simple'   => __( 'Simple product', 'wc-vendors' ),
            'grouped'  => __( 'Grouped product', 'wc-vendors' ),
            'external' => __( 'External/Affiliate product', 'wc-vendors' ),
            'variable' => __( 'Variable product', 'wc-vendors' ),
        )
    );
}

/**
 * Strip html tags and remove extra spaces from the resulting string
 *
 * @param    string $text The string to strip.
 *
 * @return    string
 * @since      1.5.9
 * @version    1.5.9
 */
function wcv_strip_html( $text ) {

    $text = wp_strip_all_tags( $text );
    $text = preg_replace( '/\s+/', ' ', $text );

    return trim( $text );
}

/**
 * Check if vendor shipping is enabled
 *
 * @return bool
 *
 * @since 1.8.4
 * @version 1.8.4
 */
function wcv_is_vendors_shipping_enabled() {
    $shipping_methods = WC()->shipping->load_shipping_methods();

    if ( array_key_exists( 'wcv_pro_vendor_shipping', $shipping_methods ) && wc_string_to_bool( $shipping_methods['wcv_pro_vendor_shipping']->enabled ) ) {
        return true;
    }
    return false;
}

/**
 * Variable option required.
 *
 * Check if variation option is required, return empty or required.
 *
 * @version 1.6.5
 * @since   1.6.5
 *
 * @param  string $option_suffix The variation atrtibute to check.
 * @return string
 */
function variation_option_required( $option_suffix ) {

    $is_required = get_option( 'wcvendors_required_product_variations_' . $option_suffix, 'no' );

    if ( false === $is_required || ! wc_string_to_bool( $is_required ) ) {
        return '';
    }

    return 'required="required"';
}

/**
 * This function will add an md5 hash of the file url ( post GUID ) on attachment post types.
 *
 * @param int $post_id The post ID.
 * @since  2.5.2
 */
function wcv_md5_attachment_url( $post_id ) {

    // Add an MD5 of the GUID for later queries.
    $attachment_post = get_post( $post_id );
    if ( ! $attachment_post ) {
        return false;
    }

    update_post_meta( $attachment_post->ID, '_md5_guid', md5( $attachment_post->guid ) );
}

/**
 * Sorts attributes by position.
 *
 * @param  array $a First attribute.
 * @param  array $b Second attribute.
 */
function attributes_cmp( $a, $b ) {
    if ( $a['position'] === $b['position'] ) {
        return 0;
    }

    return ( $a['position'] < $b['position'] ) ? -1 : 1;
}
