<?php
// Exit if accessed directly.

if (!defined('ABSPATH')) {
    exit;
}

require_once(ABSPATH . 'wp-admin/includes/plugin.php');
require_once(plugin_dir_path(__DIR__) . 'vendor/feexpay/feexpay-php/src/Feexpay.php');
require_once(plugin_dir_path(__DIR__) . 'vendor/feexpay/feexpay-php/src/Constants.php');
require_once(plugin_dir_path(__DIR__) . 'vendor/feexpay/feexpay-php/src/Status.php');


class WC_FeexPay_Gateway extends WC_Payment_Gateway
{
    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    public function __construct()
    {
        $this->id = 'feexpay_woocommerce_plugin';
        $this->icon = plugins_url('../assets/img/feexpay_logo.png', __FILE__);
        $this->has_fields = false;
        $this->title = array_key_exists('title', $this->settings) ? $this->settings['title']: '';
        $this->method_title = 'FeexPay';
        $this->method_description = array_key_exists('description', $this->settings) ? $this->settings['description']: '';

        $this->init_form_fields();

        $this->init_settings();

        $this->feexpay_config = array();


        foreach ($this->settings as $setting_key => $value) {
            $this->$setting_key = $value;
            $this->feexpay_config[$setting_key] = $value;
        }

        $this->testmode = 'yes' === $this->testmode;
        $this->feexpay_config['key'] = $this->token;
        $this->feexpay_config['key'] = $this->shop;
        $this->feexpay_config['currency'] = get_woocommerce_currency();

        $this->feexpay = new Feexpay\FeexpayClass($this->token, $this->shop, $sandbox=true);

        $this->import_feexpay();
        // add_action('admin_notices', array($this, 'do_ssl_check'));
        add_action('woocommerce_receipt_' . $this->id, array($this, 'receipt_page'));
        add_action('woocommerce_api_' . strtolower(get_class($this)), array($this, 'on_feexpay_back'));

        if (is_admin()) {
            add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
            $this->import_admin_scripts();
        }


        if (!$this->is_valid_for_use()) {
            $this->enabled = false;
        }
    }

    /**
     * Initialise Gateway Settings Form Fields.
     */
    public function init_form_fields()
    {
        $this->form_fields = include plugin_dir_path(__DIR__) . '/admin/feexpay-settings.php';
    }

    public function import_feexpay()
    {
        $filename = 'wp-feexpay.php';
        $path = plugin_dir_path(__DIR__) . $filename;

//        wp_register_style('custom-feexpay-style', plugins_url('../assets/css/style.css', __FILE__));
//        wp_enqueue_style('custom-feexpay-style');
        wp_enqueue_script('setup-feexpay-script', 'https://api.feexpay.me/feexpay-javascript-sdk/wordpress.js');
//        wp_enqueue_script('setup-feexpay-script', 'https://api.feexpay.me/feexpay-javascript-sdk/wordpress-dev.js', [], true);
//        wp_enqueue_script('setup-feexpay-script', plugins_url('../assets/js/checkout.js', __FILE__));
        wp_register_script('init-feexpay-script', plugins_url('../assets/js/invoke.js', __FILE__), ['setup-feexpay-script']);

        if ($this->testmode == 'yes') {
            $sandbox = true;
        } else {
            $sandbox = false;
        }
    }

    public function import_admin_scripts()
    {
//        wp_enqueue_script('jscolor', plugins_url('../assets/js/jscolor.js', __FILE__), [], 'v1', true);
//        wp_enqueue_script('setup-admin-script', plugins_url('../assets/js/admin.js', __FILE__), [], 'v1', true);
    }

    /**
     * Check if this gateway is enabled and can work with user currency.
     */
    public function is_valid_for_use()
    {
        //verify currency
        $currency = get_woocommerce_currency();

        $allowed_currency = array('XOF', 'XAF', 'CHF', 'USD', 'EUR');

        if (!in_array($currency, $allowed_currency)) {
            $this->msg = __('feexpay does not support your store currency '. $currency .'. Kindly set it to XOF (FCFA)', 'feexpay') . '<a href="' . admin_url('admin.php?page=wc-settings&tab=general') . '">here</a>';
            return false;
        }
        return true;
    }


    public function admin_options()
    {
        if (!$this->is_valid_for_use()) {
            echo '<div class="inline error"><p><strong>' . __('Feexpay Payment Gateway Disabled', 'feexpay') . '</strong>: ' .  esc_html($this->msg) . '</p></div>';
        } else {
            echo '<table class="form-table">';
            $this->generate_settings_html();
            echo '</table>';
        }
    }

    public function process_payment($order_id)
    {
        $order = new WC_Order($order_id);

        $this->order_id = $order_id;

        $order->reduce_order_stock();
        return array(
            'result' => 'success',
            'redirect' => $order->get_checkout_payment_url(true)
        );
    }

