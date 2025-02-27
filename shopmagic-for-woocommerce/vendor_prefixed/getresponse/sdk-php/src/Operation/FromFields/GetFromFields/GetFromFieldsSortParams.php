<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\FromFields\GetFromFields;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SortParams;
class GetFromFieldsSortParams extends SortParams
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['createdOn'];
    }
}
