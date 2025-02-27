<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Suppressions\GetSuppressions;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetSuppressionsFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['suppressionId', 'name', 'createdOn', 'href'];
    }
}
