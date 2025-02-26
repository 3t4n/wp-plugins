<?php

use Ambikly\Constants;

function ambikly_product_statuses($status = '')
{
    $statuses = array(
        'draft' => esc_html__('Draft', 'ambikly'),
        'publish' => esc_html__('Published', 'ambikly'),
        'trash' => esc_html__('Trash', 'ambikly')
    );

    if ($status == '') {
        return $statuses;
    }
    if (isset($statuses[$status])) {
        return $statuses[$status];
    }
    return $statuses;
}

function ambikly_product_category_statuses($status = '')
{
    $statuses = array(
        'draft' => esc_html__('Draft', 'ambikly'),
        'publish' => esc_html__('Published', 'ambikly'),
        'trash' => esc_html__('Trash', 'ambikly')
    );

    if ($status == '') {
        return $statuses;
    }
    if (isset($statuses[$status])) {
        return $statuses[$status];
    }
    return $statuses;
}

function ambikly_permalink($slug, $context = 'product')
{
    $permalink_structure = get_option('permalink_structure');

    // If permalink structure is plain, return a query string URL
    if (empty($permalink_structure)) {
        if ($context == 'product') {
            return home_url('?ambikly_type=' . Constants::AMBIKLY_PRODUCT_TYPE . '&name=' . $slug);
        } else if ($context == 'category') {
            return home_url('?ambikly_type=' . Constants::AMBIKLY_CATEGORY_TYPE . '&name=' . $slug);
        }
    }

    // If pretty permalinks are enabled, use the traditional URL structure
    if ($context == 'product') {
        return home_url(Constants::getProductBase() . '/' . $slug . '/');
    } else if ($context == 'category') {
        return home_url(Constants::getCategoryBase() . '/' . $slug . '/');
    }

    return null;
}

function ambikly_get_edit_link($id, $context = 'product')
{
    switch ($context) {
        case "category":
            return admin_url('admin.php?page=ambikly&sub=add-new-category&action=edit&id=' . absint($id));
        case "order":
            return admin_url('admin.php?page=ambikly&sub=new-order&action=edit&id=' . absint($id));
        default:
            return admin_url('admin.php?page=ambikly&sub=add-new-product&action=edit&id=' . absint($id));
    }
}

function ambikly_get_add_link($context = 'product')
{
    switch ($context) {
        case "category":
            return admin_url('admin.php?page=ambikly&sub=add-new-category');
        default:
            return admin_url('admin.php?page=ambikly&sub=add-new-product');
    }
}

function ambikly_get_price($price, $currency = '', $echo = false)
{
    $currency = ambikly_currency_symbol($currency);
    $args = [
        'decimals' => ambikly_get_option('number_of_decimals', 2),
        'decimal_separator' => ambikly_get_option('decimal_separator', '.'),
        'thousand_separator' => ambikly_get_option('thousand_separator', ',')
    ];

    $price = max(0, floatval($price));
    $price = apply_filters(
        'formatted_ambikly_price',
        number_format($price, $args['decimals'], $args['decimal_separator'], $args['thousand_separator']),
        $price,
        $args['decimals'],
        $args['decimal_separator'],
        $args['thousand_separator']
    );

    $currency_position = ambikly_get_option('currency_position', 'left_space');
    $positions = [
        'left_space' => $currency . ' ' . $price,
        'right_space' => $price . ' ' . $currency,
        'right' => $price . $currency,
        'default' => $currency . $price
    ];

    $price_string = $positions[$currency_position] ?? $positions['default'];
    if (!$echo) {
        return $price_string;
    }
    echo esc_html($price_string);
}


function ambikly_get_cart_page($get_permalink = false)
{
    $page_id = ambikly_get_option('cart_page');

    if ($page_id > 0) {
        return $get_permalink ? get_permalink($page_id) : $page_id;
    }

    return null;
}

function ambikly_get_checkout_page($get_permalink = false)
{
    $page_id = ambikly_get_option('checkout_page');

    if ($page_id > 0) {
        return $get_permalink ? get_permalink($page_id) : $page_id;
    }

    return null;
}

function ambikly_get_account_page($get_permalink = false)
{
    $page_id = ambikly_get_option('account_page');

    if ($page_id > 0) {
        return $get_permalink ? get_permalink($page_id) : $page_id;
    }

    return null;
}

function ambikly_get_thank_you_page($get_permalink = false)
{
    $page_id = ambikly_get_option('thank_you_page');

    if ($page_id > 0) {
        return $get_permalink ? get_permalink($page_id) : $page_id;
    }

    return null;
}

function ambikly_get_shop_page($get_permalink = false)
{
    $page_id = ambikly_get_option('shop_page');

    if ($page_id > 0) {
        return $get_permalink ? get_permalink($page_id) : $page_id;
    }

    return null;
}

function ambikly_get_order_statuses($status = '')
{
    $statuses = apply_filters('ambikly_order_statuses', [
        'pending' => esc_html__('Pending', 'ambikly'),
        'hold' => esc_html__('On-Hold', 'ambikly'),
        'processing' => esc_html__('Processing', 'ambikly'),
        'completed' => esc_html__('Completed', 'ambikly'),
        'failed' => esc_html__('Failed', 'ambikly'),
        'canceled' => esc_html__('Canceled', 'ambikly'),
        'refunded' => esc_html__('Refunded', 'ambikly'),
    ]);
    if ($status == '') {


        return $statuses;

    } else if (isset($statuses[$status])) {

        return $statuses[$status];

    } else {

        return null;
    }
}

function ambikly_get_payment_statuses($status = '')
{
    $statuses = apply_filters('ambikly_payment_statuses', [
        'pending' => esc_html__('Pending', 'ambikly'),
        'processing' => esc_html__('Processing', 'ambikly'),
        'completed' => esc_html__('Completed', 'ambikly'),
        'failed' => esc_html__('Failed', 'ambikly'),
        'canceled' => esc_html__('Canceled', 'ambikly'),
        'refunded' => esc_html__('Refunded', 'ambikly'),
    ]);
    if ($status == '') {

        return $statuses;

    } else if (isset($statuses[$status])) {

        return $statuses[$status];

    } else {

        return null;
    }
}

function ambikly_format_date($date, $format = '')
{
    // Check if a valid date is provided
    if (!$date) {
        return '';
    }

    // Use WordPress global date and time formats if no custom format is provided
    if (empty($format)) {
        $date_format = get_option('date_format'); // Get global date format
        $time_format = get_option('time_format'); // Get global time format

        // Combine date and time formats
        $format = $date_format . ' ' . $time_format;
    }

    // Convert date to timestamp if it's not already
    if (!is_numeric($date)) {
        $timestamp = strtotime($date);
    } else {
        $timestamp = $date;
    }

    // Format the date
    return date_i18n($format, $timestamp);
}


if (!function_exists('ambikly_get_countries')) {
    function ambikly_get_countries($country_id = '')
    {
        $all_countries = include AMBIKLY_ABSPATH . 'src/Helpers/countries.php';

        if ($country_id !== '' && isset($all_countries[$country_id])) {

            return $all_countries[$country_id];
        }

        return $all_countries;
    }
}