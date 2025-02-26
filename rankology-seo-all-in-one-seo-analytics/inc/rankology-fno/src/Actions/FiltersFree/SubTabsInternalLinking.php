<?php

namespace RankologyFno\Actions\FiltersFree;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Core\Hooks\ExecuteHooks;

class SubTabsInternalLinking implements ExecuteHooks {
    public function hooks() {
        add_filter('rankology_active_internal_linking', '__return_true');
    }
}
