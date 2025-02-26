<?php 


// Add custom columns to orders list
add_filter('manage_edit-shop_order_columns', 'accodps_advanced_conditional_cod_system_add_order_columns');
function accodps_advanced_conditional_cod_system_add_order_columns($columns) {
    $new_columns = array();

    foreach ($columns as $key => $column) {
        $new_columns[$key] = $column;
        if ('order_total' === $key) {
            $new_columns['advance_payment'] = __('Advance Paid', 'advanced-conditional-cod-payment-system');
            $new_columns['remaining_payment'] = __('Remaining Amount', 'advanced-conditional-cod-payment-system');
        }
    }

    return $new_columns;
}

// Populate custom columns
add_action('manage_shop_order_posts_custom_column', 'accodps_advanced_conditional_cod_system_populate_order_columns');
function accodps_advanced_conditional_cod_system_populate_order_columns($column) {

    global $post;
    $order = wc_get_order($post->ID);

    if ('order_total' === $column) {
        $original_total = $order->get_meta('_original_order_total');
        
        if ($original_total) {
            echo wp_kses_post(wc_price($original_total));

        } else {
            echo wp_kses_post('');
        }
    }
    if ('advance_payment' === $column) {
        $advance_payment = $order->get_meta('_advance_payment');
        if ($advance_payment) {
            echo wp_kses_post(wc_price($advance_payment));
        } else {
            echo wp_kses_post('—');
        }
    }

    if ('remaining_payment' === $column) {
        $remaining_payment = $order->get_meta('_remaining_payment');
        if ($remaining_payment) {
            echo wp_kses_post(wc_price($remaining_payment));
        } else {
            echo wp_kses_post('—');
        }
    }
}