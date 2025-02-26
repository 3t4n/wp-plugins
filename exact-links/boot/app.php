<?php

use ExactLinks\Framework\Foundation\Application;
use ExactLinks\App\Hooks\Handlers\ActivationHandler;
use ExactLinks\App\Hooks\Handlers\DeactivationHandler;

return function($file) {

    register_activation_hook($file, function() {
        (new ActivationHandler)->handle();
    });

    register_deactivation_hook($file, function() {
        (new DeactivationHandler)->handle();
    });

    add_action('plugins_loaded', function() use ($file) {

        add_action('exactlinks/admin_app_loaded', function () {
            if (! wp_next_scheduled ( 'exactlinks_daily_broken_link_check' )) {
                wp_schedule_event( time(), 'daily', 'exactlinks_daily_broken_link_check' );
            }
        });

       return do_action('exactlinks_loaded', new Application($file));
    });
};
