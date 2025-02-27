<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Imports\GetImports;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetImportsFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['importId', 'campaign', 'status', 'statistics', 'errorStatistics', 'createdOn', 'finishedOn', 'href'];
    }
}
