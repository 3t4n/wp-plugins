<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Shops\MetaFields\GetMetaFields;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetMetaFieldsFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['href', 'metaFieldId', 'name', 'value', 'valueType', 'description', 'createdOn', 'updatedOn'];
    }
}
