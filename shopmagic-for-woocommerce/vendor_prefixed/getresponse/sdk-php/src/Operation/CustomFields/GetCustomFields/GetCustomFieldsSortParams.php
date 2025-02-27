<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\CustomFields\GetCustomFields;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SortParams;
class GetCustomFieldsSortParams extends SortParams
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['name'];
    }
}
