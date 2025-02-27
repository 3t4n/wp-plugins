<?php
/**
 * Compatibility
 *
 * @package     GamiPress\Multimedia_Content\Compatibility
 * @since       1.0.0
 */
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


/**
 * AJAX Helper for selecting posts
 *
 * Backward compatibility with GamiPress installs less than 1.3.6
 *
 * @since 1.0.0
 */
function gamipress_multimedia_content_ajax_get_posts() {

    global $wpdb;

    // Backward compatibility with GamiPress installs less than 1.3.6
    if ( version_compare( GAMIPRESS_VER, '1.3.6', '>=' ) ) {
        return;
    }

    // Pull back the search string
    $search = isset( $_REQUEST['q'] ) ? like_escape( $_REQUEST['q'] ) : '';

    // Post type conditional
    $post_type = ( isset( $_REQUEST['post_type'] ) && ! empty( $_REQUEST['post_type'] ) ? $_REQUEST['post_type'] :  array( 'post', 'page' ) );

    // For backward compatibility we added 'video' and 'audio' as a post type of this plugin triggers
    $where = '';

    // Replace video by attachment
    if( is_array( $post_type ) && $post_type[0] === 'video' ) {
        $post_type[0] = 'attachment';
        $where = wp_post_mime_type_where( 'video', 'p' );
    } else if( $post_type === 'video' ) {
        $post_type = 'attachment';
        $where = wp_post_mime_type_where( 'video', 'p' );
    }

    // Replace audio by attachment
    if( is_array( $post_type ) && $post_type[0] === 'audio' ) {
        $post_type[0] = 'attachment';
        $where = wp_post_mime_type_where( 'audio', 'p' );
    } else if( $post_type === 'audio' ) {
        $post_type = 'attachment';
        $where = wp_post_mime_type_where( 'audio', 'p' );
    }

    // Not is our request
    if( empty( $where ) ) {
        return;
    }

    if ( is_array( $post_type ) ) {
        $post_type = sprintf( 'AND p.post_type IN(\'%s\')', implode( "','", $post_type ) );
    } else {
        $post_type = sprintf( 'AND p.post_type = \'%s\'', $post_type );
    }

    $results = $wpdb->get_results( $wpdb->prepare(
        "
        SELECT p.ID, p.post_title
        FROM   $wpdb->posts AS p
        WHERE  1=1
               {$post_type}
               {$where}
               AND p.post_title LIKE %s
               AND p.post_status IN( 'publish', 'inherit' )
        ",
        "%%{$search}%%"
    ) );

    // Return our results
    wp_send_json_success( $results );
    die;

}
add_action( 'wp_ajax_gamipress_get_posts', 'gamipress_multimedia_content_ajax_get_posts', 5 );