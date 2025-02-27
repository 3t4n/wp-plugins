<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Forms\GetForms;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetFormsFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['formId', 'webformId', 'name', 'href', 'hasVariants', 'scriptUrl', 'status', 'createdOn', 'statistics', 'campaign'];
    }
}
