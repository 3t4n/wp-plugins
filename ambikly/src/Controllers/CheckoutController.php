<?php

namespace Ambikly\Controllers;


use Ambikly\Models\Cart;
use Ambikly\Repository\CustomerRepository;
use Ambikly\Repository\OrderAddressesRepository;
use Ambikly\Repository\OrderItemsRepository;
use Ambikly\Repository\OrderRepository;

class CheckoutController extends BaseController
{

    private $errors = [];


    /**
     * @var CustomerRepository
     */
    private $customer_repository;


    /**
     * @var OrderRepository
     */
    private $order_repository;


    /**
     * @var OrderItemsRepository
     */
    private $order_items_repository;


    /**
     * @var OrderAddressesRepository
     */
    private $order_addresses_repository;

    /**
     * @var Cart
     */
    private $cart;

    /**
     * @var CartController
     */
    private $cart_controller;

    private $sanitized_data = [];

    private $payment_method = '';


    public function __construct()
    {

        $this->customer_repository = ambikly()->getClass('Repository.CustomerRepository');

        $this->order_repository = Ambikly()->getClass('Repository.OrderRepository');

        $this->order_items_repository = ambikly()->getClass('Repository.OrderItemsRepository');

        $this->order_addresses_repository = Ambikly()->getClass('Repository.OrderAddressesRepository');

        $this->cart = ambikly()->getClass('Models.Cart');

        $this->cart_controller = Ambikly()->getClass('Controllers.CartController');
    }


    public function process($sanitized_data, $payment_method)
    {

        $this->sanitized_data = $sanitized_data;

        $this->payment_method = $payment_method;

        $this->cart->prepareCart();

        do_action('ambikly_before_checkout_process', $sanitized_data, $payment_method, $this);

        $customer_id = $this->process_customer();

        $order_id = 0;

        if ($customer_id) {

            $order_id = $this->process_order($customer_id);

            do_action('ambikly_before_payment_process', $sanitized_data, $payment_method, $this);

            do_action('ambikly_process_' . $this->payment_method . '_payment', $order_id, $payment_method, $sanitized_data, $this);

            $this->cart_controller->clear_cart();
        }

        do_action('ambikly_after_checkout_process', $order_id, $sanitized_data, $payment_method, $this);

        return true;
    }

    private function process_customer()
    {
        $email = $this->sanitized_data['email'] ?? '';

        $customer_id = $this->customer_repository->getCustomerIDByEmail($email);

        if (!ambikly_is_guest_checkout()) {

            $password = $this->sanitized_data['password'] ?? '';

            $new_customer_data = apply_filters(
                'ambikly_new_customer_data',
                array(
                    'user_login' => $email,
                    'user_pass' => $password,
                    'user_email' => $email,
                    'first_name' => $this->sanitized_data['billing_firstname'] ?? '',
                    'last_name' => $this->sanitized_data['billing_lastname'] ?? '',
                    'role' => 'customer',
                )
            );

            $user = get_user_by('email', $email);

            $user_id = !is_wp_error($user) && $user instanceof \WP_User ? $user->ID : 0;


            $user_id = $user_id < 1 ? wp_insert_user($new_customer_data) : $user_id;

        } else {
            $user_id = get_current_user_id();
        }


        $customer_data = [
            'user_id' => $user_id,
            'firstname' => $this->sanitized_data['billing_firstname'] ?? '',
            'lastname' => $this->sanitized_data['billing_lastname'] ?? '',
            'email' => $email,
            'country' => $this->sanitized_data['billing_country'] ?? '',
            'postcode' => $this->sanitized_data['billing_zip'] ?? '',
            'city' => $this->sanitized_data['billing_city'] ?? '',
            'state' => $this->sanitized_data['billing_state'] ?? '',
        ];


        if ($customer_id) {

            $this->customer_repository->save($customer_data, $customer_id);

        } else {

            $customer_id = $this->customer_repository->save($customer_data);

        }
        return $customer_id;
    }

    private function process_order($customer_id = 0)
    {
        $order_data = [
            'customer_id' => $customer_id,
            'total_amount' => $this->cart->getCartTotal(),
            'currency' => ambikly_currency(),
            'order_note' => $this->sanitized_data['order_note'] ?? '',
            'email' => $this->sanitized_data['email'] ?? '',
        ];

        $order_id = $this->order_repository->save($order_data);

        $billing_address_data = [
            'order_id' => $order_id,
            'address_type' => 'billing',
            'firstname' => $this->sanitized_data['billing_firstname'] ?? '',
            'lastname' => $this->sanitized_data['billing_lastname'] ?? '',
            'company' => $this->sanitized_data['billing_company'] ?? '',
            'address_1' => $this->sanitized_data['billing_address'] ?? '',
            'city' => $this->sanitized_data['billing_city'] ?? '',
            'state' => $this->sanitized_data['billing_state'] ?? '',
            'postcode' => $this->sanitized_data['billing_zip'] ?? '',
            'country' => $this->sanitized_data['billing_country'] ?? '',
            'email' => $email ?? ''
        ];

        $this->order_addresses_repository->save($billing_address_data);

        foreach ($this->cart->getCartItems() as $item_id => $cart_item) {

            /**
             * @var $product \Ambikly\Models\Product
             */
            $product = $cart_item['product'] ? $cart_item['product'] : false;
            $quantity = $cart_item['quantity'] ? $cart_item['quantity'] : false;
            $item_price = $cart_item['item_price'] ? $cart_item['item_price'] : false;

            $order_item_data = [
                'order_id' => $order_id,
                'product_id' => $product->getID(),
                'product_name' => $product->getProductName(),
                'quantity' => $quantity,
                'price' => $item_price
            ];

            $this->order_items_repository->save($order_item_data);

        }
        return $order_id;
    }
}
