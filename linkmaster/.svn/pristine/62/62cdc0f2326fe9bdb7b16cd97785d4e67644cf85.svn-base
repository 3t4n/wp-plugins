<?php
/*
Plugin Name: LinkMaster
Description: A plugin to dynamically handle multiple types of custom permalinks including '?'.
Version: 1.0
Author: Codeace
Author URI: https://codeace.com
License: GPLv3

Text Domain: linkmaster
*/

// Prevent direct file access
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Register the custom rewrite rules on initialization
function lmcp_register_rewrite_rules() {
    // We do not rely on rewrite rules for custom permalinks with '?'
    // So we can keep the existing rewrite rules for other permalinks
    $cached_rules = get_transient( 'lmcp_rewrite_rules' );
    if ( false !== $cached_rules ) {
        foreach ( $cached_rules as $pattern => $query ) {
            add_rewrite_rule( $pattern, $query, 'top' );
        }
        return;
    }

    // Fetch all posts with custom permalinks that do NOT contain '?'
    $args = array(
        'post_type'      => array( 'post', 'page' ),
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'meta_query'     => array(
            array(
                'key'     => '_lmcp_custom_permalink',
                'compare' => 'EXISTS',
            ),
            array(
                'key'     => '_lmcp_custom_permalink',
                'value'   => '?',
                'compare' => 'NOT LIKE',
            ),
        ),
        'fields' => 'ids',
    );

    $posts         = get_posts( $args );
    $rewrite_rules = array();

    // Loop through each post and create a rewrite rule for its custom permalink
    foreach ( $posts as $post_id ) {
        $custom_permalink = get_post_meta( $post_id, '_lmcp_custom_permalink', true );

        if ( $custom_permalink ) {
            $custom_permalink = untrailingslashit( $custom_permalink );
            // Create a regex pattern for the custom permalink
            $pattern                     = '^' . preg_quote( $custom_permalink, '/' ) . '/?$';
            $rewrite_rules[ $pattern ]   = 'index.php?p=' . $post_id;
            add_rewrite_rule( $pattern, 'index.php?p=' . $post_id, 'top' );
        }
    }

    // Cache the rewrite rules for 12 hours
    set_transient( 'lmcp_rewrite_rules', $rewrite_rules, 12 * HOUR_IN_SECONDS );
}
add_action( 'init', 'lmcp_register_rewrite_rules' );

// Hook into parse_request to manually handle unmatched requests
function lmcp_custom_parse_request( $wp ) {
    if ( ! empty( $wp->request ) ) {
        if ( isset( $_SERVER['REQUEST_URI'] ) ) {
            // Get the full REQUEST_URI, including query string
            $request_uri = sanitize_text_field(wp_unslash( $_SERVER['REQUEST_URI'] ));
			// Remove the site path from REQUEST_URI
            $site_path = wp_parse_url( home_url(), PHP_URL_PATH );
            if ( $site_path && '/' !== $site_path ) {
                $request_uri = preg_replace( '#^' . preg_quote( $site_path, '#' ) . '#', '', $request_uri );
            }
            $request_uri = ltrim( $request_uri, '/' );
            // URL decode the request URI
            $request_uri_decoded = urldecode( $request_uri );
            // Remove any trailing slash unless it's part of a query string
            $request_uri_decoded_parts = explode( '?', $request_uri_decoded, 2 );
            $request_path = untrailingslashit( $request_uri_decoded_parts[0] );
            if ( isset( $request_uri_decoded_parts[1] ) ) {
                $request_path .= '?' . $request_uri_decoded_parts[1];
            }
        } else {
            $request_path = '';
        }

        // Try to find the post with a matching custom permalink
        $post_id = lmcp_get_post_id_by_custom_permalink( $request_path );

        if ( $post_id ) {
            $wp->query_vars['p']    = $post_id;
            $wp->query_vars['name'] = get_post_field( 'post_name', $post_id );
            $wp->is_single          = true;
            $wp->is_404             = false;
            // Stop further processing
            unset( $wp->query_vars['error'] );
        }
    }
}
add_action( 'parse_request', 'lmcp_custom_parse_request' );

