<?php

if ( ! defined( 'ABSPATH' ) ) { die; }



//Start Add To Cart Hooks


if ( cs_get_option('archive_cart_text') ) {
// Change 'add to cart' text on archive product page
add_filter( 'woocommerce_product_add_to_cart_text', 'ewc_archive_add_to_cart_text' );
}

function ewc_archive_add_to_cart_text() {
        return __( ' '.cs_get_option('archive_cart_text').' ', 'ewc' );
}

if ( cs_get_option('single_cart_text') )
// Change 'add to cart' text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'ewc_add_to_cart_text' );
function ewc_add_to_cart_text() {
        return __( ''.cs_get_option('single_cart_text').'', 'ewc' );
}


// Change add to cart text on archives depending on product type
add_filter( 'woocommerce_product_add_to_cart_text' , 'ewc_custom_woocommerce_product_add_to_cart_text' );
function ewc_custom_woocommerce_product_add_to_cart_text() {
    global $product;
    
    $product_type = $product->product_type;
    
    switch ( $product_type ) {
        case 'external':
        if ( cs_get_option('external_cart_text') ) {
            return __( ''.cs_get_option('external_cart_text').'', 'woocommerce' );
        break;
        }
        case 'grouped':
        if ( cs_get_option('grouped_cart_text') ) {
            return __( ''.cs_get_option('grouped_cart_text').'', 'woocommerce' );
        break;
        }
        case 'simple':
        if ( cs_get_option('simple_cart_text') ) {
            return __( ''.cs_get_option('simple_cart_text').'', 'woocommerce' );
        break;
        }
        case 'variable':
        if ( cs_get_option('variable_cart_text') ) {
            return __( ''.cs_get_option('grouped_cart_text').'', 'woocommerce' );
        break;
        }
        default:
            return __( ''.cs_get_option('archive_cart_text').'', 'woocommerce' );
    }
    
}

if ( cs_get_option('cart_text_by_id') ) {
// Change 'add to cart' text on product page (only for product ID 386)
add_filter( 'woocommerce_product_add_to_cart_text', 'ewc_products_id_add_to_cart_text' );
// Change 'add to cart' text on single product page (only for product ID 386)
add_filter( 'woocommerce_product_single_add_to_cart_text', 'ewc_id_add_to_cart_text' );
}
function ewc_products_id_add_to_cart_text( $default ) {
    if ( get_the_ID() == cs_get_option('cart_text_by_id') ) {
        return __( ''.cs_get_option('cart_text_by_id_text').'', 'ewc' );
    } else {
        return $default;
    }
}

function ewc_id_add_to_cart_text( $default ) {
    if ( get_the_ID() == cs_get_option('cart_text_by_id') ) {
        return __( ''.cs_get_option('cart_text_by_id_text').'', 'ewc' );
    } else {
        return $default;
    }
}

//Ends Add To Cart Hooks


//Start Checkout Hooks

// Customize WooCommerce checkout fields
add_filter('woocommerce_checkout_fields', 'ewc_remove_billing_fields', 20);

function ewc_remove_billing_fields($fields) {

    global $woocommerce;
    
if ( cs_get_option('billing_first_name') ) {
    unset($fields['billing']['billing_first_name']);
}  
if ( cs_get_option('billing_first_name') ) {  
    unset($fields['billing']['billing_last_name']);
}    
if ( cs_get_option('billing_company') ) {   
    unset($fields['billing']['billing_company']);
}
if ( cs_get_option('billing_address_1') ) {     
    unset($fields['billing']['billing_address_1']);
}
if ( cs_get_option('billing_address_2') ) {     
    unset($fields['billing']['billing_address_2']);
}
if ( cs_get_option('billing_city') ) {    
    unset($fields['billing']['billing_city']);
}
if ( cs_get_option('billing_state') ) {    
    unset($fields['billing']['billing_state']);
}
if ( cs_get_option('billing_postcode') ) {     
    unset($fields['billing']['billing_postcode']);
}
if ( cs_get_option('billing_country') ) {     
    unset($fields['billing']['billing_country']);
}
if ( cs_get_option('billing_phone') ) {     
    unset($fields['billing']['billing_phone']);
}
    return $fields;

}


if ( cs_get_option('remove_billing_for_0') ) {
// Customize WooCommerce checkout fields
add_filter('woocommerce_checkout_fields', 'ewc_remove_billing_fields_for_free_orders', 20);
}

