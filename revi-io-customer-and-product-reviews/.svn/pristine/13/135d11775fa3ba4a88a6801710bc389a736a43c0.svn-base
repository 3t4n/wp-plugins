<?php

if (!defined('ABSPATH')) {
    exit;
}


// WooCommerce actions and filters
if (defined('WOOCOMMERCE_ACTIVE') && WOOCOMMERCE_ACTIVE) {
    add_action('init', 'revi_woocommerce_remove_reviews');
    add_action('woocommerce_after_shop_loop_item_title', 'revi_product_list', 5);


    if (get_option('REVI_PRODUCT_METADATA') && get_option('REVI_SUBSCRIPTION') >= 2) {
        add_action('wp_head', 'revi_schema_product');
    }

    add_action('woocommerce_thankyou', 'revi_popup_order_confirmation', 111, 1);

    if (get_option('REVI_TAB_REVIEWS')) {
        add_filter('woocommerce_product_tabs', 'revi_product_tab', 121);
    } else {
        add_filter('woocommerce_after_single_product', 'revi_load_widget_product', 121);
        // add_filter('woocommerce_single_product_summary', 'revi_load_widget_product_stars', 9);
    }

    if (get_option('REVI_TAB_PRODUCT_STARS') == 1) {
        add_filter('woocommerce_before_add_to_cart_form', 'revi_load_widget_product_stars', 9);
    } else {
        add_filter('woocommerce_single_product_summary', 'revi_load_widget_product_stars', 9);
    }

    add_filter('woocommerce_structured_data_product', 'structured_data_product_nulled_wiped', 10, 2);
}


// PRODUCT WIDGETS
function revi_product_list()
{
    global $post;
    $idProduct = $post->ID;

    $reviProductsModel = new reviProductsModel();
    $productInfo = $reviProductsModel->getReviProduct($idProduct);

    $REVI_DISPLAY_PRODUCT_LIST_ALIGN = get_option('REVI_DISPLAY_PRODUCT_LIST_ALIGN');
    $REVI_DISPLAY_PRODUCT_LIST_EMPTY = get_option('REVI_DISPLAY_PRODUCT_LIST_EMPTY');
    $REVI_DISPLAY_PRODUCT_LIST_BLANK_SPACE = get_option('REVI_DISPLAY_PRODUCT_LIST_BLANK_SPACE') ?? 1;
    $REVI_DISPLAY_PRODUCT_LIST_TEXT = get_option('REVI_DISPLAY_PRODUCT_LIST_TEXT');

    include REVI_DIR . 'templates/hook/product_list.php';
}

// Remove WooCommerce Reviews
function revi_woocommerce_remove_reviews()
{
    $REVI_WOOCOMMERCE_REVIEWS = get_option('REVI_WOOCOMMERCE_REVIEWS');
    if (!isset($REVI_WOOCOMMERCE_REVIEWS) || !$REVI_WOOCOMMERCE_REVIEWS) {
        remove_post_type_support('product', 'comments');
        remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
    }
}

// WooCommerce Product Tabs
function revi_product_tab($tabs)
{
    global $post;
    $idProduct = $post->ID;

    $reviProductsModel = new reviProductsModel();
    $productInfo = $reviProductsModel->getReviProduct($idProduct);

    if ($productInfo->num_reviews == 0 && get_option('REVI_DISPLAY_WIDGET_WITHOUT_REVIEWS') == 0) {
        return $tabs;
    }

    $tabs['reviews']['callback'] = 'revi_load_widget_product'; // Custom description callback
    $tabs['reviews']['title'] = __('Reviews', 'revi-io-customer-and-product-reviews');

    return $tabs;
}

// Load Widget for Product
function revi_load_widget_product()
{
    global $post;
    $idProduct = $post->ID;

    $reviProductsModel = new reviProductsModel();
    $productInfo = $reviProductsModel->getReviProduct($idProduct);

    if ($productInfo->num_reviews == 0 && get_option('REVI_DISPLAY_WIDGET_WITHOUT_REVIEWS') == 0) {
        return;
    }

    revi_load_widget_html("product", [], esc_attr($idProduct));
}

// Load Widget for Product Small
function revi_load_widget_product_stars()
{
    global $post;
    $idProduct = $post->ID;

    $reviProductsModel = new reviProductsModel();
    $productInfo = $reviProductsModel->getReviProduct($idProduct);
    if ($productInfo->num_reviews == 0 && get_option('REVI_DISPLAY_WIDGET_WITHOUT_REVIEWS') == 0) {
        return;
    }

    revi_load_widget_html("stars", [], esc_attr($idProduct));
}

// Remove WooCommerce Default Structured Data
function structured_data_product_nulled_wiped($markup, $product)
{
    return [];
}
