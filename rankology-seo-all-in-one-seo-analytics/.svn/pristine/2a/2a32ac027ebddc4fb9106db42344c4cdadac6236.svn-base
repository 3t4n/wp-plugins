<?php

namespace RankologyFno\Actions\Table;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

use Rankology\Core\Hooks\ExecuteHooks;

class WorkerTable implements ExecuteHooks {
    public function hooks() {
        add_action('init', [$this, 'init']);
    }

    public function init() {
        if ( ! is_user_logged_in()) {
            return;
        }

        $tables = rankology_fno_get_service('TableList')->getTables();
        rankology_fno_get_service('TableManager')->createTablesIfNeeded($tables);
    }
}
