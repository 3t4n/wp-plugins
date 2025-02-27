<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\SearchContacts\GetSearchContacts;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetSearchContactsFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['searchContactId', 'name', 'createdOn', 'href'];
    }
}
