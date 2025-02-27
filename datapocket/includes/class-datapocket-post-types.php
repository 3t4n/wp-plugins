<?php

/**
 * @package Datapocket
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

class Datapocket_Post_types {

	/**
	 * Hook in methods.
     *
     * @since 1.0.0
     *
     * @return void
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'register_post_types' ) );
        add_action( 'wp_after_insert_post', array( __CLASS__, 'send_webhook_requests_for_post_updates' ), 10, 4 );
        add_action( 'delete_post', array( __CLASS__, 'send_deleted_webhook_requests' ) );

        add_action( 'created_term', array( __CLASS__, 'send_webhook_requests_for_term_creation' ), 10, 3 );
        add_action( 'edited_term', array( __CLASS__, 'send_webhook_requests_for_term_update' ), 10, 3 );
        add_action( 'pre_delete_term', array( __CLASS__, 'send_webhook_requests_for_term_deletion' ), 10, 2 );
	}

    /**
     * Register core post types
     *
     * @since 1.0.0
     *
     * @return void
     */
    public static function register_post_types() {
        register_post_type( 'webhook' );
    }

    /**
     * Send the create, update or delete webhook request(s) if a post of post type 'post' has been created or updated.
     *
     * @since 1.0.0
     *
     * @param  int     $post_id
     * @param  WP_Post $post
     * @return void
     */
    public static function send_webhook_requests_for_post_updates( $post_id, $post, $update, $post_before ) {
        // Only for the 'post' post type.
        if( 'post' !== $post->post_type ) {
            return;
        }

        // If the post was already published.
        if( 'auto-draft' !== $post->post_status ) {
            $is_existing_post = get_post_meta( $post_id, 'datapocket_is_existing_post', true );

            if( $is_existing_post ) {
                datapocket_send_webhook_requests( 'PUT', 'posts', $post_id );
            } else {
                datapocket_send_webhook_requests( 'POST', 'posts', $post_id );
                update_post_meta( $post_id, 'datapocket_is_existing_post', true );
            }
        }
    }

    /**
     * Send the delete webhook request(s) if a post of post type 'post' has been trashed or deleted.
     *
     * @since 1.0.0
     *
     * @param  int $post_id
     * @return void
     */
    public static function send_deleted_webhook_requests( $post_id ) {
        if( get_post_type( $post_id ) === 'post' ) {
            datapocket_send_webhook_requests( 'DELETE', 'posts', $post_id );
        }
    }

    /**
     * Send the create webhook request(s) if a term has been created.
     *
     * @since 1.0.0
     *
     * @param  int    $term_id
     * @param  int    $tt_id
     * @param  string $taxonomy
     * @return void
     */
    public static function send_webhook_requests_for_term_creation( $term_id, $tt_id, $taxonomy ) {
        if( 'category' !== $taxonomy && 'post_tag' !== $taxonomy ) {
            return;
        }

        datapocket_send_webhook_requests( 'POST', 'category' === $taxonomy ? 'categories' : 'tags', $term_id );
    }

    /**
     * Send the update webhook request(s) if a term has been updated.
     *
     * @since 1.0.0
     *
     * @param  int    $term_id
     * @param  int    $tt_id
     * @param  string $taxonomy
     * @return void
     */
    public static function send_webhook_requests_for_term_update( $term_id, $tt_id, $taxonomy ) {
        if( 'category' !== $taxonomy && 'post_tag' !== $taxonomy ) {
            return;
        }

        datapocket_send_webhook_requests( 'PUT', 'category' === $taxonomy ? 'categories' : 'tags', $term_id );
    }

    /**
     * Send the delete webhook request(s) if a term has been deleted.
     *
     * @since 1.0.0
     *
     * @param  int    $term_id
     * @param  int    $tt_id
     * @param  string $taxonomy
     * @return void
     */
    public static function send_webhook_requests_for_term_deletion( $term_id, $taxonomy ) {
        if( 'category' !== $taxonomy && 'post_tag' !== $taxonomy ) {
            return;
        }

        datapocket_send_webhook_requests( 'DELETE', 'category' === $taxonomy ? 'categories' : 'tags', $term_id );
    }

}

Datapocket_Post_types::init();