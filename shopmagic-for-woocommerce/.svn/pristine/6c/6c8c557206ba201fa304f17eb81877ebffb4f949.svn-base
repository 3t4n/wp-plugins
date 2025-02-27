<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\SearchContacts\GetSearchContacts;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\DateRangeSearch;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SearchQuery;
class GetSearchContactsSearchQuery extends SearchQuery
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['name', 'createdOn'];
    }
    /**
     * @param string $name
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function whereName($name)
    {
        return $this->set('name', $name);
    }
    /**
     * @param DateRangeSearch $createdOn
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function whereCreatedOn(DateRangeSearch $createdOn)
    {
        return $this->set('createdOn', $createdOn->toArray());
    }
}
