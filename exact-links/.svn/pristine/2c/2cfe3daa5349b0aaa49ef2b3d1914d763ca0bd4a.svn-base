<?php

namespace ExactLinks\App\Hooks\Handlers;

class DeactivationHandler
{
    public function handle()
    {
        delete_option('exactlinks_db_active'); 

        if ( wp_next_scheduled( 'exactlinks_daily_broken_link_check' ) ) { 
            wp_clear_scheduled_hook('exactlinks_daily_broken_link_check');
        }
    }
}
