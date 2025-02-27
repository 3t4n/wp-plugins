<?php

if (!defined('ABSPATH')) {
    exit;
}

define('REVI_API_URL', 'https://api.revi.io/api/v2/');
define('REVI_WIDGETS_URL', 'https://widgets.revi.io/');
define('REVI_UGC_URL', 'https://ugc.revi.io/');
define('REVI_SUPPORT_URL', 'https://support.revi.io/');


if (function_exists('icl_object_id')) {
    define('REVI_PLUGIN_LANGUAGE', 'wpml');
} else if (function_exists('pll_count_posts')) {
    define('REVI_PLUGIN_LANGUAGE', 'polylang');
} else {
    define('REVI_PLUGIN_LANGUAGE', '');
}

const PRODUCT_EAN = array(
    'EAN-13',
    'EAN13',
    'EAN',
    'ean',
    'EANCode',
    '_amazon_product_id',
    '_wpm_gtin_code',
    '_alg_ean',
    '_wpfm_product_ean',
);

const PRODUCT_BRAND = array(
    'brand',
    'BRAND',
    'manufacturer',
    'Fabricante',
    'MARCA',
    'MARCAS',
    'marca',
    'pwb-brand',
    'gla_attributes[brand]',
    '_wpfm_product_brand',
);


if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    define('WOOCOMMERCE_ACTIVE', true);
} else {
    define('WOOCOMMERCE_ACTIVE', false);
}
