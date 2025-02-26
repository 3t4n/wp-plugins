<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/* Add Woocommerce General Setting Automatic Remove Cart Item Option  */
if (! function_exists('auto_remove_cart_item_general_settings')) {
    function auto_remove_cart_item_general_settings($settings)
    {
        $key = 0;
        foreach ($settings as $values) {
            $new_settings[$key] = $values;
            $key++;

            if ($values['id'] == 'woocommerce_default_customer_address') {
                $new_settings[$key] = array(
                'name' => __('auto_remove_cart_item_dropdown', 'automatic-remove-cart-item'),
                'title' => __('Automatic Remove Cart Item', 'automatic-remove-cart-item'),
                'id'       => 'auto_remove_cart_item_dropdown',
                'class'       => 'auto_remove_cart_item_dropdown',
                'placeholder'  => '3600',
                'type'     => 'select',
                'options'  => array(
                'auto_remove_cart_item_time_interval_select'     => __('Please Select', 'automatic-remove-cart-item'),
                'auto_remove_cart_item_time_interval_seconds'     => __('Seconds', 'automatic-remove-cart-item'),
                'auto_remove_cart_item_time_interval_minutes'   => __('Minutes', 'automatic-remove-cart-item'),
                'auto_remove_cart_item_time_interval_hours'  => __('Hours', 'automatic-remove-cart-item'),
                'auto_remove_cart_item_time_interval_days'  => __('Days', 'automatic-remove-cart-item'),
                ),
                'desc' => __('Select a time interval.', 'automatic-remove-cart-item'),
                'desc_tip' => true,
                );
                $key++;
            }
            if ($values['id'] == 'woocommerce_default_customer_address') {
                $new_settings[$key] = array(
                'name' => __('auto_remove_cart_item_time_interval_seconds', 'automatic-remove-cart-item'),
                'title' => __('Enter a time in seconds', 'automatic-remove-cart-item'),
                'id'       => 'auto_remove_cart_item_time_interval_seconds',
                'class'       => 'auto_remove_cart_item_time_interval_row',
                'placeholder'  => '60',
                'type'     => 'number',
                 'custom_attributes' => array(
                'min' => '1',
                'max' => '60',
                ),
                'desc' => __('Enter a time in seconds ex: 1 to 60', 'automatic-remove-cart-item'),
                'desc_tip' => true,
                );
                $key++;
            }
            if ($values['id'] == 'woocommerce_default_customer_address') {
                $new_settings[$key] = array(
                'name' => __('auto_remove_cart_item_time_interval_minutes', 'automatic-remove-cart-item'),
                'title' => __('Enter a time in minutes', 'automatic-remove-cart-item'),
                'id'       => 'auto_remove_cart_item_time_interval_minutes',
                'class'       => 'auto_remove_cart_item_time_interval_row',
                'placeholder'  => '60',
                'type'     => 'number',
                'custom_attributes' => array(
                'min' => '1',
                'max' => '60',
                ),
                'desc' => __('Enter a time in minutes ex: 1 to 60', 'automatic-remove-cart-item'),
                'desc_tip' => true,
                );
                $key++;
            }
            if ($values['id'] == 'woocommerce_default_customer_address') {
                $new_settings[$key] = array(
                'name' => __('auto_remove_cart_item_time_interval_hours', 'automatic-remove-cart-item'),
                'title' => __('Enter a time in hours', 'automatic-remove-cart-item'),
                'id'       => 'auto_remove_cart_item_time_interval_hours',
                'class'       => 'auto_remove_cart_item_time_interval_row',
                'placeholder'  => '24',
                'type'     => 'number',
                'custom_attributes' => array(
                'min' => '1',
                'max' => '24',
                ),
                'desc' => __('Enter a time in hours ex: 1 to 24', 'automatic-remove-cart-item'),
                'desc_tip' => true,
                );
                $key++;
            }
            if ($values['id'] == 'woocommerce_default_customer_address') {
                $new_settings[$key] = array(
                'name' => __('auto_remove_cart_item_time_interval_days', 'automatic-remove-cart-item'),
                'title' => __('Enter a time in days', 'automatic-remove-cart-item'),
                'id'       => 'auto_remove_cart_item_time_interval_days',
                'class'       => 'auto_remove_cart_item_time_interval_row',
                'placeholder'  => '30',
                'type'     => 'number',
                'custom_attributes' => array(
                'min' => '1',
                'max' => '31',
                ),
                'desc' => __('Enter a time in days ex: 1 to 31', 'automatic-remove-cart-item'),
                'desc_tip' => true,
                );
                $key++;
            }
            if ($values['id'] == 'woocommerce_default_customer_address') {
                $new_settings[$key] = array(
                'name' => __('auto_remove_cart_item_checkbox', 'automatic-remove-cart-item'),
                'title' => __('Enable clear cart', 'automatic-remove-cart-item'),
                'desc' => __('Remove all cart item', 'automatic-remove-cart-item'),
                'id'       => 'auto_remove_cart_item_checkbox',
                'class'       => 'auto_remove_cart_item_time_interval_row',
                'type'     => 'checkbox',
                'default'  => 'no',
                );
                $key++;
            }
        }
        return $new_settings;
    }
}
add_filter('woocommerce_general_settings', 'auto_remove_cart_item_general_settings');

