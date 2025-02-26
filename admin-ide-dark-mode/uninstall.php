<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}

/**
 * Remove database AIDM data
 */

$meta_key = 'aidm-theme-preference';

delete_metadata( 'user', null, $meta_key, null, true );

?>