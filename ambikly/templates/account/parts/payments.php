<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<div id="payments" class="ambikly-tab-content">
    <h2><?php echo esc_html__('Payment History', 'ambikly'); ?></h2>
    <table class="ambikly-orders-table">
        <thead>
        <tr>
            <th><?php echo esc_html__('ID', 'ambikly'); ?></th>
            <th><?php echo esc_html__('Order', 'ambikly'); ?></th>
            <th><?php echo esc_html__('Gateway', 'ambikly'); ?></th>
            <th><?php echo esc_html__('Transaction ID', 'ambikly'); ?></th>
            <th><?php echo esc_html__('Status', 'ambikly'); ?></th>
            <th><?php echo esc_html__('Total', 'ambikly'); ?></th>
            <th><?php echo esc_html__('Date', 'ambikly'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (count($payments) > 0) {
            foreach ($payments as $payment) {
                ?>
                <tr>
                    <td><?php echo esc_html($payment['ID']) ?></td>
                    <td><?php echo esc_html($payment['order_id']) ?></td>
                    <td><?php echo esc_html($payment['payment_method']) ?></td>
                    <td><?php echo esc_html($payment['transaction_id']) ?></td>
                    <td><?php echo esc_html(ambikly_get_payment_statuses($payment['status'])) ?></td>
                     <td><?php echo esc_html(ambikly_get_price($payment['amount'], $payment['currency'])) ?></td>
                    <td><?php echo esc_html(ambikly_format_date($payment['created_at'])) ?></td>

                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="7"><?php echo esc_html__('No payment found!', 'ambikly'); ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>