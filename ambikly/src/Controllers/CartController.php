<?php

namespace Ambikly\Controllers;

use Ambikly\Models\Product;
use Ambikly\Session;

class CartController extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = new Session();
        $this->session->init();

        // Initialize the cart if not already present under 'cart' in the session
        if (!$this->session->get('cart')) {
            $this->session->set('cart', []);
        }
    }

    public function add_to_cart($product_id, $quantity = 1)
    {
        if ($product_id < 1 || $quantity < 1) {
            return false;
        }

        /**
         * @var $product Product
         */
        $product = ambikly()->getClass('Models.Product');
        $product = $product->setProduct($product_id, 'ID');

        $cart = $this->session->get('cart', []);
        $cart[$product_id] = [
            'quantity' => $quantity,
            'product' => $product,
            'item_total' => (absint($quantity) * floatval($product->getFinalPrice())),
            'item_price' => $product->getFinalPrice()
        ];

        $this->session->set('cart', $cart);

        return true;
    }

    public function remove_from_cart($product_id)
    {
        $cart = $this->session->get('cart', []);
        unset($cart[$product_id]);
        $this->session->set('cart', $cart);
    }

    public function update_cart($product_id, $quantity)
    {
        if ($quantity <= 0) {
            $this->remove_from_cart($product_id);
        } else {
            /**
             * @var $product Product
             */
            $product = ambikly()->getClass('Models.Product');
            $product = $product->setProduct($product_id, 'ID');

            $cart = $this->session->get('cart', []);
            $cart[$product_id] = [
                'quantity' => $quantity,
                'product' => $product,
                'item_total' => (absint($quantity) * floatval($product->getFinalPrice())),
                'item_price' => $product->getFinalPrice()
            ];

            $this->session->set('cart', $cart);
        }

        return true;
    }

    public function get_cart()
    {
        return $this->session->get('cart', []);
    }

    public function clear_cart()
    {
        $this->session->set('cart', []);
    }
}
