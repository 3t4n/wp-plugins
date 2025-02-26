<?php

namespace ExactLinks\App\Hooks\Handlers;

use ExactLinks\Framework\Database\DBMigrator;

class ActivationHandler
{
    public function handle($network_wide = false)
    {
        DBMigrator::run($network_wide);
        update_option('_exactlinks_version', EXACTLINKS_VERSION, 'no');

        if (! wp_next_scheduled ( 'exactlinks_daily_broken_link_check' )) {
            wp_schedule_event( time(), 'daily', 'exactlinks_daily_broken_link_check' );
        }
    }
}
