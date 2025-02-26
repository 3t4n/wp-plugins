<?php
/*
Plugin Name: Limit quantity for WooCommerce
Plugin URI: https://wordpress.org/plugins/limit-quantity-for-woocommerce/
Description: Set maximum quantity limits for individual WooCommerce products.
Author: Mohit Agarwal
Version: 2.0
Author URI: https://simpleproplugins.com/
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Add custom input field in the product inventory section
function me_limit_qty_inventory_custom_field() {
    woocommerce_wp_text_input(array(
        'id'                => 'limit_woo_max_qty',
        'label'             => __('Limit Quantity (Max):', 'woocommerce'),
        'placeholder'       => '',
        'desc_tip'          => true,
        'description'       => __('Set the maximum quantity a customer can add to the cart for this product.', 'woocommerce'),
        'type'              => 'number',
        'custom_attributes' => array(
            'step' => '1',
            'min'  => '0',
        ),
    ));
}
add_action( 'woocommerce_product_options_inventory_product_data', 'me_limit_qty_inventory_custom_field' );

// Save custom input field value
function me_limit_qty_custom_save( $post_id ) {
    if ( isset( $_POST['limit_woo_max_qty'] ) ) {
        $max_qty = absint( $_POST['limit_woo_max_qty'] );
        if ( $max_qty > 0 ) {
            update_post_meta( $post_id, 'limit_woo_max_qty', $max_qty );
        } else {
            delete_post_meta( $post_id, 'limit_woo_max_qty' );
        }
    }
}
add_action( 'woocommerce_process_product_meta', 'me_limit_qty_custom_save' );

// Adjust maximum quantity on the product page
function me_limit_qty_max( $qty, $product ) {
    if ( ! $product->is_type( 'variable' ) ) {
        $max_meta = get_post_meta( $product->get_id(), 'limit_woo_max_qty', true );
        $woo_max  = $product->get_max_purchase_quantity();
        return ( -1 === $woo_max || (int) $max_meta < (int) $woo_max ) ? $max_meta : $woo_max;
    }
    return $qty;
}
add_filter( 'woocommerce_quantity_input_max', 'me_limit_qty_max', 10, 2 );

// Reduce cart quantities to max if exceeded
function me_limit_qty_reduce_to_max() {
    $max_crossed = false;

    foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
        $max_meta = get_post_meta( $values['product_id'], 'limit_woo_max_qty', true );
        if ( $max_meta && $values['quantity'] > $max_meta ) {
            WC()->cart->set_quantity( $cart_item_key, $max_meta );
            $max_crossed = true;
        }
    }

    if ( $max_crossed ) {
        wc_add_notice( __('Cart quantities exceeding the limit have been reduced to the maximum allowed.', 'woocommerce'), 'notice' );
    }
}
add_action( 'woocommerce_check_cart_items', 'me_limit_qty_reduce_to_max' );

// Enqueue admin scripts
function me_limit_qty_enqueue_script() {
    wp_enqueue_script( 'limit_qty_max_admin', plugin_dir_url( __FILE__ ) . 'js/limit_qty_max_admin.js', array( 'jquery' ), '1.0', true );
}
add_action( 'admin_enqueue_scripts', 'me_limit_qty_enqueue_script' );
