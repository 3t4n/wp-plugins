<?php

namespace ShopMagicVendor\WPDesk\ShowDecision\WooCommerce;

use ShopMagicVendor\WPDesk\ShowDecision\GetStrategy;
class ShippingMethodStrategy extends GetStrategy
{
    public function __construct(string $method_id)
    {
        parent::__construct([['page' => 'wc-settings', 'tab' => 'shipping', 'section' => $method_id]]);
    }
}
