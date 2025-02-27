<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\TemplateCategories\GetTemplateCategories;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetTemplateCategoriesFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['categoryId', 'name', 'templates', 'type'];
    }
}
