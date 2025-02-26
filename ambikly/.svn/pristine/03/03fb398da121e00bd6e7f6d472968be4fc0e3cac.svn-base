<?php

namespace Ambikly\Hooks;

use Ambikly\Controllers\OrderController;
use Ambikly\Controllers\PaymentController;

class AccountHook
{
    public function __construct()
    {
        add_action('ambikly_account_content_dashboard', array($this, 'dashboard'));
        add_action('ambikly_account_content_orders', array($this, 'orders'));
        add_action('ambikly_account_content_payments', array($this, 'payments'));

    }

    public function dashboard()
    {

        $user = wp_get_current_user();

        ambikly_get_template('account.parts.dashboard', [
            'display_name' => $user->display_name,
        ]);
    }

    public function orders()
    {
        $user_id = get_current_user_id();

        /**
         * @var $order_controller OrderController
         */
        $order_controller = ambikly()->getClass('Controllers.OrderController');

        $orders = $order_controller->getOrdersByUserId($user_id);

        ambikly_get_template('account.parts.orders', ['orders' => $orders]);
    }

    public function payments()
    {
        $user_id = get_current_user_id();

        /**
         * @var $payment_controller PaymentController
         */
        $payment_controller = ambikly()->getClass('Controllers.PaymentController');

        $payments = $payment_controller->getPaymentsByUserId($user_id);

        ambikly_get_template('account.parts.payments', ['payments' => $payments]);
    }

}