function ewc_remove_billing_fields_for_free_orders($fields) {

    global $woocommerce;

    // Return existing fields if order is more than $0
    if($woocommerce->cart->total > 0) {return $fields;}

    // Remove billing fields for $0 orders
    unset($fields['billing']['billing_first_name']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_phone']);

    return $fields;

}




if ( cs_get_option('remove_order_notes') ) {
// Remvove order notes
add_filter('woocommerce_checkout_fields', 'ewc_remove_order_notes_checkout_fields', 20);
}


function ewc_remove_order_notes_checkout_fields($fields) {

    global $woocommerce;

    // Remove order notes
    unset($fields['order']['order_comments']);

    return $fields;

}




//WooCommerce Edit Checkout Billing Address fields
add_filter( 'woocommerce_checkout_fields' , 'ewc_woo_customize_checkout_billing_address_fields' );
 
function ewc_woo_customize_checkout_billing_address_fields( $fields ) {

if ( cs_get_option('rename_order_comments') ) {
    // Rename Label of for Order Comments
    $fields['order']['order_comments']['label'] = ''.cs_get_option('rename_order_comments').'';
}
if ( cs_get_option('placeholder_text_order_comments') ) {
    // Change Placeholder text of Order Comments
     $fields['order']['order_comments']['placeholder'] = ''.cs_get_option('placeholder_text_order_comments').'';
}

    return $fields;
}



if ( cs_get_option('custom_checkout_msg') ) {
//add a message before the checkout form
add_action( 'woocommerce_before_checkout_form', 'ewc_custom_checkout_msg' );
}

function ewc_custom_checkout_msg() {
    echo '<p>'.cs_get_option('custom_checkout_msg').'</p>';
}



if ( cs_get_option('checkout_login_message') ) {
//customize the guest checkout message
add_filter( 'woocommerce_checkout_login_message' , 'ewc_custom_checkout_login_message' );
}

function ewc_custom_checkout_login_message($message) {
    $message = ''.cs_get_option('checkout_login_message').'';
    return $message;
}

//Ends Checkout Hooks







//Start Misc Hooks



if ( cs_get_option('free_product_text') ) {
// Customize the Free! price output
add_filter( 'woocommerce_variable_free_price_html','ewc_custom_free_price' );
add_filter( 'woocommerce_free_price_html', 'ewc_custom_free_price' );
add_filter( 'woocommerce_variation_free_price_html', 'ewc_custom_free_price' );
}

function ewc_custom_free_price( $price ) {
    // Edit content between single quotes below to desired output
    return ''.cs_get_option('free_product_text').'';
}



if ( cs_get_option('sale_text') ) {
//Woocommerce SALE customize text 
add_filter('woocommerce_sale_flash', 'ewc_custom_sale_flash', 10, 3);
}

function ewc_custom_sale_flash($text, $post, $_product)
{
    return '<span class="onsale">'.cs_get_option('sale_text').'</span>';
}



if ( cs_get_option('search_placeholder') ) {
//WooCommerce: customize products search form 
add_filter( 'get_product_search_form' , 'ewc_woo_custom_product_searchform' );
}

function ewc_woo_custom_product_searchform( $form ) {
    
    $form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
        <div>
            <label class="screen-reader-text" for="s">' . __( 'Search for:', 'woocommerce' ) . '</label>
            <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( ''.cs_get_option('search_placeholder').'', 'woocommerce' ) . '" />
            <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'woocommerce' ) .'" />
            <input type="hidden" name="post_type" value="product" />
        </div>
    </form>';
    
    return $form;
    
}



// Customizes the WooCommerce product sorting options
add_filter( "woocommerce_catalog_orderby", "ewc_custom_woocommerce_product_sorting", 20 );

function ewc_custom_woocommerce_product_sorting( $orderby ) {

if ( cs_get_option('remove_rating') ) {
    unset($orderby["rating"]);
}
if ( cs_get_option('remove_date') ) {    
    unset($orderby["date"]);
}
if ( cs_get_option('remove_price') ) {
    unset($orderby["price"]);
}
if ( cs_get_option('remove_popularity') ) {    
    unset($orderby["popularity"]);
}
    return $orderby;
}




if ( cs_get_option('remove_related_products') ) {
// Remove related products
add_action( 'init', 'ewc_remove_related_products' );
function ewc_remove_related_products() {
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
}
}

if ( cs_get_option('remove_shop_breadcrumb') ) {
// Remove shop's custom breadcrumb
add_action( 'init', 'ewc_remove_wc_breadcrumbs' );
function ewc_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
}
