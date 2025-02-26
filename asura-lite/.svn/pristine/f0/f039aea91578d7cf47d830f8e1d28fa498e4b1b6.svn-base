<?php

namespace Asura\Integration\Vendor\OxygenBuilder;

/**
 * Oxygen Builder Integration
 *
 * @version 3.7.beta-1
 */
class Oxygen {
    public static function init() {
        add_filter( 'body_class', [ Utils::class, 'bodyClass' ] );
        add_action( 'admin_init', [ Utils::class, 'registerSettings' ] );
        Connection::init();
        Demo::init();
    }
}
