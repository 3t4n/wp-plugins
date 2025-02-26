<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) || ! current_user_can( 'activate_plugins' )) {
    exit;
}

require_once __DIR__ . '/config.php';

define( 'TGGH_UNINSTALL', 1 );

for ( $level = 1; $level <= TGGH_MAX_LEVEL; ++$level ) {
    $path = __DIR__ . '/level-' . $level . '/uninstall.php';
    if ( file_exists( $path ) ) {
        require_once $path;
        call_user_func( 'tggh_uninstall_' . $level );
    }
}
