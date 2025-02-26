<?php

namespace RankologyFno\Actions\FiltersFree;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Core\Hooks\ExecuteHooks;

class SubTabsInspectUrl implements ExecuteHooks {
    public function hooks() {
        add_filter('rankology_active_inspect_url', function () {
            $option = rankology_get_service('ToggleOption');

            if ( ! \method_exists($option, 'getToggleInspectUrl')) {
                return true;
            }

            return rankology_get_service('ToggleOption')->getToggleInspectUrl() === '1';
        });
    }
}
