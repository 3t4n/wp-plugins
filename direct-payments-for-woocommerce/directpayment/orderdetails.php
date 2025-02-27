<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

// Confirm Order
function digages_confirm_order_function() {
    check_ajax_referer('get_order_details_nonce', 'nonce');

    $order_id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    if (!$order_id) {
        wp_send_json_error('Missing order ID.');
        return;
    }

    $order = wc_get_order($order_id);
    if ($order instanceof WC_Order) {
        $order->update_status('processing', 'Order confirmed via admin.');
        wp_send_json_success('Order confirmed.');
    } else {
        wp_send_json_error('Invalid order.');
    }
}
add_action('wp_ajax_confirm_order', 'digages_confirm_order_function');
add_action('wp_ajax_nopriv_confirm_order', 'digages_confirm_order_function');

// Cancel Order
function digages_cancel_order_function() {
    check_ajax_referer('get_order_details_nonce', 'nonce');

    $order_id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    if (!$order_id) {
        wp_send_json_error('Missing order ID.');
        return;
    }

    $order = wc_get_order($order_id);
    if ($order instanceof WC_Order) {
        $order->update_status('cancelled', 'Order canceled via admin.');
        wp_send_json_success('Order canceled.');
    } else {
        wp_send_json_error('Invalid order.');
    }
}
add_action('wp_ajax_cancel_order', 'digages_cancel_order_function');
add_action('wp_ajax_nopriv_cancel_order', 'digages_cancel_order_function');

// Function to handle AJAX request for order details
add_action('wp_ajax_get_order_details', 'digages_get_order_details_callback');
add_action('wp_ajax_nopriv_get_order_details', 'digages_get_order_details_callback'); // Optional if you want to allow non-logged in users

function digages_get_order_details_callback() {
    check_ajax_referer('get_order_details_nonce', 'nonce'); // Validate nonce


    // Get order ID from request
    $order_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    if (!$order_id) {
        wp_send_json_error('Missing order ID.');
        return;
    }

    // Fetch order data
// Fetch order data
$order = wc_get_order($order_id);
if ($order instanceof WC_Order) {
    // Get screenshot file URL from the order meta
    $screenshot_file = get_post_meta($order_id, '_screenshot_file', true);
    $screenshot_url = $screenshot_file ? esc_url($screenshot_file) : ''; // Ensure the URL is valid

    
    $paydata = get_post_meta($order_id, '_digages_paymentdetails', true);
    $paydata = $paydata ? esc_attr($paydata) : ''; // Ensure the URL is valid

// Input text
$input = $paydata;

// Split the string by the delimiter '|'
$parts = array_map('trim', explode('|', $input));

$results = [];

foreach ($parts as $part) {
    // Find the length of the possible duplicate
    $length = strlen($part) / 2;
    
    // Get the first half of the string
    $firstHalf = substr($part, 0, $length);
    
    // Get the second half of the string
    $secondHalf = substr($part, $length);
    
    // Check if the two halves are identical
    if ($firstHalf === $secondHalf) {
        $results[] = $firstHalf;
    } else {
        // Try different lengths for the pattern
        $foundPattern = false;
        $textLength = strlen($part);
        
        for ($i = 1; $i <= $textLength / 2; $i++) {
            $pattern = substr($part, 0, $i);
            $remaining = str_replace($pattern, '', $part);
            
            // If the text consists entirely of repetitions of the pattern
            if (empty($remaining)) {
                $results[] = $pattern;
                $foundPattern = true;
                break;
            }
        }
        
        // If no pattern found, add the original part
        if (!$foundPattern) {
            $results[] = $part;
        }
    }
}

// Return the results joined by the delimiter
//echo implode(' | ', $results);  // Will output: tron | rekejrekoejorejkremkmerer22211 | Timi Olabajo



    // Get the original status
    $original_status = $order->get_status();
    
    // Check if the order status is 'processing'
    if ($original_status === 'processing') {
        $status_text = 'confirmed';
    } else {
        $status_text = $original_status; // Keep the original status for other cases
    }

    wp_send_json_success([
        'order_id' => $order->get_id(),
        'customer_name' => $order->get_billing_first_name() . ' ' . $order->get_billing_last_name(),
        'order_total' => wc_price($order->get_total(), ['currency' => $order->get_currency()]),
        'status' => $status_text, // Use the modified status text here
        'billing_email' => $order->get_billing_email(),
        'phone' => $order->get_billing_phone(),
        'date_created' => $order->get_date_created()->date_i18n(get_option('date_format') . ' ' . get_option('time_format')),
        'payment_method' => $order->get_payment_method_title(),
        'screenshot' => $screenshot_url, // Add screenshot URL to response
        'paydata' => implode(' | ', $results), // Add paydata URL to response
    ]);
} else {
    wp_send_json_error('Invalid order.');
}
}

?>