<?php

if ( ! defined( 'TGGH_DEACTIVATE' ) ) {
    exit;
}

for ( $level = 1; $level <= TGGH_MAX_LEVEL; ++$level ) {
    $path = __DIR__ . '/level-' . $level . '/deactivation.php';
    if ( file_exists( $path ) ) {
        require_once $path;
        call_user_func( 'tggh_deactivate_' . $level );
    }
}
