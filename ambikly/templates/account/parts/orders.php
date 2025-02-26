<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<div id="orders" class="ambikly-tab-content">
    <h2><?php echo esc_html__('Your Orders', 'ambikly'); ?></h2>
    <table class="ambikly-orders-table">
        <thead>
        <tr>
            <th><?php echo esc_html__('ID', 'ambikly'); ?></th>
            <th><?php echo esc_html__('Code', 'ambikly'); ?></th>
            <th><?php echo esc_html__('Status', 'ambikly'); ?></th>
            <th><?php echo esc_html__('Total', 'ambikly'); ?></th>
            <th><?php echo esc_html__('Date', 'ambikly'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (count($orders) > 0) {
            foreach ($orders as $order) {
                ?>
                <tr>
                    <td>#<?php echo esc_html($order['ID']) ?></td>
                    <td><?php echo esc_html($order['order_code']) ?></td>
                    <td><?php echo esc_html(ambikly_get_order_statuses($order['status'])) ?></td>
                    <td><?php echo esc_html(ambikly_get_price($order['total_amount'], $order['currency'])) ?></td>
                    <td><?php echo esc_html(ambikly_format_date($order['created_at'])) ?></td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="5"><?php echo esc_html__('No order found!', 'ambikly'); ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>