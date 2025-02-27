<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Shops\Products\GetProduct;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetProductFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['productId', 'href', 'name', 'type', 'url', 'vendor', 'externalId', 'categories', 'variants', 'metaFields', 'createdOn', 'updatedOn'];
    }
}
