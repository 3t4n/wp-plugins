<?php
/**
 * Triggers
 *
 * @package GamiPress\Multimedia_Content\Triggers
 * @since 1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Register plugin activity triggers
 *
 * @since  1.0.0
 *
 * @param array $activity_triggers
 * @return mixed
 */
function gamipress_multimedia_content_activity_triggers( $activity_triggers ) {

    $activity_triggers[__( 'Multimedia Content Creation', 'gamipress-multimedia-content' )] = array(
        'gamipress_multimedia_content_upload'  	    => __( 'Upload any multimedia content', 'gamipress-multimedia-content' ),
        'gamipress_multimedia_content_upload_image' => __( 'Upload an image', 'gamipress-multimedia-content' ),
        'gamipress_multimedia_content_upload_video'	=> __( 'Upload a video', 'gamipress-multimedia-content' ),
        'gamipress_multimedia_content_upload_audio' => __( 'Upload an audio', 'gamipress-multimedia-content' ),
    );

    $activity_triggers[__( 'Multimedia Content Interactions', 'gamipress-multimedia-content' )] = array(
        // Video
        'gamipress_multimedia_content_watch_video'              => __( 'Watch any video', 'gamipress-multimedia-content' ),
        'gamipress_multimedia_content_watch_specific_video'     => __( 'Watch a specific video', 'gamipress-multimedia-content' ),
        'gamipress_multimedia_content_watch_user_video'         => __( 'Watch other user\'s video', 'gamipress-multimedia-content' ),
        'gamipress_multimedia_content_get_watch_video'          => __( 'Get a watch on a video', 'gamipress-multimedia-content' ),
        // Audio
        'gamipress_multimedia_content_listen_audio'  		    => __( 'Listen any audio', 'gamipress-multimedia-content' ),
        'gamipress_multimedia_content_listen_specific_audio'  	=> __( 'Listen a specific audio', 'gamipress-multimedia-content' ),
        'gamipress_multimedia_content_listen_user_audio'	    => __( 'Listen other user\'s audio', 'gamipress-multimedia-content' ),
        'gamipress_multimedia_content_get_listen_audio'	        => __( 'Get a listen on an audio', 'gamipress-multimedia-content' ),
    );

    return $activity_triggers;

}
add_filter( 'gamipress_activity_triggers', 'gamipress_multimedia_content_activity_triggers' );

/**
 * Register plugin specific activity triggers
 *
 * @since  1.0.0
 *
 * @param array $specific_activity_triggers
 *
 * @return mixed
 */
function gamipress_multimedia_content_specific_activity_triggers( $specific_activity_triggers ) {

    // Backward compatibility with GamiPress installs less than 1.3.6
    if ( version_compare( GAMIPRESS_VER, '1.3.6', '>=' ) ) {
        $specific_activity_triggers['gamipress_multimedia_content_watch_specific_video'] = array( 'attachment' );
        $specific_activity_triggers['gamipress_multimedia_content_listen_specific_audio'] = array( 'attachment' );
    } else {
        $specific_activity_triggers['gamipress_multimedia_content_watch_specific_video'] = array( 'video' );
        $specific_activity_triggers['gamipress_multimedia_content_listen_specific_audio'] = array( 'audio' );
    }

    return $specific_activity_triggers;

}
add_filter( 'gamipress_specific_activity_triggers', 'gamipress_multimedia_content_specific_activity_triggers' );

/**
 * Register plugin specific activity triggers query args
 *
 * @since  1.0.0
 *
 * @param array|string 	$query_args
 * @param string 		$activity_trigger
 *
 * @return mixed
 */
function gamipress_multimedia_content_specific_activity_triggers_query_args( $query_args, $activity_trigger ) {

    switch( $activity_trigger ) {
        case 'gamipress_multimedia_content_watch_specific_video':
            $query_args = wp_post_mime_type_where( 'video', 'p' );
            break;
        case 'gamipress_multimedia_content_listen_specific_audio':
            $query_args = wp_post_mime_type_where( 'audio', 'p' );
            break;
    }

    return $query_args;

}
add_filter( 'gamipress_specific_activity_triggers_query_args', 'gamipress_multimedia_content_specific_activity_triggers_query_args', 10, 2 );

