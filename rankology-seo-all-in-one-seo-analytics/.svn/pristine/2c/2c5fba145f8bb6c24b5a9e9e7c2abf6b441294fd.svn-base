<?php

namespace RankologyFno\Actions\FiltersFree;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Core\Hooks\ExecuteHooks;

class SubTabsGoogleNews implements ExecuteHooks {
    public function hooks() {
        add_filter('rankology_active_google_news', function () {
            $option = rankology_get_service('ToggleOption');

            if ( ! \method_exists($option, 'getToggleGoogleNews')) {
                return true;
            }

            return rankology_get_service('ToggleOption')->getToggleGoogleNews() === '1';
        });
    }
}
