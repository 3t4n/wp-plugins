<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Shops\GetShops;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetShopsFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['shopId', 'href', 'name', 'locale', 'currency', 'createdOn', 'updatedOn'];
    }
}
