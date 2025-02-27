<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\GdprFields\GetGdprFields;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SortParams;
class GetGdprFieldsSortParams extends SortParams
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['name', 'createdOn'];
    }
}
