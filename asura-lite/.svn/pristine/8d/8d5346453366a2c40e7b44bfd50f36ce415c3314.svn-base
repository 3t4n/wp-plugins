<?php

namespace Asura\Integration\Vendor;

use Asura\Integration\Vendor\OxygenBuilder\Oxygen;

class Vendor {
    public static function init() {

        if ( defined( 'CT_VERSION' ) ) {
            add_action( 'init', [ Oxygen::class, 'init' ] );
        }
    }
}
