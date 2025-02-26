<?php
// If uninstall not called from WordPress exit
defined( 'WP_UNINSTALL_PLUGIN' ) or exit;

// Delete plugin data if option selected
$options = json_decode( get_option( 'cvmh_slideshow' ), true );
if( $options['uninstall_delete'] ):
    global $wpdb;

    // Delete custom posts and attachments
    $posts = get_posts( array( 'post_type' => 'cvmh_slideshow', 'nopaging' => true ) );
    foreach ( $posts as $post ):
        $attachments = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment' ) );
        foreach( $attachments as $attachment ):
            wp_delete_attachment( $attachment->ID );
        endforeach;
        wp_delete_post( $post->ID, true );
    endforeach;

    // Delete option
    delete_option( 'cvmh_slideshow' );

    // Optimize tables
    $wpdb->query( "DELETE FROM `{$wpdb->prefix}wp_posts` WHERE `post_type` = 'cvmh_slideshow' AND `post_status` = 'auto-draft'" );
    $wpdb->query( "OPTIMIZE TABLE `{$wpdb->prefix}options`, `{$wpdb->prefix}postmeta`, `{$wpdb->prefix}posts`, `{$wpdb->prefix}terms`, `{$wpdb->prefix}term_taxonomy`, `{$wpdb->prefix}term_relationships`" );
endif;