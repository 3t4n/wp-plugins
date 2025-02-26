<?php

namespace Ambikly;
class Constants
{
    const SETTING_PREFIX = 'ambikly_';

    const AMBIKLY_PRODUCT_TYPE = 'product';

    const AMBIKLY_CATEGORY_TYPE = 'category';

    public static function getProductBase()
    {
        return 'products';
    }

    public static function getCategoryBase()
    {
        return 'categories';
    }


}