<?php

namespace Ambikly\Models;

use Ambikly\Controllers\CartController;

class Cart extends BaseModel
{

    protected $cart_items = [];

    public function __construct()
    {

    }

    public function prepareCart()
    {
        /**
         * @var $cart CartController
         */
        $cart = ambikly()->getClass('Controllers.CartController');

        $cart_items = $cart->get_cart();

        $cart_items = is_array($cart_items) ? $cart_items : [];

        $this->cart_items = $cart_items;

    }

    public function getCartItems()
    {
        return $this->cart_items;
    }

    public function getCartTotal()
    {
        $cart_total = 0;

        foreach ($this->cart_items as $item_id => $item_data) {
            /**
             * @var $product \Ambikly\Models\Product
             */
            $item_total = $item_data['item_total'] ? $item_data['item_total'] : 0;

            $cart_total += floatval($item_total);
        }
        return $cart_total;
    }

}
