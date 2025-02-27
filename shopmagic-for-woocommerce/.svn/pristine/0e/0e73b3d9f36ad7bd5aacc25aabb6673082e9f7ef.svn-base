<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Shops\GetShops;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SearchQuery;
class GetShopsSearchQuery extends SearchQuery
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['name'];
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
}
