<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\CustomEvents\GetCustomEvents;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SortParams;
class GetCustomEventsSortParams extends SortParams
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['name'];
    }
}
