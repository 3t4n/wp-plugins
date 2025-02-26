<?php
if (!defined('ABSPATH')) exit;

do_action('shiperman_before_recent_order_title'); ?>

<h2><?php esc_html_e('Recent Orders', 'shiperman-for-woocommerce'); ?></h2>

<?php do_action('shiperman_before_recent_orders_list'); ?>

<?php if (isset($recent_orders['status']) && 'success' === $recent_orders['status']): ?>
    <table class="widefat fixed striped">
        <thead>
            <tr>
                <th><?php esc_html_e('Order ID', 'shiperman-for-woocommerce'); ?></th>
                <th><?php esc_html_e('Date', 'shiperman-for-woocommerce'); ?></th>
                <th><?php esc_html_e('Status', 'shiperman-for-woocommerce'); ?></th>
                <th><?php esc_html_e('Sender', 'shiperman-for-woocommerce'); ?></th>
                <th><?php esc_html_e('Email', 'shiperman-for-woocommerce'); ?></th>
                <th><?php esc_html_e('Parcel Inside', 'shiperman-for-woocommerce'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($recent_orders['data']['items']) && !empty($recent_orders['data']['items'])) :
                foreach ($recent_orders['data']['items'] as $order) : ?>
                    <tr>
                        <td><?php echo esc_html($order['referenceId'] ?? ''); ?></td>
                        <td><?php echo esc_html(gmdate('Y-m-d H:i:s', $order['dateCreated'] ?? 0)); ?></td>
                        <td><?php echo esc_html($order['status'] ?? ''); ?></td>
                        <td><?php echo esc_html($order['recipient']['name'] ?? ''); ?></td>
                        <td><?php echo esc_html($order['recipient']['email'] ?? ''); ?></td>
                        <td><?php echo esc_html(implode(', ', array_column($order['items'], 'id'))); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6"><?php esc_html_e('No record found!', 'shiperman-for-woocommerce'); ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <p>
        <a href="<?php echo esc_url(admin_url('admin.php?page=shiperman_orders')); ?>" class="button button-primary">
            <?php esc_html_e('See All Orders', 'shiperman-for-woocommerce'); ?>
        </a>
    </p>
    <?php do_action('shiperman_after_recent_orders_list'); ?>
<?php else : ?>
    <p><?php echo esc_html(apply_filters('shiperman_no_recent_orders_found', __('No recent orders found.', 'shiperman-for-woocommerce'))); ?></p>
<?php endif; ?>