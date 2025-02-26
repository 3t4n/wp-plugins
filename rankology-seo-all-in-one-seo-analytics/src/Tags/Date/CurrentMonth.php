<?php

namespace Rankology\Tags\Date;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Models\GetTagValue;

class CurrentMonth implements GetTagValue {
    const NAME = 'currentmonth';

    public static function getDescription() {
        return __('Current Month', 'wp-rankology');
    }

    public function getValue($args = null) {
        return date_i18n('F');
    }
}
