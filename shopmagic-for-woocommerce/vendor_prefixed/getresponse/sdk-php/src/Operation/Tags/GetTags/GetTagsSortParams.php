<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Tags\GetTags;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SortParams;
class GetTagsSortParams extends SortParams
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['createdAt'];
    }
}
