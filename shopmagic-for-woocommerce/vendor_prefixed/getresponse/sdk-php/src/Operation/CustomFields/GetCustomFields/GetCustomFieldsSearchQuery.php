<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\CustomFields\GetCustomFields;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SearchQuery;
class GetCustomFieldsSearchQuery extends SearchQuery
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
