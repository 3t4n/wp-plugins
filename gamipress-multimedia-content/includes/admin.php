<?php
/**
 * Admin
 *
 * @package GamiPress\Multimedia_Content\Admin
 * @since 1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Player automatic updates
 *
 * @since  1.0.0
 *
 * @param array $automatic_updates_plugins
 *
 * @return array
 */
function gamipress_multimedia_content_automatic_updates( $automatic_updates_plugins ) {

    $automatic_updates_plugins['gamipress-multimedia-content'] = __( 'GamiPress - Multimedia Content', 'gamipress-multimedia-content' );

    return $automatic_updates_plugins;
}
add_filter( 'gamipress_automatic_updates_plugins', 'gamipress_multimedia_content_automatic_updates' );