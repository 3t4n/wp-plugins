<?php

namespace Ambikly\Gateways\PayPal;

use Ambikly\Controllers\OrderController;
use Ambikly\Controllers\PaymentController;
use Ambikly\Gateways\BaseGateway;

class PayPal extends BaseGateway
{

    public function __construct()
    {
        include_once AMBIKLY_ABSPATH . 'src/Gateways/PayPal/functions.php';

        parent::__construct(self::getID(), self::getTitle());

    }

    public static function getID()
    {
        return 'paypal';
    }

    public static function getTitle()
    {
        return esc_html__('PayPal', 'ambikly');
    }

    public function process($order_id, $payment_method, $sanitized_data, $checkout_controller)
    {
        /**
         * @var $payment PaymentController
         */
        $payment = ambikly()->getClass('Controllers.PaymentController');

        /**
         * @var $order OrderController
         */
        $order = ambikly()->getClass('Controllers.OrderController');

        $order_details = $order->getOrderById($order_id);

        $payment_id = $payment->save(
            [
                'order_id' => $order_id,
                'payment_method' => $payment_method,
                'amount' => $order_details['total_amount'] ?? 0,
                'payment_note' => 'STARTED'
            ]);

        $redirect_url = $this->get_request_url($order_id, $payment_id);

        ambikly_order_response(['redirect_url' => $redirect_url, 'message' => esc_html__('Order placed successfully! Redirecting to PayPal...', 'ambikly')]);

    }

    public function paypal_endpoint($ssl_check = false)
    {
        if (is_ssl() || !$ssl_check) {

            $protocol = 'https://';
        } else {
            $protocol = 'http://';
        }

        if (ambikly_paypal_is_test_mode()) {

            $paypal_uri = $protocol . 'sandbox.paypal.com/cgi-bin/webscr';
        } else {
            $paypal_uri = $protocol . 'paypal.com/cgi-bin/webscr';
        }

        return $paypal_uri;
    }

    public function get_request_url($booking_id, $payment_id)
    {

        $args = $this->get_paypal_args($booking_id, $payment_id);

        $redirect_uri = esc_url(home_url('/'));

        if ($args) {

            $paypal_args = http_build_query($args, '', '&');

            $redirect_uri = esc_url($this->paypal_endpoint()) . '?' . $paypal_args;
        }

        return $redirect_uri;
    }

    protected function limit_length($string, $limit = 127)
    {
        $str_limit = $limit - 3;

        if (function_exists('mb_strimwidth')) {
            if (mb_strlen($string) > $limit) {
                $string = mb_strimwidth($string, 0, $str_limit) . '...';
            }
        } else {
            if (strlen($string) > $limit) {
                $string = substr($string, 0, $str_limit) . '...';
            }
        }
        return $string;
    }

    private function get_paypal_args($order_id, $payment_id)
    {
        $paypal_email = ambikly_get_option(self::getID() . '_email');

        if ('' == $paypal_email || empty($paypal_email)) {

            ambikly_order_response(['order_status' => 'failed', 'message' => [[esc_html__('Alert: PayPal email not set up. Please contact site administrator.', 'ambikly')]]]);

            exit;
        }
        /**
         * @var $order OrderController
         */
        $order = ambikly()->getClass('Controllers.OrderController');

        $order_details = $order->getOrderById($order_id);

        $order_items = $order->getOrderItemsByOrderId($order_id);

        $order_items = is_array($order_items) ? $order_items : [];

        $currency_code = $order_details['currency_code'] ?? ambikly_currency();

        $amount = $order_details['total_amount'] ?? 0;

        $thank_you_page = home_url();

        $cancel_page_url = home_url();

        $args['cmd'] = '_cart';
        $args['upload'] = '1';
        $args['currency_code'] = $currency_code;
        $args['business'] = $paypal_email;
        $args['bn'] = '';
        $args['rm'] = '2';
        $args['discount_amount_cart'] = 0;
        $args['tax_cart'] = 0;
        $args['charset'] = get_bloginfo('charset');
        $args['cbt'] = get_bloginfo('name');
        $args['return'] = add_query_arg(
            array(
                'order_id' => $order_id,
                'ordered' => true,
                'status' => 'success',
            ),
            $thank_you_page
        );
        $args['cancel'] = add_query_arg(
            array(
                'order_id' => $order_id,
                'ordered' => true,
                'status' => 'cancel',
            ),
            $cancel_page_url
        );
        $args['handling'] = 0;
        $args['handling_cart'] = 0;
        $args['no_shipping'] = 0;
        $args['notify_url'] = esc_url(get_rest_url(null, 'ambikly/v1/paypal/ipn'));
        $args['amount'] = $amount;

        $args_index = 1;

        foreach ($order_items as $item) {

            $item_name = $item['product_name'] ?? '';

            $args['item_name_' . $args_index] = $this->limit_length($item_name, 127);

            $args['quantity_' . $args_index] = $item['quantity'] ?? 1;

            $args['amount_' . $args_index] = $item['price'] ?? 0;

            $args['item_number_' . $args_index] = $item['ID'] ?? 0;

            $args['on2_' . $args_index] = esc_html__('Total Price', 'ambikly');

            $args['os2_' . $args_index] = $amount;

            $args_index++;
        }


        $args['option_index_0'] = ($args_index-1);

        $order_code = $order_details['order_code'] ?? '';

        $args['custom'] = json_encode(array('order_id' => $order_id, 'order_code' => $order_code, 'payment_id' => $payment_id));

        return apply_filters('ambikly_paypal_args', $args);
    }
}