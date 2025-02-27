<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\SearchContacts\GetSearchContacts;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SortParams;
class GetSearchContactsSortParams extends SortParams
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['name', 'createdOn'];
    }
}
