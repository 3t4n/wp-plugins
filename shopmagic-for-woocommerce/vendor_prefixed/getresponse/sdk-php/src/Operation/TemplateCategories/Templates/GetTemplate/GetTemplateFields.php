<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\TemplateCategories\Templates\GetTemplate;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetTemplateFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['templateId', 'href', 'isFavourite', 'category', 'colorVariants'];
    }
}
