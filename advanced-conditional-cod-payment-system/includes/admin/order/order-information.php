<?php

// Display custom fields in admin order page
add_action('woocommerce_admin_order_totals_after_shipping', 'accodps_display_custom_order_meta_data_in_admin');
function accodps_display_custom_order_meta_data_in_admin($order_id) {
    $order = wc_get_order($order_id);
    
    $advance_payment = $order->get_meta('_advance_payment');
    $remaining_payment = $order->get_meta('_remaining_payment');
    
    ?>
    <tr>
        <td class="label">Advanced Paid:</td>
        <td width="1%"></td>
        <td class="total">
            <?php echo wp_kses_post(wc_price($advance_payment)); ?>
        </td>
    </tr>
    <tr>
        <td class="label">Remaining Payment:</td>
        <td width="1%"></td>
        <td class="total">
            <?php echo wp_kses_post(wc_price($remaining_payment)); ?>
        </td>
    </tr>
    <?php
}

add_action('woocommerce_admin_order_totals_after_total', 'accodps_adjust_order_totals');
function accodps_adjust_order_totals($order_id) {
    $order = wc_get_order($order_id);

    $total = $order->get_total();
    $advance_payment = $order->get_meta('_advance_payment');
    $remaining_payment = $order->get_meta('_remaining_payment');

    if ($advance_payment) {
        $order_total = $advance_payment + $remaining_payment;

        ?>
        <tr>
            <td class="label">Order Total Updated:</td>
            <td width="1%"></td>
            <td class="total">
                <?php echo wp_kses_post(wc_price($order_total)); ?>
            </td>
        </tr>
        <?php
    }
}