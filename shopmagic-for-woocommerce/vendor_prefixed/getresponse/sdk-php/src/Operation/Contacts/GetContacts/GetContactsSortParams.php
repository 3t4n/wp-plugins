<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Contacts\GetContacts;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SortParams;
class GetContactsSortParams extends SortParams
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['email', 'name', 'createdOn', 'changedOn', 'campaignId'];
    }
}
