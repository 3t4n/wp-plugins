<?php

namespace Asura\Providers;

use Asura\Integration\Vendor\Vendor;
use Asura\Integration\WordPress\WordPress;
use Illuminate\Support\ServiceProvider;

class WordpressServiceProvider extends ServiceProvider {
    public function register() {
    }

    public function boot() {
        add_action( 'init', [ $this, 'wordpress' ], - 1 );
    }

    public function wordpress() {
        WordPress::init();
        Vendor::init();
    }

}
