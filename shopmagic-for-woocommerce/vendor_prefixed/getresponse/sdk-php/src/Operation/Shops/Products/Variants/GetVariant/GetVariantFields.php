<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Shops\Products\Variants\GetVariant;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetVariantFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['variantId', 'href', 'name', 'url', 'sku', 'price', 'priceTax', 'previousPrice', 'previousPriceTax', 'quantity', 'position', 'barcode', 'externalId', 'description', 'images', 'metaFields', 'taxes', 'createdOn', 'updatedOn'];
    }
}
