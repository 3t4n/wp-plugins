<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Forms\GetForms;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SortParams;
class GetFormsSortParams extends SortParams
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['createdOn', 'name', 'visitors', 'uniqueVisitors', 'subscribed', 'subscriptionRate'];
    }
}
