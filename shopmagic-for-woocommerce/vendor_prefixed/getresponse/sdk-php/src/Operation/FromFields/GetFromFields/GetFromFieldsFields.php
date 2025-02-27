<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\FromFields\GetFromFields;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetFromFieldsFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['fromFieldId', 'href', 'email', 'name', 'isActive', 'isDefault', 'createdOn'];
    }
}
