<?php

namespace RankologyFno\Actions\FiltersFree;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Core\Hooks\ExecuteHooks;

class SchemasManual implements ExecuteHooks {
    public function hooks() {
        if ('1' === rankology_fno_get_service('OptionPro')->getRichSnippetEnable()) {
            add_filter('rankology_active_schemas_manual_universal_metabox', '__return_true');
        }
    }
}
