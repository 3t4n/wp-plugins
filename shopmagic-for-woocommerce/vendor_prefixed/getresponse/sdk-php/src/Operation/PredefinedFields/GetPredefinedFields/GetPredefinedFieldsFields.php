<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\PredefinedFields\GetPredefinedFields;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetPredefinedFieldsFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['predefinedFieldId', 'href', 'name', 'value', 'campaign'];
    }
}
