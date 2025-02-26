<?php

namespace Rankology\Tags;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Models\GetTagValue;

class SiteTagline implements GetTagValue {
    const NAME = 'tagline';

    const ALIAS = ['sitedesc'];

    /**
     * 4.8.0.
     *
     * @return string
     */
    public static function getDescription() {
        return __('Site Tagline', 'wp-rankology');
    }

    public function getValue($args = null) {
        return get_bloginfo('description');
    }
}
