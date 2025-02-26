<?php

//here is the core codes
// exit if file is called directly
if (!defined('ABSPATH')) {

    exit;
}

require 'auto_generate_coupon-objects.php';

$options = get_option('auto_generate_coupon_options', auto_generate_coupon_default_options());

if ($options['active_campaign'] == 1) {
    add_action('woocommerce_thankyou', 'auto_generate_coupon_main_function', 10, 1);
}

function auto_generate_coupon_main_function($order_id) {

    $options = get_option('auto_generate_coupon_options', auto_generate_coupon_default_options());

//    $user_id = get_current_user_id();
    $order = wc_get_order($order_id);
    $coupon_code = 'agc' . auto_generate_coupon::randcouponcode(5); // random coupon code 
    $amount = $options['coupon_amount']; // Amount
    $discount_type = $options['discount_type'];
    $indivisual_use = $options['individual_use'] == 1 ? 'yes' : 'no';
    $free_shipping = $options['free_shipping'] == 1 ? 'yes' : 'no';
    
    $coupon = array(
        'post_title' => $coupon_code,
        'post_content' => '',
        'post_status' => 'publish',
        'post_author' => 1,
        'post_excerpt' => 'Create by Auto generate coupon for Woocommerce',
        'post_type' => 'shop_coupon');

    $new_coupon_id = wp_insert_post($coupon);
    update_post_meta($new_coupon_id, 'discount_type', esc_html($discount_type));
    update_post_meta($new_coupon_id, 'coupon_amount', esc_html($amount));
    update_post_meta($new_coupon_id, 'individual_use', esc_html($indivisual_use));
    update_post_meta($new_coupon_id, 'product_ids', '');
    update_post_meta($new_coupon_id, 'exclude_product_ids', '');
    update_post_meta($new_coupon_id, 'usage_limit', 1);
    update_post_meta($new_coupon_id, 'usage_limit_per_user', 1);
    update_post_meta($new_coupon_id, 'expiry_date', esc_html($options['expiry_date']));
    update_post_meta($new_coupon_id, 'apply_before_tax', 'no');
    update_post_meta($new_coupon_id, 'free_shipping', esc_html($free_shipping));
    update_post_meta($new_coupon_id, 'exclude_sale_items', 'yes');
    update_post_meta($new_coupon_id, 'minimum_amount', '');
    update_post_meta($new_coupon_id, 'customer_email', esc_html(wp_get_current_user()->user_email));

    
    echo str_replace('%s', esc_attr($coupon_code), '<h1 style="text-align: center;padding: 15px;background: #ebebeb;color: #000;order-radius: 5px;font-family: inherit;">'. esc_html($options['coupon_message']).'</h1>');
}
