<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\PredefinedFields\GetPredefinedFields;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SortParams;
class GetPredefinedFieldsSortParams extends SortParams
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['name'];
    }
}
