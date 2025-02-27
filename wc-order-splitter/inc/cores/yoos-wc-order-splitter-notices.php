<?php

if (!defined('ABSPATH')) {
	exit;
}

class WC_Order_Splitter_Notices {

    public function __construct() {
        add_action('admin_notices', [$this, 'display_notices']);
        add_action('wp_ajax_never_show_wc_order_splitter_notice', [$this, 'never_show_notice']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_inline_scripts']);
        add_action('wp_ajax_dismiss_pre_order_notice', [$this, 'dismiss_pre_order_notice']);
    }

    public function display_notices() {
        $this->admin_notice();
        $this->premium_features_ad();
    }

    public function admin_notice() {
        $user_id = get_current_user_id();
        $activation_time = get_user_meta($user_id, 'wc_order_splitter_activation_time', true);
        $current_time = current_time('timestamp');

        if (get_user_meta($user_id, 'wc_order_splitter_never_show_again', true) === 'yes') {
            return;
        }

        if (!$activation_time) {
            update_user_meta($user_id, 'wc_order_splitter_activation_time', $current_time);
            return;
        }

        $time_since_activation = $current_time - $activation_time;
        $days_since_activation = floor($time_since_activation / DAY_IN_SECONDS);

        if (current_user_can('administrator') && $days_since_activation >= 1) {
            echo '<div class="notice notice-info is-dismissible">
                    <p>Thank you for using WooCommerce Order Splitter! Please support us by <a href="https://wordpress.org/plugins/wc-order-splitter/#reviews" target="_blank">leaving a review</a> <span style="color: #e26f56;">&#9733;&#9733;&#9733;&#9733;&#9733;</span> to keep updating & improving.</p>
                    <p><a href="#" onclick="WC_Order_Splitter_Notice.dismissForever()">Never show this again</a></p>
                  </div>';
        }
    }

    public function premium_features_ad() {
        $user_id = get_current_user_id();
        if (get_user_meta($user_id, 'yoads_orders_splitter_120', true) == 1) {
            return;
        }

        if (current_user_can('administrator')) {
            echo '<div class="notice notice-success is-dismissible">
                    <p><strong>New Order Splitter Premium Features Available:</strong> Automation workflows splitting and split by attribute! Upgrade now to save time and improve your store management. <a href="https://yoohw.com/product/woocommerce-order-splitter-premium/" target="_blank">Check it</a></p><p>
                    <p><a href="https://yoohw.com/product/woocommerce-order-splitter-premium/" target="_blank" class="button-primary">Learn More</a> <a href="#" onclick="WC_Order_Splitter_Notice.dismissPreOrderNotice()">Dismiss this notice</a></p>
                  </div>';
        }
    }

    public function enqueue_inline_scripts() {
        $nonce_never_show = wp_create_nonce('never_show_wc_order_splitter_notice_nonce');
        $nonce_pre_order = wp_create_nonce('split_order_nonce');

        $script = "
            var WC_Order_Splitter_Notice = {
                dismissForever: function() {
                    jQuery.ajax({
                        url: ajaxurl,
                        type: 'POST',
                        data: {
                            action: 'never_show_wc_order_splitter_notice',
                            security: '{$nonce_never_show}'
                        },
                        success: function() {
                            jQuery('.notice.notice-info').hide();
                        }
                    });
                },
                dismissPreOrderNotice: function() {
                    jQuery.ajax({
                        url: ajaxurl,
                        type: 'POST',
                        data: {
                            action: 'dismiss_pre_order_notice',
                            nonce: '{$nonce_pre_order}'
                        },
                        success: function(response) {
                            if (response.success) {
                                jQuery('.notice.notice-success').hide();
                            } else {
                                alert(response.data);
                            }
                        }
                    });
                },
            };
        ";

        wp_add_inline_script('jquery-core', $script);
    }

    public function never_show_notice() {
        check_ajax_referer('never_show_wc_order_splitter_notice_nonce', 'security');
        $user_id = get_current_user_id();
        update_user_meta($user_id, 'wc_order_splitter_never_show_again', 'yes');
    }

    public function dismiss_pre_order_notice() {
        if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'split_order_nonce')) {
            wp_send_json_error(__('Invalid nonce', 'wc-order-splitter'));
        }

        $user_id = get_current_user_id();
        if (!$user_id) {
            wp_send_json_error(__('User not logged in', 'wc-order-splitter'));
        }

        update_user_meta($user_id, 'yoads_orders_splitter_120', 1);

        wp_send_json_success(__('Notice dismissed', 'wc-order-splitter'));
    }
}

new WC_Order_Splitter_Notices();