    /**
     * Checkout receipt page
     *
     * @return void
     */
    public function receipt_page($order)
    {

        $this->feexpay_config['callback'] = $this->get_callback_url($order);



        //TODO: add transaction reason

        $order = wc_get_order($order);
        echo '<p>' . __('Thank you for your order, please click the button below to proceed to payment.', 'feexpay') . '</p>';
        echo '<a class="button cancel" style="display: inline-block;" href="' . esc_url($order->get_cancel_order_url()) . '">';
        echo __('Annuler', 'feexpay') . '</a> <button class="button alt wc-forward" id="feexpay-button-init">' . __('Payer', 'feexpay') . '</button> <div id="render" style="width: fit-content; display: inline-block;"></div>';
        echo '';
        echo '';


        if (version_compare(WOOCOMMERCE_VERSION, '2.7.0', '>=')) {
            $this->feexpay_config['amount'] = $order->get_total();
            $this->feexpay_config['phone'] = $order->get_billing_phone();
            $this->feexpay_config['email'] = $order->get_billing_email();
            $this->feexpay_config['name'] = $order->get_formatted_billing_full_name();
        } else {
            $this->feexpay_config['amount'] = $order->order_total;
            $this->feexpay_config['phone'] = $order->billing_phone;
            $this->feexpay_config['email'] = $order->billing_email;
            $this->feexpay_config['name'] = $order->billing_first_name . ' ' . $order->billing_last_name;
        }


        $this->request_feexpay_payment($this->feexpay_config);
    }

    public function get_callback_url($order_id)
    {
        return home_url('/') . '?wc-api=' . get_class($this) . '&state=' . $order_id . '&ref=';
    }

    public function request_feexpay_payment($data)
    {
        wp_enqueue_script('init-feexpay-script');
        wp_localize_script('init-feexpay-script', 'inputs', $data);
    }

    public function on_feexpay_back()
    {
        global $woocommerce;
        $order_id = sanitize_text_field($_GET["state"]);
        $order = wc_get_order($order_id);

        if (isset($_GET['ref']) && isset($_GET['state'])) {
            $response = $this->feexpay->verifyTransaction(sanitize_text_field($_GET['ref']));

            if (($response->status == Status\STATUS::SUCCESS || $response->status == Status\STATUS::SUCCESSFUL)) {
//            if (($response->status == Status\STATUS::SUCCESS || $response->status == Status\STATUS::SUCCESSFUL) && $response->amount >= $order->get_total()) {
                $order->update_status('completed');
                $order->add_order_note(__('Payment was successful on feexpay', 'feexpay'));
                $order->add_order_note('feexpay transaction reference: ' . sanitize_text_field($_GET['ref']));
                $customer_note = __('Thank you for your order.<br>', 'feexpay');
                $customer_note .= __('Your payment was successful, we are now <strong>processing</strong> your order.', 'feexpay');
                $order->add_order_note($customer_note, 1);
                wc_add_notice($customer_note, 'notice');
                $woocommerce->cart->empty_cart();
                wp_redirect($this->get_return_url($order));
            } else if ($response->status == Status\STATUS::PENDING || $response->status == Status\STATUS::IN_PENDING) {
                $order->update_status('on-hold');
                $order->update_status('pending');
                $customer_note = __('Thank you for your order.<br>', 'feexpay');
                $customer_note .= __('Your payment has not been confirmed yet, so we have to put your order <strong>on-hold</strong> ', 'feexpay');
                $customer_note .= __('If this persists, Please, contact us for information regarding this order.', 'feexpay');
                $order->add_order_note($customer_note, 1);
                wc_add_notice($customer_note, 'notice');
                $woocommerce->cart->empty_cart();
                wp_redirect($this->get_return_url($order));
            }
            elseif ($response->status == Status\STATUS::FAILED) {
                $this->handlePaymentFailed($order);
            }
            else if ($response->amount < $order->get_total()) {
                $order->update_status('on-hold');
                $order->update_status('pending');
                $customer_note = __('Thank you for your order.<br>', 'feexpay');
                $customer_note .= __('Your payment has not been confirmed yet, so we have to put your order <strong>on-hold</strong> ', 'feexpay');
                $customer_note .= __('If this persists, Please, contact us for information regarding this order.', 'feexpay');
                $admin_note = __('Attention: New order has been placed on hold because of incorrect payment amount or currency. Please, look into it. <br>', 'feexpay');
                $admin_note .= __('Amount paid: ' . $order->get_currency() . ' ' . $response->amount . ' <br> Order amount: ' . $order->get_order_currency() . ' ' . $order->order_total . ' <br> Reference: ' . sanitize_text_field($_GET['ref']), 'feexpay');
                $order->add_order_note($customer_note, 1);
                $order->add_order_note($admin_note);
                wc_add_notice($customer_note, 'notice');
                $woocommerce->cart->empty_cart();
                wp_redirect($this->get_return_url($order));
            }
            else {
                $this->handlePaymentFailed($order);
            }
        } else {
            $this->handlePaymentFailed($order);
        }
    }

    public function handlePaymentFailed($order)
    {
        $order->update_status('failed');
        $order->add_order_note(__('The order payment failed on Feexpay', 'feexpay'));
        $customer_note = __('Your payment <strong>failed</strong>. ', 'feexpay');
        $customer_note .= __('Please, try funding your account.', 'feexpay');
        $order->add_order_note($customer_note, 1);
        wc_add_notice($customer_note, 'notice');

        $url = wc_get_checkout_url();
        wp_redirect($url);
    }


    // Check if we are forcing SSL on checkout pages
    // public function do_ssl_check()
    // {
    //     if ($this->enabled == "yes") {
    //         if (get_option('woocommerce_force_ssl_checkout') == "no") {
    //             echo "<div class=\"error\"><p>" . sprintf(__("<strong>%s</strong> is enabled and WooCommerce is not forcing the SSL certificate on your checkout page. Please check your SSL certificate and that you are <a href=\"%s\">forcing the checkout pages to be secured.</a>", 'feexpay'), $this->method_title, admin_url('admin.php?page=wc-settings&tab=checkout')) . "</p></div>";
    //         }
    //     }
    // }
}