// Disable canonical redirects for custom permalinks with '?'
function lmcp_disable_canonical_redirect( $redirect_url, $requested_url ) {
    if ( isset( $_SERVER['REQUEST_URI'] ) ) {
        $request_uri = sanitize_text_field(wp_unslash( $_SERVER['REQUEST_URI'] ));
		if ( strpos( $request_uri, '?' ) !== false ) {
            // Check if the requested URI matches a custom permalink
            $site_path = wp_parse_url( home_url(), PHP_URL_PATH );
            if ( $site_path && '/' !== $site_path ) {
                $request_uri = preg_replace( '#^' . preg_quote( $site_path, '#' ) . '#', '', $request_uri );
            }
            $request_uri = ltrim( $request_uri, '/' );
            $request_uri_decoded = urldecode( $request_uri );
            $request_uri_decoded = untrailingslashit( $request_uri_decoded );

            $post_id = lmcp_get_post_id_by_custom_permalink( $request_uri_decoded );
            if ( $post_id ) {
                // Return false to prevent the redirect
                return false;
            }
        }
    }
    return $redirect_url;
}
add_filter( 'redirect_canonical', 'lmcp_disable_canonical_redirect', 10, 2 );

// Function to retrieve post ID by custom permalink
function lmcp_get_post_id_by_custom_permalink( $custom_permalink ) {
    $custom_permalink = untrailingslashit( $custom_permalink );
    $cached_post_id   = wp_cache_get( 'lmcp_permalink_' . md5( $custom_permalink ), 'lmcp_permalinks' );
    if ( false !== $cached_post_id ) {
        return $cached_post_id;
    }

    $args = array(
        'post_type'      => array( 'post', 'page' ),
        'posts_per_page' => 1,
        'fields'         => 'ids',
        'meta_query'     => array(
            array(
                'key'   => '_lmcp_custom_permalink',
                'value' => $custom_permalink,
            ),
        ),
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {
        $post_id = $query->posts[0];
        wp_cache_set( 'lmcp_permalink_' . md5( $custom_permalink ), $post_id, 'lmcp_permalinks', HOUR_IN_SECONDS );
        return $post_id;
    }

    return false;
}

// Save custom permalink on post save
function lmcp_save_custom_permalink( $post_id ) {
    // Check if it's a valid request
    $nonce = isset( $_POST['lmcp_custom_permalink_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['lmcp_custom_permalink_nonce'] ) ) : '';
    if ( ! wp_verify_nonce( $nonce, 'lmcp_save_custom_permalink' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['lmcp_custom_permalink'] ) ) {
        $custom_permalink_input = sanitize_text_field( wp_unslash( $_POST['lmcp_custom_permalink'] ) );
        $custom_permalink       = untrailingslashit( $custom_permalink_input );
        update_post_meta( $post_id, '_lmcp_custom_permalink', $custom_permalink );

        // Clear the cached rewrite rules and flush rewrite rules
        delete_transient( 'lmcp_rewrite_rules' );
        flush_rewrite_rules();
    }
}
add_action( 'save_post', 'lmcp_save_custom_permalink' );

// Add a meta box for custom permalink entry
function lmcp_add_permalink_meta_box() {
    add_meta_box(
        'lmcp_permalink_meta_box',
        __( 'Custom Permalink', 'linkmaster' ),
        'lmcp_permalink_meta_box_callback',
        array( 'post', 'page' ),
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'lmcp_add_permalink_meta_box' );

function lmcp_permalink_meta_box_callback( $post ) {
    wp_nonce_field( 'lmcp_save_custom_permalink', 'lmcp_custom_permalink_nonce' );

    $custom_permalink = get_post_meta( $post->ID, '_lmcp_custom_permalink', true );

    echo '<label for="lmcp_custom_permalink">' . esc_html__( 'Custom Permalink:', 'linkmaster' ) . '</label>';
    echo '<input type="text" id="lmcp_custom_permalink" name="lmcp_custom_permalink" value="' . esc_attr( $custom_permalink ) . '" style="width:100%;" />';
}

// Filter permalink output to show the custom permalink
function lmcp_custom_post_permalink( $permalink, $post ) {
    $custom_permalink = get_post_meta( $post->ID, '_lmcp_custom_permalink', true );

    if ( $custom_permalink ) {
        return home_url( '/' . $custom_permalink );
    }

    return $permalink;
}
add_filter( 'post_link', 'lmcp_custom_post_permalink', 10, 2 );
add_filter( 'page_link', 'lmcp_custom_post_permalink', 10, 2 );
