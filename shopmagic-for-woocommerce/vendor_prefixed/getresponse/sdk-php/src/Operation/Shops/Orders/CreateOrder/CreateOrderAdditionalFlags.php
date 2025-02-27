<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Shops\Orders\CreateOrder;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class CreateOrderAdditionalFlags extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['skipAutomation'];
    }
}
