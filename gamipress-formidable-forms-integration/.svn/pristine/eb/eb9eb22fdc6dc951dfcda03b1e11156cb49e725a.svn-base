<?php
/**
 * Admin
 *
 * @package GamiPress\Formidable_Forms\Admin
 * @since 1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Formidable Forms automatic updates
 *
 * @since  1.0.0
 *
 * @param array $automatic_updates_plugins
 *
 * @return array
 */
function gamipress_frm_automatic_updates( $automatic_updates_plugins ) {

    $automatic_updates_plugins['gamipress-formidable-forms-integration'] = __( 'Formidable Forms integration', 'gamipress-formidable-forms-integration' );

    return $automatic_updates_plugins;
}
add_filter( 'gamipress_automatic_updates_plugins', 'gamipress_frm_automatic_updates' );