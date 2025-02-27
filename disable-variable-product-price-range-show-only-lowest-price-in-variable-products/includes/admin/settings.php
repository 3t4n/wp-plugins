<?php 


// Add settings page
function wclp_settings_add_section( $sections ) {
    $sections['woo-variable-lowest-price'] = __( 'Variation Price Display', 'woo-variation-price-display' );

    return $sections;
}
// add_filter( 'woocommerce_get_sections_products', 'wclp_settings_add_section' );


// Add settings filed
function wclp_settings_add_field( $settings, $current_section ) {
    if ( $current_section == 'woo-variable-lowest-price' ) {

        $settings_lowest_price = array(
            array(
                'title' => __( 'Variation Price Display Settings', 'woo-variation-price-display' ),
                'desc'  => '<p>' . __( 'The following options control the Variation Price Display for WooCommerce extension.', 'woo-variation-price-display' ) . '<p>' 
                . '<p>'
                . sprintf('<a href="%1$s" target="_blank">%2$s</a>', esc_url('https://wpxpress.net/docs/woocommerce-variation-price-display/'), __( 'Documentation', 'woo-variation-price-display' ) ) . ' | '
                . sprintf('<a href="%1$s" target="_blank">%2$s</a>', esc_url('https://wpxpress.net/submit-ticket/'), __( 'Get Help &amp; Support', 'woo-variation-price-display' ) )
                . wvp_settings_page_get_pro_link() . '</p>',
                'type' => 'title',
                'id'   => 'woo-variable-lowest-price',
            ),
            array(
                'name'    => __( 'Enable Features', 'woo-variation-price-display' ),
                'id'      => 'wclp_enable',
                'type'    => 'checkbox',
                'default' => 'yes',
                'desc'    => __( 'Disable variation price range.', 'woo-variation-price-display' ),
            ),
            array(
                'name'    => __( 'Enable on Shop Page', 'woo-variation-price-display' ),
                'id'      => 'wclp_enable_shop',
                'type'    => 'checkbox',
                'default' => 'yes',
                'desc'    => __( 'Disable variation price range on the Shop/Archive pages.', 'woo-variation-price-display' ),
            ),
            array(
                'name'  => __( 'Price Types', 'woo-variation-price-display' ),
                'id'    => 'wclp_price_types',
                'type'  => 'radio',
                'required'  => true,
                'options'   => array(
                    'min'   => __( 'Show Only Minimum (Lowest) Price.', 'woo-variation-price-display' ),
                    'max'   => __( 'Show Only Maximum (Highest) Price.', 'woo-variation-price-display' ),
                    'min-to-max'   => __( 'Minimum to Maximum Price.', 'woo-variation-price-display' ),
                    'max-to-min'   => __( 'Maximum to Minimum Price.', 'woo-variation-price-display' ),
                    'list'   => __( 'List All Variation Prices.', 'woo-variation-price-display' ),
                ),
                'default'   => 'min',
            ),
            array(
                'name'    => __( 'Text Before Price', 'woo-variation-price-display' ),
                'id'      => 'wclp_title_before',
                'type'    => 'text',
                'default' => 'From:',
            ),
            array(
                'name'    => __( 'Text After Price', 'woo-variation-price-display' ),
                'id'      => 'wclp_title_after',
                'type'    => 'text',
                'default' => '',
            ),
            array(
                'name'    => __( 'Hide Crossed Out Price', 'woo-variation-price-display' ),
                'id'      => 'wclp_crossed_price',
                'type'    => 'checkbox',
                'default' => 'no',
                'desc'    => __( 'Hide the crossed out regular price <code><del>$100</del> $50</code> of the variable sale product.', 'woo-variation-price-display' ),
            ),

            array(
                'name'    => __( 'Hide Reset Link', 'woo-variation-price-display' ),
                'id'      => 'wclp_hide_reset',
                'type'    => 'checkbox',
                'default' => 'no',
                'desc'    => __( 'Hide the "Clear" link that appears when select a variation.', 'woo-variation-price-display' ),
            ),
            array( 
                'type' => 'sectionend', 
                'id' => 'woo-variable-lowest-price' 
            ),
        );

        return apply_filters( "woocommerce_get_settings_woo-variable-lowest-price", $settings_lowest_price );

    } else {

        return $settings;

    }
}
// add_filter( 'woocommerce_get_settings_products', 'wclp_settings_add_field', 10, 2 );


if ( ! function_exists( 'wvp_settings_page_get_pro_link' ) ) {
    function wvp_settings_page_get_pro_link() {
        if ( ! class_exists( 'Woo_Disable_Variable_Price_Range_Pro' ) ) {
            $html = ' | ' . sprintf('<a href="%1$s" target="_blank" style="color:#d63638"><b>%2$s</b></a>', esc_url('https://wpxpress.net/products/woocommerce-variation-price-display/'), __( 'Get Pro Features', 'woo-variation-price-display' ) );

            return $html;
        }

        return '';
    }
}