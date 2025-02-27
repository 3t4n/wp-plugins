<?php
/**
 * Plugin Name: Change Currency Symbol for WooCommerce
 * Description: Change the Currency Symbol of your WooCommerce shop to a custom one!
 * Version: 0.1
 * Author: Harshana Serasinghe
 * Author URI: https://harshana.xyz
 *
 */

 /**
 * Change a currency symbol
 * @param string $currency_symbol
 */
add_filter( 'woocommerce_general_settings',  'ccswc_change_currency_settings_fields', 10, 1 );
add_filter( 'woocommerce_currency_symbol', 'ccswc_change_currency_change_symbol', 10, 1 );

function ccswc_change_currency_settings_fields( $settings ){
    $settings_fields = array();
    $is_parent_found = false;
    
    foreach( $settings as $setting ) {
        if ( $is_parent_found ){
            $settings_fields[] = array(
                'name'     => __( 'Custom Currency Symbol', 'wc_change_currency' ),
                'desc'     => __( 'This sets the custom currency symbol.', 'wc_change_currency' ),
                'id'       => 'wc_change_currency_symbol',
                'css'      => 'width:100px;',
                'type'     => 'text',
                'desc_tip' =>  true,
            );
            $is_parent_found = false;
        }
        if ( $setting['id'] == "woocommerce_currency" ){
            $is_parent_found = true;
        }
        
        $settings_fields[] = $setting;
    
    }
    return $settings_fields;
}

function ccswc_change_currency_change_symbol( $currency_symbol ) {
    $custom_currency_symbol = get_option( 'wc_change_currency_symbol', 1 );
    return $custom_currency_symbol == "" || $custom_currency_symbol == 1 ? $currency_symbol : $custom_currency_symbol. " ";
}

// add_action('woocommerce_single_product_summary', 'remove_product_description_add_cart_button' );
// function remove_product_description_add_cart_button() { 
//     global $product;
//     $current_user = wp_get_current_user();
//     if ( wc_customer_bought_product( $current_user->user_email, $current_user->ID, $product->get_id() ) ) {
//         remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
//     }
// }



function wcccc_get_options($data ){
  
}
//add_action('wp_footer', 'wcccc_get_options');
//add_filter('woocommerce_dropdown_variation_attribute_options_args', 'wcccc_get_options', 10, 1);


// Hide Shipping on checkout page
function disable_shipping_calc_on_cart( $show_shipping ) {
    if (is_checkout()){
        return false;
    }
    return $show_shipping;
    
}
// add_filter( 'woocommerce_cart_ready_to_calc_shipping', 'disable_shipping_calc_on_cart', 99 );


// Hide add to cart button if the product is bought once
function sd_bought_before_woocommerce_add_to_cart_validation( $is_purchasable, $instance ){
    
    $current_user = wp_get_current_user();
    if ( wc_customer_bought_product( $current_user->user_email, $current_user->ID, $instance->get_id()) ) {
        $is_purchasable = false;
    }
    return $is_purchasable;
}
//add_filter( 'woocommerce_is_purchasable', 'sd_bought_before_woocommerce_add_to_cart_validation', 10, 2 );


// add_filter('woocommerce_product_add_to_cart_text', 'wc_product_add_to_cart_text', 10, 2 );
// add_filter('woocommerce_product_single_add_to_cart_text', 'wc_product_add_to_cart_text', 10, 2 );

// function wc_product_add_to_cart_text( $text, $product ){

//     if ( ! is_admin()) {
//         $product_cart_id = WC()->cart->generate_cart_id( $product->get_id() );
//         $in_cart = WC()->cart->find_product_in_cart( $product_cart_id );

//         if ( $in_cart ) {
//             $text = "Adăugat în coș";
//         }
        
//         return $text;
//     }
// }
function cart_item_remove_option_name( $cart_item_data,  $cart_item,  $cart_item_key){
    $cart_item_data->set_name($cart_item_data->get_title());
    return $cart_item_data;
}

// add_filter( 'woocommerce_cart_item_product','cart_item_remove_option_name', 10,3); 

add_filter( 'woocommerce_product_variation_title_include_attributes', '__return_false' );
