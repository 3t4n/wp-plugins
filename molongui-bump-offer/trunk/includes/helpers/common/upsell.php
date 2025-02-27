<?php
defined( 'ABSPATH' ) or exit;
function mbo_get_upsells()
{
    $upsells = include MOLONGUI_BUMP_OFFER_DIR . 'config/common/upsells.php';
    if ( empty( $upsells ) ) return false;
    foreach ( get_molongui_plugins( 'keys' ) as $plugin_file ) unset( $upsells[$plugin_file] );
    return $upsells;
}