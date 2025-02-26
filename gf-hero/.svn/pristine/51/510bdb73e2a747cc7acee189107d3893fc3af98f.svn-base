<?php

if ( ! defined( 'TGGH_URL' ) ) {
    exit;
}

require_once __DIR__ . '/base/common.php';
require_once __DIR__ . '/base/site.php';

function tggh_site_enqueue_scripts() {
    wp_enqueue_script( 'jquery-effects-fade' );
    wp_enqueue_script( 'jquery-effects-blind' );
    wp_enqueue_script( 'jquery-effects-slide' );

    if ( tggh_get_level() > 1 ) {
        wp_enqueue_script( 'jquery-effects-bounce' );
        wp_enqueue_script( 'jquery-effects-clip' );
        wp_enqueue_script( 'jquery-effects-explode' );
        wp_enqueue_script( 'jquery-effects-fold' );
        wp_enqueue_script( 'jquery-effects-highlight' );
        wp_enqueue_script( 'jquery-effects-pulsate' );
        wp_enqueue_script( 'jquery-effects-scale' );
        wp_enqueue_script( 'jquery-effects-shake' );
    }

    tggh_enqueue( 'script', 'base/common.js' );
    tggh_enqueue( 'script', 'base/site.js', array(
        tggh_asset_handle( 'base/common.js' )
    ) );

    tggh_enqueue_levels( 'site', array(
        'script_deps' => tggh_asset_handle( 'base/site.js' )
    ) );
}

add_action( 'wp_enqueue_scripts', 'tggh_site_enqueue_scripts' );

tggh_require_levels( 'site' );
