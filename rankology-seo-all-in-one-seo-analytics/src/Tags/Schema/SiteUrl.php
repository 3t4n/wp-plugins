<?php

namespace Rankology\Tags\Schema;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Models\GetTagValue;

class SiteUrl implements GetTagValue {
    const NAME = 'siteurl';

    public static function getDescription() {
        return __('Site URL', 'wp-rankology');
    }

    public function getValue($args = null) {
        $value = site_url();

        return apply_filters('rankology_get_tag_site_url_value', $value);
    }
}
