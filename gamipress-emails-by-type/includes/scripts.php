<?php
/**
 * Scripts
 *
 * @package     GamiPress\Emails\By_Type\Scripts
 * @since       1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Register admin scripts
 *
 * @since       1.0.0
 * @return      void
 */
function gamipress_emails_by_type_admin_register_scripts() {

    // Use minified libraries if SCRIPT_DEBUG is turned off
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

    // Stylesheets
    wp_register_style( 'gamipress-emails-by-type-admin-css', GAMIPRESS_EMAILS_BY_TYPE_URL . 'assets/css/gamipress-emails-by-type-admin' . $suffix . '.css', array(), GAMIPRESS_EMAILS_BY_TYPE_VER, 'all' );

    // Scripts
    wp_register_script( 'gamipress-emails-by-type-admin-js', GAMIPRESS_EMAILS_BY_TYPE_URL . 'assets/js/gamipress-emails-by-type-admin' . $suffix . '.js', array( 'jquery' ), GAMIPRESS_EMAILS_BY_TYPE_VER, true );

}
add_action( 'admin_init', 'gamipress_emails_by_type_admin_register_scripts' );

/**
 * Enqueue admin scripts
 *
 * @since       1.0.0
 * @return      void
 */
function gamipress_emails_by_type_admin_enqueue_scripts( $hook ) {

    global $post_type;

    if( in_array( $post_type, array( 'achievement-type', 'points-type', 'rank-type' ) )
        || in_array( $post_type, gamipress_get_achievement_types_slugs() )
        || in_array( $post_type, gamipress_get_rank_types_slugs() ) ) {

        // Stylesheets
        wp_enqueue_style( 'gamipress-emails-by-type-admin-css' );

        //Scripts
        wp_enqueue_script( 'gamipress-emails-by-type-admin-js' );
    }

}
add_action( 'admin_enqueue_scripts', 'gamipress_emails_by_type_admin_enqueue_scripts', 100 );