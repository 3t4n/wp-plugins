<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Tags\GetTags;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\DateRangeSearch;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SearchQuery;
class GetTagsSearchQuery extends SearchQuery
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['name', 'createdAt'];
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
     * @param DateRangeSearch $createdAt
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function whereCreatedAt(DateRangeSearch $createdAt)
    {
        return $this->set('createdAt', $createdAt->toArray());
    }
}