/* Add Woocommerce General Setting Automatic Remove Cart Item Option save field */
if (! function_exists('auto_remove_cart_item_save_general_settings')) {
    function auto_remove_cart_item_save_general_settings()
    {
        /* Retrieve the nonce */
        $auto_remove_cart_item_custom_nonce = sanitize_text_field(wp_unslash(get_option('auto_remove_cart_item_custom_nonce')));
        $nonce = isset($auto_remove_cart_item_custom_nonce) ? $auto_remove_cart_item_custom_nonce : '';

        /* Save dropdown option value */
        if (isset($_POST['auto_remove_cart_item_dropdown']) && wp_verify_nonce(sanitize_text_field(wp_unslash($nonce)), 'save_general_settings_nonce')) {
            update_option('auto_remove_cart_item_dropdown', sanitize_text_field(wp_unslash($_POST['auto_remove_cart_item_dropdown'])));
        }

        /* Save dropdown auto_remove_cart_item_time_interval_seconds option value  */
        if (isset($_POST['auto_remove_cart_item_time_interval_seconds']) && wp_verify_nonce(sanitize_text_field(wp_unslash($nonce)), 'save_general_settings_nonce')) {
            update_option('auto_remove_cart_item_time_interval_seconds', sanitize_text_field(wp_unslash($_POST['auto_remove_cart_item_time_interval_seconds'])));
        }

        /* Save dropdown auto_remove_cart_item_time_interval_minutes option value  */
        if (isset($_POST['auto_remove_cart_item_time_interval_minutes']) && wp_verify_nonce(sanitize_text_field(wp_unslash($nonce)), 'save_general_settings_nonce')) {
            update_option('auto_remove_cart_item_time_interval_minutes', sanitize_text_field(wp_unslash($_POST['auto_remove_cart_item_time_interval_minutes'])));
        }

        /* Save dropdown auto_remove_cart_item_time_interval_hours option value  */
        if (isset($_POST['auto_remove_cart_item_time_interval_hours']) && wp_verify_nonce(sanitize_text_field(wp_unslash($nonce)), 'save_general_settings_nonce')) {
            update_option('auto_remove_cart_item_time_interval_hours', sanitize_text_field(wp_unslash($_POST['auto_remove_cart_item_time_interval_hours'])));
        }

        /* Save dropdown auto_remove_cart_item_time_interval_days option value  */
        if (isset($_POST['auto_remove_cart_item_time_interval_days']) && wp_verify_nonce(sanitize_text_field(wp_unslash($nonce)), 'save_general_settings_nonce')) {
            update_option('auto_remove_cart_item_time_interval_days', sanitize_text_field(wp_unslash($_POST['auto_remove_cart_item_time_interval_days'])));
        }
    }
}
add_action('woocommerce_update_options', 'auto_remove_cart_item_save_general_settings');

/* Add custom date and user ip when WoCommerce product item add in the cart */
if (! function_exists('auto_remove_cart_item_add_date_to_cart_item')) {
    function auto_remove_cart_item_add_date_to_cart_item($cart_item_data, $product_id, $variation_id, $quantity)
    {
        /* Get the current date and time */
        $current_date_time = current_time('Y-m-d H:i:s');
        /* Add the custom date and user ip to the cart item data */
        if (!empty($current_date_time)) {
            $cart_item_data['date_cart_item'] =  sanitize_text_field(wp_unslash($current_date_time));
        }
        if (!empty($_SERVER['REMOTE_ADDR'])) {
            $cart_item_data['ip_user_cart_item'] = sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR']));
        }
        return $cart_item_data;
    }
}
add_filter('woocommerce_add_cart_item_data', 'auto_remove_cart_item_add_date_to_cart_item', 10, 6);

