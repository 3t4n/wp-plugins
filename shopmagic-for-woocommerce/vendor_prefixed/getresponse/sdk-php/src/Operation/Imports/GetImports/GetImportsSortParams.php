<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Imports\GetImports;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SortParams;
class GetImportsSortParams extends SortParams
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['createdOn', 'finishedOn'];
    }
}
