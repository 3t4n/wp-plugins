<?php

// Display advance paid in the order summary table on the Thank You page
function accodps_display_advance_paid_in_table($order_id) {
    $order = wc_get_order($order_id);

    if ($order->get_meta('_advance_payment')) {
        $advance_payment = $order->get_meta('_advance_payment');
        echo '<tr class="order-advance-paid">
            <th>' . esc_html__('Advance Paid', 'advanced-conditional-cod-payment-system') . ':</th>
            <td>' . wp_kses_post(wc_price($advance_payment)) . '</td>
        </tr>';
    }
    if ($order->get_meta('_remaining_payment')) {
        $remaining_payment = $order->get_meta('_remaining_payment');
        echo '<tr class="order-remaining-payment">
            <th>' . esc_html__('Remaining Payment', 'advanced-conditional-cod-payment-system') . ':</th>
            <td>' . wp_kses_post(wc_price($remaining_payment)) . '</td>
        </tr>';
    }
}
add_action('woocommerce_order_details_after_order_table_items', 'accodps_display_advance_paid_in_table');