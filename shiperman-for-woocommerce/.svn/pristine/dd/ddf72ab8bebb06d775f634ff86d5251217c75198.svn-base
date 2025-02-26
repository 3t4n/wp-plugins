<?php

namespace SMFWC\Shiperman\Shipment;

use SMFWC\Shiperman\API\SMFWC_Shiperman_API;

if (!defined('ABSPATH')) exit;

class SMFWC_Shiperman_Shipment
{

    public function __construct()
    {

        add_filter('manage_woocommerce_page_wc-orders_columns', [$this, 'add_admin_order_list_custom_column']);
        add_filter('manage_edit-shop_order_columns', [$this, 'add_admin_order_list_custom_column']);

        add_action('manage_woocommerce_page_wc-orders_custom_column', [$this, 'create_shipment_column_content'], 10, 2);
        add_action('manage_shop_order_posts_custom_column', [$this, 'create_shipment_column_content'], 10, 2);

        add_action('admin_post_create_shipment', [$this, 'handle_create_shipment_action']);

        add_action('admin_notices', [$this, 'display_shipment_creation_notice']);
    }

    function add_admin_order_list_custom_column($columns)
    {
        $reordered_columns = array();

        // Inserting columns to a specific location
        foreach ($columns as $key => $column) {
            $reordered_columns[$key] = $column;

            if ($key == 'order_total') {
                $reordered_columns['shipment'] = esc_html__('Shipment', 'shiperman-for-woocommerce');
            }
        }
        return $reordered_columns;
    }

    public function create_shipment_column_content($column, $post)
    {

        if (is_object($post)) {
            $post_id = $post->get_id();
        } else {
            $post_id = $post;
        }

        if ('shipment' === $column) {
            $shipment_meta = get_post_meta($post_id, '_shiperman_shipment_data', true);

            $create_shipment_url = wp_nonce_url(
                admin_url('admin-post.php?action=create_shipment&order_id=' . $post_id),
                'create_shipment_' . $post_id
            );

            echo '<a href="' . esc_url($create_shipment_url) . '" class="button button-primary">' . esc_html__('Create Shipment', 'shiperman-for-woocommerce') . '</a>';
            if ($shipment_meta) {
                echo '<a href="#" data-order-id="' . esc_attr($post_id) . '" class="button button-secondary view-shipment-btn">' . esc_html__('View Shipment', 'shiperman-for-woocommerce') . '</a>';
            }
        }
    }

