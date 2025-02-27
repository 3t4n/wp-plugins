<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
// Include WooCommerce functions if not already included
if ( ! function_exists( 'wc_get_order' ) ) {
    return;
}

// Verify the nonce before processing form data
if ( isset($_GET['_wpnonce']) && ! wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['_wpnonce'])), 'pagination_nonce') ) {
    wp_die('Nonce verification failed');
}

// Function to count orders with specific payment method and status
function digages_count_orders_by_status_and_payment($status, $payment_method) {
    $statuses = array('wc-pending', 'wc-processing', 'wc-completed', 'wc-on-hold', 'wc-cancelled');
    
    // If status is 'any', use all defined statuses, otherwise use the specific status
    $query_status = ($status === 'any') ? $statuses : 'wc-' . $status;
    
    $args = array(
        'status' => $query_status,
        'payment_method' => $payment_method,
        'return' => 'ids',
        'limit' => -1
    );
    $orders = wc_get_orders($args);
    return count($orders);
}

// Get current status from URL
$current_status = isset($_GET['status']) ? sanitize_text_field(wp_unslash($_GET['status'])) : 'any';

// Function to generate status link with active styling
function digages_get_status_link($status, $current_status, $count, $label) {
    $is_active = ($status === $current_status);
    $link_style = $is_active ? 'color: #000; text-decoration: none; font-weight: 600;' : 'color: #0073aa;';
    $count_style = 'color: #666666;'; // Lighter gray color for counts
    
    return sprintf(
        '<a href="%s" style="%s">%s <span style="%s">(%s)</span></a>',
        esc_url(add_query_arg(array('page' => 'digages-direct-payments', 'status' => esc_attr($status)))),
        esc_attr($link_style),
        esc_html($label),
        esc_attr($count_style),
        esc_html($count)
    );
}


// Get counts for each order status with payment method filter
$payment_method = 'digages_direct_payments';
$all_orders_count = digages_count_orders_by_status_and_payment('any', $payment_method);
$processing_orders_count = digages_count_orders_by_status_and_payment('processing', $payment_method);
$on_hold_orders_count = digages_count_orders_by_status_and_payment('on-hold', $payment_method);
$completed_orders_count = digages_count_orders_by_status_and_payment('completed', $payment_method);
$cancelled_orders_count = digages_count_orders_by_status_and_payment('cancelled', $payment_method);

// Display order status counts with links
echo '<p>';
echo wp_kses_post(digages_get_status_link('any', $current_status, $all_orders_count, 'All')) . ' | ';
echo wp_kses_post(digages_get_status_link('processing', $current_status, $processing_orders_count, 'Confirmed')) . ' | ';
echo wp_kses_post(digages_get_status_link('on-hold', $current_status, $on_hold_orders_count, 'On hold')) . ' | ';
echo wp_kses_post(digages_get_status_link('completed', $current_status, $completed_orders_count, 'Completed')) . ' | ';
echo wp_kses_post(digages_get_status_link('cancelled', $current_status, $cancelled_orders_count, 'Cancelled'));

echo '</p>';

// Set the number of orders per page
$items_per_page = 20;
$current_page = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
$offset = ($current_page - 1) * $items_per_page;

// Determine the selected status
$selected_status = $current_status;

// Arguments for retrieving orders
$args = array(
    'limit'    => $items_per_page,
    'orderby'  => 'date',
    'order'    => 'DESC',
    'status'   => 'any' === $selected_status ? 
        array('wc-pending', 'wc-processing', 'wc-completed', 'wc-on-hold', 'wc-cancelled') : 
        'wc-' . $selected_status,
    'payment_method' => $payment_method,
    'offset'   => $offset,
);

// Get total number of orders for pagination
$total_orders = wc_get_orders(array(
    'status' => array('wc-pending', 'wc-processing', 'wc-completed', 'wc-on-hold', 'wc-cancelled'),
    'payment_method' => $payment_method,
    'return' => 'ids',
));
$total_orders_count = count($total_orders);

// Retrieve orders
$orders = wc_get_orders($args);

// Status icons mapping
$status_icons = [
    'wc-pending' => '<i class="bi bi-clock-fill pendingicn"></i>',
    'wc-on-hold' => '<i class="bi bi-clock-fill pendingicn"></i>',
    'wc-processing' => '<i class="bi bi-hourglass-split processicn"></i>',
    'wc-completed' => '<i class="bi bi-check-circle-fill complticn"></i>',
    'wc-cancelled' => '<i class="bi bi-x-circle-fill cancelicn"></i>',
];

// Display the orders in a form with bulk action options
echo '<form method="post">';
wp_nonce_field('digages_desktop_form_submitted', 'digages_desktop_form_nonce');
include_once(plugin_dir_path(__FILE__) . 'headerpart.php');

// Check if orders are available
if (!empty($orders)) {
    foreach ($orders as $order) {
        $order_status = $order->get_status();
        $status_icon = isset($status_icons[$order_status]) ? $status_icons[$order_status] : esc_html($order->get_status());
        $customer_name = $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();
        
    }
}

// Pagination links
$total_pages = ceil($all_orders_count / $items_per_page);
 
$pagination_nonce = wp_create_nonce('pagination_nonce');
?>