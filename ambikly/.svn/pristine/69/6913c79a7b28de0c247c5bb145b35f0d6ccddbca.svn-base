<?php

namespace Ambikly\Gateways\CashOnDelivery;

use Ambikly\Controllers\OrderController;
use Ambikly\Controllers\PaymentController;
use Ambikly\Gateways\BaseGateway;

class CashOnDelivery extends BaseGateway
{
    public function __construct()
    {
        parent::__construct(self::getID(), self::getTitle());

        add_action('ambikly_payment_gateway_' . self::getID() . '_preview', array($this, 'additional_preview'));
    }

    public static function getID()
    {
        return 'cash_on_delivery';
    }

    public static function getTitle()
    {
        return esc_html__('Cash on delivery', 'ambikly');
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
                'payment_note' => 'COD'
            ]);

        ambikly_order_response(['redirect_url' => ambikly_get_thank_you_page(true), 'message' => esc_html__('Order placed successfully! Redirecting..', 'ambikly')]);

    }

    public function additional_preview()
    {
        $instructions = ambikly_get_option('cash_on_delivery_instructions', '');

        echo '<span>' . esc_html($instructions) . '</span>';

    }
}