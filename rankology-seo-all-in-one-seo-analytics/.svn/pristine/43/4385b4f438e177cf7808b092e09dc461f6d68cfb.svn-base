<?php

namespace RankologyFno\Actions\FiltersFree;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Core\Hooks\ExecuteHooks;

class GoogleSuggest implements ExecuteHooks {
    public function hooks() {
        add_filter('rankology_ui_metabox_google_suggest', '__return_true');
    }


}