/**
 * Return a specific activity trigger label
 *
 * @since  1.0.0
 *
 * @param array     $specific_activity_trigger_labels
 *
 * @return array
 */
function gamipress_multimedia_content_specific_activity_trigger_label( $specific_activity_trigger_labels ) {

    $specific_activity_trigger_labels['gamipress_multimedia_content_watch_specific_video'] = __( 'Watch the video %s', 'gamipress-multimedia-content' );
    $specific_activity_trigger_labels['gamipress_multimedia_content_listen_specific_audio'] = __( 'Listen the audio %s', 'gamipress-multimedia-content' );

    return $specific_activity_trigger_labels;

}
add_filter( 'gamipress_specific_activity_trigger_label', 'gamipress_multimedia_content_specific_activity_trigger_label', 10, 3 );

/**
 * Extended meta data for event trigger logging
 *
 * @since 1.0.0
 *
 * @param array 	$log_meta
 * @param integer 	$user_id
 * @param string 	$trigger
 * @param integer 	$site_id
 * @param array 	$args
 *
 * @return array
 */
function gamipress_multimedia_content_log_event_trigger_extended_meta_data( $log_meta, $user_id, $trigger, $site_id, $args ) {

    switch ( $trigger ) {
        case 'gamipress_multimedia_content_upload':
        case 'gamipress_multimedia_content_upload_image':
        case 'gamipress_multimedia_content_upload_video':
        case 'gamipress_multimedia_content_upload_audio':
            // Add the attachment ID
            $log_meta['attachment_id'] = $args[0];
             break;
        case 'gamipress_multimedia_content_watch_video':
        case 'gamipress_multimedia_content_watch_specific_video':
        case 'gamipress_multimedia_content_listen_audio':
        case 'gamipress_multimedia_content_listen_specific_audio':
            // Add the attachment ID and post ID where attachment has been placed
            $log_meta['attachment_id'] = $args[0];
            $log_meta['post_id'] = $args[2];
            $log_meta['author_id'] = $args[3];
            break;
    }

    return $log_meta;
}
add_filter( 'gamipress_log_event_trigger_meta_data', 'gamipress_multimedia_content_log_event_trigger_extended_meta_data', 10, 5 );

/**
 * Get user for a given trigger action.
 *
 * @since  1.0.0
 *
 * @param  integer $user_id user ID to override.
 * @param  string  $trigger Trigger name.
 * @param  array   $args    Passed trigger args.
 *
 * @return integer          User ID.
 */
function gamipress_multimedia_content_trigger_get_user_id( $user_id, $trigger, $args ) {

    switch ( $trigger ) {

        case 'gamipress_multimedia_content_upload':
        case 'gamipress_multimedia_content_upload_image':
        case 'gamipress_multimedia_content_upload_video':
        case 'gamipress_multimedia_content_upload_audio':
        // Video
        case 'gamipress_multimedia_content_watch_video':
        case 'gamipress_multimedia_content_watch_specific_video':
        case 'gamipress_multimedia_content_watch_user_video':
        // Audio
        case 'gamipress_multimedia_content_listen_audio':
        case 'gamipress_multimedia_content_listen_specific_audio':
        case 'gamipress_multimedia_content_listen_user_audio':
            $user_id = $args[1];
            break;
        case 'gamipress_multimedia_content_get_watch_video':
        case 'gamipress_multimedia_content_get_listen_audio':
            $user_id = $args[3];
            break;

    }

    return $user_id;

}
add_filter( 'gamipress_trigger_get_user_id', 'gamipress_multimedia_content_trigger_get_user_id', 10, 3 );

/**
 * Get the id for a given specific trigger action.
 *
 * @since  1.0.0
 *
 * @param  integer $specific_id The specific ID.
 * @param  string  $trigger     Trigger name.
 * @param  array   $args        Passed trigger args.
 *
 * @return integer              Specific ID.
 */
function gamipress_multimedia_content_specific_trigger_get_id( $specific_id = 0, $trigger = '', $args = array() ) {

    switch ( $trigger ) {
        case 'gamipress_multimedia_content_watch_specific_video':
        case 'gamipress_multimedia_content_listen_specific_audio':
            $specific_id = $args[0];
            break;
    }

    return absint( $specific_id );
}
add_filter( 'gamipress_specific_trigger_get_id', 'gamipress_multimedia_content_specific_trigger_get_id', 10, 3 );