<?php
/**
 * Listeners
 *
 * @package     GamiPress\Player\Listeners
 * @since       1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Listener for multimedia creation
 *
 * Triggers: gamipress_multimedia_content_upload, gamipress_multimedia_content_upload_image, gamipress_multimedia_content_upload_audio, gamipress_multimedia_content_upload_video
 *
 * @since  1.0.0
 *
 * @param integer $attachment_id The attachment ID
 *
 * @return void
 */
function gamipress_multimedia_content_publishing_listener( $attachment_id ) {

    $attachment = get_post( $attachment_id );

    // Return if attachment not exists
    if( ! $attachment ) {
        return;
    }

    $user_id = absint( $attachment->post_author );

    // Trigger upload action
    do_action( 'gamipress_multimedia_content_upload', $attachment_id, $user_id, $attachment );

    $mime_type = explode( '/', $attachment->post_mime_type )[0];

    if( $mime_type === 'image' ) {

        // Trigger upload image action
        do_action( 'gamipress_multimedia_content_upload_image', $attachment_id, $user_id, $attachment );

    } else if( $mime_type === 'video' ) {

        // Trigger upload video action
        do_action( 'gamipress_multimedia_content_upload_video', $attachment_id, $user_id, $attachment );

    } else if( $mime_type === 'audio' ) {

        // Trigger upload audio action
        do_action( 'gamipress_multimedia_content_upload_audio', $attachment_id, $user_id, $attachment );

    }

}
add_action( 'add_attachment', 'gamipress_multimedia_content_publishing_listener' );

/**
 * Listener for multimedia interactions
 *
 * Triggers: gamipress_play_video, gamipress_play_specific_video, gamipress_play_audio, gamipress_play_specific_audio
 *
 * @since  1.0.0
 *
 * @return void
 */
function gamipress_multimedia_content_ajax_listener() {

    global $wpdb;

    // Setup vars
    $user_id = get_current_user_id();
    $src = isset( $_REQUEST['src'] ) ? urldecode( $_REQUEST['src'] ) : '';
    $post_id = isset( $_REQUEST['post_id'] ) ? urldecode( $_REQUEST['post_id'] ) : 0;

    // Not source provided
    if( empty( $src ) ) {
        return;
    }

    $parsed = parse_url( $src );

    // Return if malformed URL
    if( $parsed === FALSE ) {
        return;
    }

    // Turn query parameters to array
    parse_str( $parsed['query'], $params );

    // Remove "_=%n" parameter from src (WordPress adds this parameter to determine the MediaElement index)
    if( isset( $params['_'] ) ) {
        unset( $params['_'] );
    }

    // Build again the full URL without the "_=%n" parameter
    if( empty( $params ) ) {
        // If not parameters found, then keep src URL without query parameters
        $src = explode( '?', $src )[0];
    } else {
        $src = explode( '?', $src )[0] . '?' . http_build_query( $params );
    }

    // Look for achievements with this GUID
    $attachment = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $wpdb->posts WHERE guid = %s LIMIT 1;", $src ) );

    if( ! isset( $attachment[0] ) ) {
        return;
    }

    $attachment = $attachment[0];

    $mime_type = explode( '/', $attachment->post_mime_type )[0];

    // Return if this attachment is not a video or audio
    if( ! in_array( $mime_type, array( 'video', 'audio' ) ) ) {
        return;
    }

    $post_author = absint( $attachment->post_author );

    if( $mime_type === 'video' ) {

        // Trigger video actions
        do_action( 'gamipress_multimedia_content_watch_video', $attachment->ID, $user_id, $post_id, $post_author, $attachment );
        do_action( 'gamipress_multimedia_content_watch_specific_video', $attachment->ID, $user_id, $post_id, $post_author, $attachment );

        if( $post_author !== $user_id ) {
            do_action( 'gamipress_multimedia_content_watch_user_video', $attachment->ID, $user_id, $post_id, $post_author, $attachment );
            do_action( 'gamipress_multimedia_content_get_watch_video', $attachment->ID, $user_id, $post_id, $post_author, $attachment );
        }

    } else if( $mime_type === 'audio' ) {

        // Trigger audio actions
        do_action( 'gamipress_multimedia_content_listen_audio', $attachment->ID, $user_id, $post_id, $post_author, $attachment );
        do_action( 'gamipress_multimedia_content_listen_specific_audio', $attachment->ID, $user_id, $post_id, $post_author, $attachment );

        if( $post_author !== $user_id ) {
            do_action( 'gamipress_multimedia_content_listen_user_audio', $attachment->ID, $user_id, $post_id, $post_author, $attachment );
            do_action( 'gamipress_multimedia_content_get_listen_audio', $attachment->ID, $user_id, $post_id, $post_author, $attachment );
        }

    }



}
add_action( 'wp_ajax_gamipress_multimedia_content_listener', 'gamipress_multimedia_content_ajax_listener' );
add_action( 'wp_ajax_nopriv_gamipress_multimedia_content_listener', 'gamipress_multimedia_content_ajax_listener' );