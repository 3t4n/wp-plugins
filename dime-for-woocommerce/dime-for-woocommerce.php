<?php

/**
 * Plugin Name: Dime for WooCommerce
 * Description: Allows payment with Dime
 * Version: 1.0.0
 * License: GPL-2.0+
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: dime-for-woocommerce
 */

 use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;
 use Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry;
 // Prevent directly accessing this file
 if (!defined('ABSPATH')) {
    exit;
}

add_action('woocommerce_blocks_loaded', 'dime_payment_gateway_block_support');
function dime_payment_gateway_block_support() 
{
    require_once __DIR__ . '/includes/class-wc-dime-payment-gateway-blocks-support.php';

    add_action(
        'woocommerce_blocks_payment_method_type_registration',
        function( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) 
        {
			$payment_method_registry->register( new WC_Dime_Payment_Gateway_Blocks_Support );
		}
    );
}

function dime_payment_styles() {
    wp_enqueue_style('dime-payment-styles', plugins_url('dime-for-woocommerce.css', __FILE__), array(), '1.0.0');
}

add_action('wp_enqueue_scripts', 'dime_payment_styles');

function add_to_dime_payment_gateway($gateways) {
    $gateways[] = 'WC_Dime_Pay_Gateway';
    return $gateways;
}

function enqueue_custom_admin_script($hook) {
    if ($hook != 'woocommerce_page_wc-settings') {
        return;
    }
    wp_enqueue_script('custom-admin-script', plugin_dir_url(__FILE__) . 'scripts/settings.js', array('jquery'), '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_script');

function dime_payment_init() {
    if (!class_exists('WC_Payment_Gateway')) {
        exit;
    }

    class WC_Dime_Pay_Gateway extends WC_Payment_Gateway {
        public function __construct() {
            $this->id = 'dime_payment';
            $this->icon = plugins_url('images/DimeFullLogo-dark.png', __FILE__); 
            $this->has_fields = false;
            $this->method_title = __('Dime Payment', 'dime-for-woocommerce');
            $this->method_description = __('Dime payment systems.', 'dime-for-woocommerce');
            $this->title = $this->get_option('title');
            $this->description = $this->get_option('description');
            $this->init_form_fields();
            $this->init_settings();

            add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
            add_action('woocommerce_api_wc_dime_pay_gateway', array($this, 'handle_callback'));
        }
        
        // settings page for the plugin
        public function init_form_fields() {
            $this->form_fields = apply_filters('woo_dime_pay_fields', array(
                'enabled' => array(
                    'title' => __('Enable/Disable', 'dime-for-woocommerce'),
                    'type' => 'checkbox',
                    'label' => __('Enable or Disable', 'dime-for-woocommerce'),
                    'default' => 'no',
                    'sanitize_callback' => 'wc_bool_to_string',
                ),
                'title' => array(
                    'title' => __('Title', 'dime-for-woocommerce'),
                    'type' => 'text',
                    'default' => __('Dime Payment Gateway', 'dime-for-woocommerce'),
                    'desc_tip' => true,
                    'description' => __('Add a new title for the Dime Payment Gateway that customers will see when they are in the checkout page.', 'dime-for-woocommerce'),
                    'sanitize_callback' => 'sanitize_text_field'
                ),
                'description' => array(
                    'title' => __('Description', 'dime-for-woocommerce'),
                    'type' => 'textarea',
                    'default' => __('Please remit your payment to the shop to allow for the delivery to be made', 'dime-for-woocommerce'),
                    'desc_tip' => true,
                    'description' => __('Add a new title for the Dime Payment Gateway that customers will see when they are in the checkout page.', 'dime-for-woocommerce'),
                    'sanitize_callback' => 'sanitize_textarea_field'
                ),
                'instructions' => array(
                    'title' => __('Instructions', 'dime-for-woocommerce'),
                    'type' => 'textarea',
                    'default' => __('Default instructions', 'dime-for-woocommerce'),
                    'desc_tip' => true,
                    'description' => __('Instructions that will be added to the thank you page and order email', 'dime-for-woocommerce'),
                    'sanitize_callback' => 'sanitize_textarea_field'
                ),
                'environment' => array(
                    'title'       => __('Environment', 'dime-for-woocommerce'),
                    'type'        => 'select',
                    'description' => __('Select the environment for API requests.', 'dime-for-woocommerce'),
                    'default'     => 'production',
                    'options'     => array(
                        'production'  => __('Production', 'dime-for-woocommerce'),
                        'staging'     => __('Staging', 'dime-for-woocommerce'),
                        'development' => __('Development', 'dime-for-woocommerce'),
                    ),
                    'desc_tip'    => true,
                ),
                'api_url' => array(
                    'title'       => __('API URL', 'dime-for-woocommerce'),
                    'type'        => 'text',
                    'description' => __('Enter the API URL for the payment gateway.', 'dime-for-woocommerce'),
                    'default'     => '',
                    'desc_tip'    => true,
                    'class'       => 'api-url-field',
                    'sanitize_callback' => 'sanitize_text_field',
                    'custom_attributes' => array('readonly' => 'readonly'),
                ),
                'secret_key' => array(
                    'title' => __('Secret Key', 'dime-for-woocommerce'),
                    'type' => 'password',
                    'desc_tip' => true,
                    'description' => __('Enter the secret key used to validate webhook requests.', 'dime-for-woocommerce'),
                    'sanitize_callback' => 'sanitize_text_field'
                ),
                ));
        }

        // called when user clicks place order button
        public function process_payment($order_id) {
            $response = $this->send_payment_request_to_api($order_id);

            if ($response['status'] == 'fail') {
                wc_add_notice('There was an error with your payment.', 'error');
            } else {
                return array(
                    'result'   => 'success',
                    'redirect' => $response['message']
                );
            }
        }

        // can manipulate order status from here
        // endpoint expects a secret key

        // Webhook processing doesn't use nonce verification due to its nature
        // Security is ensured through secret key validation and other methods.

        public function handle_callback() {
            $secret_key = $this->get_option('secret_key');
            $received_secret_key = '';

            if (isset($_GET['secret_key'])) {
                $received_secret_key = sanitize_text_field(wp_unslash($_GET['secret_key']));
            }

            // Validate the received secret key
            if ($received_secret_key !== $secret_key) {
                wp_die('There was an error', 'Key error', array('response' => 403));
            }

            $order_id = '';

            if (isset($_GET['order_id'])) {
                $order_id = sanitize_text_field(wp_unslash($_GET['order_id']));
            }

            $order = wc_get_order($order_id);

            if ($order) {
                // prevents status change if not pending
                if ($order->get_status() !== 'pending') {
                    wp_die('Order already completed', 'Order status error', array('response' => 400));
                }

                // Verify the payment status with the external service
                $payment_status = '';

                if (isset($_GET['payment_status'])) {
                    $payment_status = sanitize_text_field(wp_unslash($_GET['payment_status']));
                }

                if ($payment_status == 'success') {
                            $order->update_status('completed', __('Payment received.', 'dime-for-woocommerce'));
                            wc_reduce_stock_levels($order_id);
                        } else {
                            $order->update_status('failed', __('Payment failed.', 'dime-for-woocommerce'));
                        }
                } else {
                    wp_die('Order not found', 'Order not found', array('response' => 404));
                }
                exit;
        }

        // this handles calling our endpoint
        // should return a url
        private function send_payment_request_to_api($order_id) {
            $order = wc_get_order($order_id);
            $amount = $order->get_total();
            $currency = $order->get_currency();
            $customer_email = $order->get_billing_email();
            $order_key = $order->get_order_key();
            $order_first_name = $order->get_shipping_first_name();
            $order_last_name = $order->get_shipping_last_name();
            $order_item = $order->get_items();
            $shipping_total = $order->get_shipping_total();
            $shipping_tax = $order->get_shipping_tax();
            $shipping_method = $order->get_shipping_method();
            $total_tax = $order->get_total_tax();
            $items = $order->get_items();
            $items_data = [];
            $counter = 0;

            foreach ($items as $item_id => $item) {
                $counter++;
                $product = $item->get_product();
                $product_name = $item->get_name();
                $product_id = $item->get_product_id();
                $quantity = $item->get_quantity();
                $subtotal = $item->get_subtotal();
                $total = $item->get_total() / $quantity;
                $sku = $item->get_product()->get_sku();
                $product_image = wp_get_attachment_url($product->get_image_id());
                $product_description = $product->get_description();

                $items_data[] = [
                    'product_name' => $product_name,
                    'product_description' => $product_description,
                    'product_image' => $product_image,
                    'product_id' => $product_id,
                    'quantity' => $quantity,
                    'subtotal' => $subtotal,
                    'total' => $total,
                    'sku' => $sku
                ];
            }

            // Calculate Subtotal
            $_subtotal = 0;
            foreach ($order->get_items() as $item_id => $item) {
                $product = $item->get_product();
                $price = $product->get_price();
                $quantity = $item->get_quantity();
                $_subtotal += $price * $quantity;
            }

            $return_url = $this->get_return_url($order);

            $api_url = $this->get_option('api_url');

            $args = array(
                'body' => wp_json_encode(array(
                    'secret_key' => $this->get_option('secret_key'),
                    'order_id' => $order_id,
                    'currency' => $currency,
                    'customer_email' => $customer_email,
                    'order_key' => $order_key,
                    'first_name' => $order_first_name,
                    'last_name' => $order_last_name,
                    'order_items' => $items_data,
                    'shipping_total' => $shipping_total,
                    'shipping_tax' => $shipping_tax,
                    'shipping_method' => $shipping_method,
                    'total_tax' => $total_tax,
                    'return_url' => $return_url,
                    'subtotal' => strval($_subtotal),
                    'origin_type' => 'ECOMMERCE_PLUGIN',
                    'total' => $amount
                )),
                'headers' => array(
                    'Content-Type' => 'application/json',
                ),
                'timeout' => 60
            );

            $response = wp_remote_post($api_url, $args);
            
            $body = json_decode(wp_remote_retrieve_body($response), true);
            
            if (isset($body['body']['response']['order_url'])) {
                return array('status' => 'success', 'message' => $body['body']['response']['order_url']);
            } else {
                return array('status' => 'fail', 'message' => $body['status']);
            }
        }
    }
}

// Add custom payment gateway class to WooCommerce
add_filter('woocommerce_payment_gateways', 'add_to_dime_payment_gateway');

// Initialize the custom payment gateway class
add_action('plugins_loaded', 'dime_payment_init');