/* Remove products items from the cart if not purchased within a time */
if (! function_exists('auto_remove_cart_item_not_purchased_within_time')) {
    function auto_remove_cart_item_not_purchased_within_time()
    {
        /* Get the current date with time and user IP */
        $current_date_time = current_time('Y-m-d H:i:s');
        if (!empty($current_date_time)) {
            $current_date_time = sanitize_text_field(wp_unslash($current_date_time));
        }
        if (!empty($_SERVER['REMOTE_ADDR'])) {
            $user_ip_add =  sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR']));
        }

        /* Get all option for Automatic Remove Cart Item */
        $auto_remove_cart_item_dropdown = sanitize_text_field(wp_unslash(get_option('auto_remove_cart_item_dropdown')));
        $auto_remove_cart_item_time_interval_seconds = sanitize_text_field(wp_unslash(get_option('auto_remove_cart_item_time_interval_seconds')));
        $auto_remove_cart_item_time_interval_minutes = sanitize_text_field(wp_unslash(get_option('auto_remove_cart_item_time_interval_minutes')));
        $auto_remove_cart_item_time_interval_hours = sanitize_text_field(wp_unslash(get_option('auto_remove_cart_item_time_interval_hours')));
        $auto_remove_cart_item_time_interval_days = sanitize_text_field(wp_unslash(get_option('auto_remove_cart_item_time_interval_days')));
        $auto_remove_cart_item_checkbox = sanitize_text_field(wp_unslash(get_option('auto_remove_cart_item_checkbox')));

        /* Define the time threshold (in seconds) here (1 min = 60 seconds). */
        if (!empty($auto_remove_cart_item_time_interval_seconds) && !empty($auto_remove_cart_item_dropdown) && $auto_remove_cart_item_dropdown == 'auto_remove_cart_item_time_interval_seconds') {
            $time_threshold = $auto_remove_cart_item_time_interval_seconds;
        } elseif (!empty($auto_remove_cart_item_time_interval_minutes) && !empty($auto_remove_cart_item_dropdown) && $auto_remove_cart_item_dropdown == 'auto_remove_cart_item_time_interval_minutes') {
            $time_threshold = $auto_remove_cart_item_time_interval_minutes * 60;
        } elseif (!empty($auto_remove_cart_item_time_interval_hours) && !empty($auto_remove_cart_item_dropdown) && $auto_remove_cart_item_dropdown == 'auto_remove_cart_item_time_interval_hours') {
            $time_threshold = $auto_remove_cart_item_time_interval_hours * 3600;
        } elseif (!empty($auto_remove_cart_item_time_interval_days) && !empty($auto_remove_cart_item_dropdown) && $auto_remove_cart_item_dropdown == 'auto_remove_cart_item_time_interval_days') {
            $time_threshold = $auto_remove_cart_item_time_interval_days * 86400;
        }

        if (function_exists('WC')) {
            $cart_items_count = is_object(WC()->cart) ? WC()->cart->get_cart_contents_count() : '';
        }

        if (!empty($time_threshold) && $cart_items_count > 0) {
            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                /* Check the cart time out if date_cart_item key and ip_user_cart_item key exists */
                if (!empty($cart_item['date_cart_item']) && !empty($cart_item['ip_user_cart_item'])) {
                    $date_cart_item = $cart_item['date_cart_item'];
                    $ip_user_cart_item = $cart_item['ip_user_cart_item'];
                    $time_difference = strtotime($current_date_time) - strtotime($date_cart_item);

                    /* Check the cart time out empty */
                    if (($time_difference >= $time_threshold) && ($user_ip_add == $ip_user_cart_item)) {
                        /* Check the option to enable remove all cart items */
                        if (!empty($auto_remove_cart_item_checkbox) && $auto_remove_cart_item_checkbox == 'yes') {
                            WC()->cart->empty_cart();
                        } else {
                            WC()->cart->remove_cart_item($cart_item_key);
                        }
                    }
                }
            }
        }
    }
}

add_action('wp', 'auto_remove_cart_item_not_purchased_within_time');
