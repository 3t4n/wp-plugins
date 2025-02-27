<?php

// Get the plugin settings
    $settings = get_option('woocommerce_digages_direct_payments_settings');

    if (!$settings) {
        return;
    }

    // Unserialize settings
    $settings = maybe_unserialize($settings);

    // Check if auto_cancel_pending is enabled
    if (isset($settings['auto_cancel_pending']) && is_numeric($settings['auto_cancel_pending'])) {
        $auto_cancel_days = (int) $settings['auto_cancel_pending'];

        // Do not cancel if auto_cancel_pending is set to 0
        if ($auto_cancel_days === 0) {
            return;
        }

        // Get the current date and time
        $current_date = current_time('timestamp');

        // Define the order query arguments
        $args = array(
            'status' => array('on-hold', 'draft', 'pending'),
            'payment_method' => 'digages_direct_payments',
            'return' => 'ids',
            'limit' => -1
        );

        // Get the orders
        $orders = wc_get_orders($args);

        if ($orders) {
            foreach ($orders as $order_id) {
                $order = wc_get_order($order_id);

                if ($order) {
                    $order_date = strtotime($order->get_date_created());
                    $date_diff = ($current_date - $order_date) / DAY_IN_SECONDS;

                    if ($date_diff >= $auto_cancel_days) {
                        // Update order status to cancelled
                        $order->update_status('cancelled', __('Order automatically cancelled due to expiration.', 'direct-payments-for-woocommerce'));
                    }
                }
            }
        }
    }
