<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Addresses\GetAddresses;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SortParams;
class GetAddressesSortParams extends SortParams
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['createdOn'];
    }
}
