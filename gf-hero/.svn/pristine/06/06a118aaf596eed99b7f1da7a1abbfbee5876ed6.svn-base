<?php

if ( ! defined( 'TGGH_ACTIVATE' ) || TGGH_ACTIVATE !== 1 ) {
    exit;
}

define( 'TGGH_MIN_GF_VERSION', '2.6.3' );

if ( ! class_exists( 'GFForms' ) ) {
    $tggh_error = 'gf_not_present';
    require_once __DIR__ . '/activation-error.php';
}

if ( version_compare( GFForms::$version, TGGH_MIN_GF_VERSION, '<' ) ) {
    $tggh_error = 'gf_too_old';
    require_once __DIR__ . '/activation-error.php';
}

for ( $level = 1; $level <= TGGH_MAX_LEVEL; ++$level ) {
    $path = __DIR__ . '/level-' . $level . '/activation.php';
    if ( file_exists( $path ) ) {
        require_once $path;
        call_user_func( 'tggh_activate_' . $level );
    }
}
