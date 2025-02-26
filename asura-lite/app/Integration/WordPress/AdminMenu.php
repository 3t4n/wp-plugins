<?php

namespace Asura\Integration\WordPress;

use TheLostAsura\Skynet\MultiSite;

class AdminMenu {
    public static function init() {
        add_menu_page(
            'Asura',
            'Asura',
            'manage_options',
            'asura',
            [ AdminMenu::class, 'appPage' ],
            'data:image/svg+xml;base64,' . base64_encode( @file_get_contents( ASURA_PLUGIN_DIR . '/public/img/japanese-lamp.svg' ) ),
            30
        );

        add_submenu_page(
            'asura',
            'Asura',
            'Asura',
            'manage_options',
            'asura',
            [ AdminMenu::class, 'appPage' ],
            0
        );

        add_submenu_page(
            'asura',
            'Designset',
            'Designset',
            'manage_options',
            'edit-tags.php?taxonomy=designset',
        );
    }

    public static function appPage(){
        $url = MultiSite::isMultiSite()
            ? ( is_ssl()
                ? 'https://'
                : 'http://'
            ) . MultiSite::blog()->domain
            : rtrim( site_url(), '/' );
        redirect( $url . app()->router->namedRoutes['admin.apis.index'] )->send();
    }
}
