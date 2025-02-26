<?php 

if (!defined('ABSPATH')) {
    exit;
}


// Display advance paid in the order summary table on the email
add_action('woocommerce_email_customer_details', 'accodps_add_advance_paid_to_email', 20, 4);
function accodps_add_advance_paid_to_email($order, $sent_to_admin, $plain_text, $email) {

    // Check if the order has an advance payment
    $advance_payment = $order->get_meta('_advance_payment');
    if ($advance_payment) {
        // Display the "Advance Paid" amount
        if ($plain_text) {
            // Translators: %s is the formatted advance payment amount.
            echo sprintf(esc_html__('Advance Paid: %s', 'advanced-conditional-cod-payment-system'), wp_kses_post(wc_price($advance_payment))). "\n";
        } else {
            // Translators: %s is the formatted advance payment amount.
            echo '<p style="padding:10px 10px;border:1px solid #ddd;display:flex;justify-content:space-around;background:#F7F7F7;">' . sprintf(esc_html__('Advance Paid: %s', 'advanced-conditional-cod-payment-system'), wp_kses_post(wc_price($advance_payment))) . '</p>';
        }
    }

    // Check if the order has an advance payment for remaining payment details
    $remaining_payment = $order->get_meta('_remaining_payment');
    if ($advance_payment) {
        // Display the "Remaining Payment" amount
        if ($plain_text) {
            // Translators: %s is the formatted remaining payment amount.
            echo sprintf(esc_html__('Remaining Payment: %s', 'advanced-conditional-cod-payment-system'), wp_kses_post(wc_price($remaining_payment))) . "\n";
        } else {
            // Translators: %s is the formatted remaining payment amount.
            echo '<p style="padding:10px 10px;border:1px solid #ddd;display:flex;justify-content:space-around;background:#F7F7F7;">' . sprintf(esc_html__('Remaining Payment: %s', 'advanced-conditional-cod-payment-system'), wp_kses_post(wc_price($remaining_payment))) . '</p>';
        }
    }

    // Add remaining payment notice to the email
    if ($order->get_meta('_advance_payment')) {
        // Translators: %s is the formatted remaining payment amount.
        echo sprintf(esc_html__('Please note: You need to pay the remaining amount of %s upon delivery.', 'advanced-conditional-cod-payment-system'), wp_kses_post(wc_price($remaining_payment)));
    }
}
