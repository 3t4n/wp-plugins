<?php
/**
 * Plugin Name: Activity Tracker
 * Description: Tracks user activity when a post, page, WooCommerce product, or custom post type is updated. Stores the date-time and username in a meta key and displays it in a custom meta box.
 * Version: 1.0.0
 * Author: Sahib Khan
 * Author URI: https://erkhansahib.web.app/
 * Text Domain: activity-tracker
 * Requires at least: 5.5
 * Requires PHP: 7.2
 * License: GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'SKAT_ACTIVITY_TRACKER_VERSION', '1.0.0' );
define( 'SKAT_ACTIVITY_TRACKER_MAIN_FILE', __FILE__ );
define( 'SKAT_ACTIVITY_TRACKER_PLUGIN_DIR_URL', plugin_dir_url( SKAT_ACTIVITY_TRACKER_MAIN_FILE ) );

/**
 * Tracks user activity and stores data in a meta key, maintaining a maximum of 15 records.
 *
 * @param int     $post_id Post ID.
 * @param WP_Post $post    Post object.
 */
function skat_track_user_activity( $post_id, $post ) {
    // Avoid auto-saves and revisions.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE || wp_is_post_revision( $post_id ) ) {
        return;
    }

    // Get current user.
    $user = wp_get_current_user();

    if ( $user->exists() ) {
        // Prepare activity data.
        $activity = array(
            'username'  => $user->user_login,
            'timestamp' => current_time( 'mysql' ),
        );

        // Get existing activity data.
        $existing_data = get_post_meta( $post_id, '_skat_activity_log', true );
        if ( ! is_array( $existing_data ) ) {
            $existing_data = array();
        }

        // Append new activity and limit to 15 records.
        $existing_data[] = $activity;
        if ( count( $existing_data ) > 15 ) {
            array_shift( $existing_data ); // Remove the oldest record.
        }

        // Update the meta key.
        update_post_meta( $post_id, '_skat_activity_log', $existing_data );
    }
}
add_action( 'save_post', 'skat_track_user_activity', 10, 2 );

/**
 * Displays activity log in a custom meta box.
 *
 * @param WP_Post $post Post object.
 */
function skat_add_meta_box( $post ) {
    add_meta_box(
        'skat_activity_log',
        __( 'Activity Log', 'activity-tracker' ),
        'skat_display_meta_box',
        null, // Applicable to all post types.
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'skat_add_meta_box' );

/**
 * Callback for displaying the activity log meta box.
 *
 * @param WP_Post $post Post object.
 */
function skat_display_meta_box( $post ) {
    // Get activity log.
    $activity_log = get_post_meta( $post->ID, '_skat_activity_log', true );

    if ( ! empty( $activity_log ) && is_array( $activity_log ) ) {
        echo '<div class="skat-activity-log">';
        echo '<ul>';
        foreach ( array_reverse( $activity_log ) as $activity ) {
            // Convert the timestamp to human-readable time difference.
            $time_diff = human_time_diff( strtotime( $activity['timestamp'] ), current_time( 'timestamp' ) );
            echo '<li>';
            echo '<span class="skat-username">' . esc_html( $activity['username'] ) . '</span>';
            echo ' - ';
            echo '<span class="skat-timestamp">' . esc_html( $time_diff . ' ago' ) . '</span>';
            echo '</li>';
        }
        echo '</ul>';
        echo '</div>';
    } else {
        echo '<p class="skat-no-activity">';
        esc_html_e( 'No activity recorded.', 'activity-tracker' );
        echo '</p>';
    }
}

/**
 * Enqueue custom admin CSS for the activity tracker.
 */
function skat_enqueue_admin_styles() {
    // Register and enqueue the CSS file.
    wp_register_style( 'skat-admin-styles', SKAT_ACTIVITY_TRACKER_PLUGIN_DIR_URL . 'assets/css/admin-styles.css', array(), SKAT_ACTIVITY_TRACKER_VERSION );
    wp_enqueue_style( 'skat-admin-styles' );
}
add_action( 'admin_enqueue_scripts', 'skat_enqueue_admin_styles' );
