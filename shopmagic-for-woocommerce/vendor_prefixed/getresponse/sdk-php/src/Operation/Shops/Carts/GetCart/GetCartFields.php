<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Shops\Carts\GetCart;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetCartFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['cartId', 'href', 'contactId', 'totalPrice', 'totalTaxPrice', 'currency', 'selectedVariants', 'externalId', 'cartUrl', 'createdOn', 'updatedOn'];
    }
}
