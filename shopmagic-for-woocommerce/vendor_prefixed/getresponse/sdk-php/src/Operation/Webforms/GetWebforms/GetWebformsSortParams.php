<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Webforms\GetWebforms;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SortParams;
class GetWebformsSortParams extends SortParams
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['modifiedOn'];
    }
}
