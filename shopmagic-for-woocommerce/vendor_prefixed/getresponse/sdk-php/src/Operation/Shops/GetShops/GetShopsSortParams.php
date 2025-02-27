<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Shops\GetShops;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SortParams;
class GetShopsSortParams extends SortParams
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['name', 'createdOn'];
    }
}
