<?php

namespace Asura\Integration\WordPress;

use TheLostAsura\Skynet\Setup;

class WordPress {
    public static function init() {
        add_action( 'activated_plugin', [ Setup::class, 'lastPluginOrder' ] );
        add_action( 'init', [ Plugin::class, 'init' ] );
        add_action( 'init', [ PostType::class, 'init' ] );
        add_action( 'init', [ Taxonomy::class, 'init' ] );
        add_action( 'admin_menu', [ AdminMenu::class, 'init' ] );
        add_action( 'admin_notices', [ Notice::class, 'init' ] );
    }
}