    public function handle_create_shipment_action()
    {
        $order_id = isset($_GET['order_id']) ? absint($_GET['order_id']) : 0;
        if (!$order_id || (isset($_REQUEST['_wpnonce']) && !wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['_wpnonce'])), 'create_shipment_' . $order_id))) {
            wp_die(esc_html__('Invalid request.', 'shiperman-for-woocommerce'));
        }

        $order = wc_get_order($order_id);
        if (!$order) {
            wp_die(esc_html__('Order not found.', 'shiperman-for-woocommerce'));
        }
        $logger = new \WC_Logger();
        $log_context = 'Shiperman Debug';

        $items_data = [];
        foreach ($order->get_items() as $item_id => $item) {
            $product = $item->get_product();
            $quantity = $item->get_quantity();

            if ($product) {
                for ($i = 0; $i < $quantity; $i++) {
                    $items_data[] = [
                        'id'          => $product->get_id(),
                        'price'       => (float) $item->get_total() / $quantity, // Divide total price by quantity for individual instances
                        'weight'      => $product->get_weight() ? (float) $product->get_weight() : 0,
                        'length'      => $product->get_length() ? (float) $product->get_length() : 0,
                        'width'       => $product->get_width() ? (float) $product->get_width() : 0,
                        'height'      => $product->get_height() ? (float) $product->get_height() : 0,
                    ];
                }
            }
        }

        $recipient_data = [
            'name'             => $order->get_shipping_first_name() . ' ' . $order->get_shipping_last_name(),
            'phone'            => $order->get_billing_phone(),
            'email'            => $order->get_billing_email(),
            'countryCode'      => $order->get_shipping_country(),
            'country'          => WC()->countries->countries[$order->get_shipping_country()],
            'state'            => $order->get_shipping_state(),
            'city'             => $order->get_shipping_city(),
            'zip'              => $order->get_shipping_postcode(),
            'address'          => $order->get_shipping_address_1(),
            'addressNumber'    => $order->get_shipping_address_2() ?? '', // Use address 2 if available
            'buildingNumber'   => '',
            'entranceNumber'   => '',
            'floorNumber'      => '',
            'apartmentNumber'  => '',
            'deliveryNote'     => $order->get_customer_note() ?? '',
        ];
        $logger->add($log_context, 'Order id ' . esc_html($order_id));
        $logger->add($log_context, 'items data ' . print_r($items_data, true));
        $logger->add($log_context, '$recipient_data ' . print_r($recipient_data, true));
        $body = [
            'items'       => $items_data,
            'paymentType' => 1, // Assuming "1" as payment type
            'referenceId' => 'order_' . $order_id,
            'recipient'   => $recipient_data,
        ];
        $logger->add($log_context, 'Body ' . print_r($body, true));
        $shiperman_api = SMFWC_Shiperman_API::get_instance();

        $response = $shiperman_api->make_authenticated_request('plugin/orders/create-order', 'POST', $body);
        $logger->add($log_context, 'Response ' . print_r($response, true));
        if (isset($response['status']) && $response['status'] === 'error') {
            $error_message = urlencode($response['message']);
            wp_safe_redirect(admin_url("edit.php?post_type=shop_order&shipment_error_message={$error_message}"));
        } elseif (!empty($response['data']) && isset($response['data']['status'])) {
            $shipment_items_data = [];

            foreach ($response['data']['items'] as $item) {
                $shipment_items_data[] = [
                    'price' => $item['price'] ?? '',
                    'weight' => $item['weight'] ?? '',
                    'service_type' => $item['service_type'] ?? '',
                    'item_value' => $item['item_value'] ?? '',
                    'tracking_number' => $item['TrackingNumber'] ?? '',
                    'service' => $item['Service'] ?? '',
                    'carrier' => $item['Carrier'] ?? '',
                    'carrier_tracking_number' => $item['CarrierTrackingNumber'] ?? '',
                    'carrier_tracking_url' => $item['CarrierTrackingUrl'] ?? '',
                    'label_image' => $item['LabelImage'] ?? '',
                ];
            }

            $logger->add($log_context, '$shipment_items_data ' . print_r($shipment_items_data, true));

            $shipment_data = [
                'internal_id' => $response['data']['internalId'] ?? '',
                'reference_id' => $response['data']['referenceId'] ?? '',
                'items' => $shipment_items_data
            ];

            $logger->add($log_context, 'shipment_data ' . print_r($shipment_data, true));

            update_post_meta($order_id, '_shiperman_shipment_data', $shipment_data);

            wp_safe_redirect(admin_url('edit.php?post_type=shop_order&shipment_created=' . $order_id));
        } else {
            wp_safe_redirect(admin_url('edit.php?post_type=shop_order&shipment_failed=' . $order_id));
        }
        exit;
    }

    public function display_shipment_creation_notice()
    {
        if (isset($_GET['shipment_created'])) {
            $order_id = intval($_GET['shipment_created']);

            echo '<div class="notice notice-success is-dismissible"><p>' .
                sprintf(
                    /* translators: %d is the order ID */
                    esc_html__('Shipment created for Order #%d.', 'shiperman-for-woocommerce'),
                    esc_html($order_id)
                ) .
                '</p></div>';
        }

        if (isset($_GET['shipment_failed'])) {
            echo '<div class="notice notice-error is-dismissible"><p>' .
                esc_html__('Failed to create shipment. Please try again.', 'shiperman-for-woocommerce') .
                '</p></div>';
        }

        if (isset($_GET['shipment_error_message'])) {
            $error_message = filter_input(INPUT_GET, 'shipment_error_message', FILTER_SANITIZE_STRING);
            $error_message = urldecode($error_message);

            echo '<div class="notice notice-error is-dismissible"><p>' .
                /* translators: %d is the order ID */
                sprintf(esc_html__('Shipment creation error: %s', 'shiperman-for-woocommerce'), esc_html($error_message)) .
                '</p></div>';
        }
    }
}
