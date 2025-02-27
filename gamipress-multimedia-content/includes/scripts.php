<?php
/**
 * Scripts
 *
 * @package     GamiPress\Multimedia_Content\Scripts
 * @since       1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Register frontend scripts
 *
 * @since       1.0.0
 * @return      void
 */
function gamipress_multimedia_content_register_scripts() {

    // Use minified libraries if SCRIPT_DEBUG is turned off
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

    // Scripts
    wp_register_script( 'gamipress-multimedia-content-js', GAMIPRESS_MULTIMEDIA_CONTENT_URL . 'assets/js/gamipress-multimedia-content' . $suffix . '.js', array( 'jquery' ), GAMIPRESS_MULTIMEDIA_CONTENT_VER, true );

}
add_action( 'init', 'gamipress_multimedia_content_register_scripts' );

/**
 * Enqueue frontend scripts
 *
 * @since       1.0.0
 * @return      void
 */
function gamipress_multimedia_content_enqueue_scripts( $hook = null ) {

    // Scripts
    wp_localize_script( 'gamipress-multimedia-content-js', 'gamipress_multimedia_content', array(
        'ajaxurl' => esc_url( admin_url( 'admin-ajax.php', 'relative' ) ),
        'post_id' => get_the_ID(),
    ) );

    wp_enqueue_script( 'gamipress-multimedia-content-js' );

}
add_action( 'wp_enqueue_scripts', 'gamipress_multimedia_content_enqueue_scripts', 100 );