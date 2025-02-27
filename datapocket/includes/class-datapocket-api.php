<?php

/**
 * @package Datapocket
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

class Datapocket_Api {

    /**
     * Hook into actions and filters.
     *
     * @since 1.0.0
     *
     * @return void
     */
	public static function init() {
        add_action( 'rest_api_init', array( __CLASS__, 'add_api_routes' ) );
	}

    /**
     * Add the API routes.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public static function add_api_routes() {
        // Route to check for validity of token.
        register_rest_route( 'datapocket/v1', '/conncheck', array(
            'callback'            => array( __CLASS__, 'connection_check' ),
            'args'                => array( 'token' => array( 'required' => true ), ),
            'permission_callback' => function() { return get_option( 'datapocket_token' ) === $_GET['token']; },
        ) );

        // Create keys if token is valid.
        register_rest_route( 'datapocket/v1', '/createkeys', array(
            'callback'            => array( __CLASS__, 'create_keys' ),
            'args'                => array( 'token' => array( 'required' => true ), ),
            'permission_callback' => function() { return get_option( 'datapocket_token' ) === $_GET['token']; },
        ) );

        // Check if key is valid.
        register_rest_route( 'datapocket/v1', '/checkkey/(?P<consumer_key>[a-zA-Z0-9-_]+)', array(
            'callback'            => array( __CLASS__, 'check_key' ),
            'args'                => array( 'token' => array( 'required' => true ), ),
            'permission_callback' => function() { return get_option( 'datapocket_token' ) === $_GET['token']; },
        ) );

        // Change keys permissions if token is valid.
        register_rest_route( 'datapocket/v1', '/configkeys/(?P<consumer_key>[a-zA-Z0-9-_]+)', array(
            'methods'             => 'POST',
            'callback'            => array( __CLASS__, 'change_key_permissions' ),
            'args'                => array(
                'token'       => array( 'required' => true ),
                'permissions' => array( 'required' => true ),
            ),
            'permission_callback' => function() { return isset( $_GET['token'] ) && get_option( 'datapocket_token' ) === $_GET['token']; },
        ) );

        // Route to check for validity of WP token.
        register_rest_route( 'datapocket/v1', '/wp-conncheck', array(
            'callback'            => array( __CLASS__, 'wp_connection_check' ),
            'args'                => array( 'token' => array( 'required' => true ), ),
            'permission_callback' => function() { return isset( $_GET['token'] ) && get_option( 'datapocket_wp_token' ) === $_GET['token']; },
        ) );

        // Route for webhook index.
        register_rest_route( 'datapocket/v1', '/webhooks', array(
            'callback'            => array( __CLASS__, 'webhook_index' ),
            'args'                => array(
                'token' => array( 'required' => true ),
            ),
            'permission_callback' => function() { return isset( $_GET['token'] ) && get_option( 'datapocket_wp_token' ) === $_GET['token']; },
        ) );

        // Route for webhook creation.
        register_rest_route( 'datapocket/v1', '/webhooks', array(
            'methods'             => 'POST',
            'callback'            => array( __CLASS__, 'create_webhook' ),
            'args'                => array(
                'token' => array( 'required' => true ),
                'url'   => array( 'required' => true ),
            ),
            'permission_callback' => function() { return isset( $_GET['token'] ) && get_option( 'datapocket_wp_token' ) === $_GET['token']; },
        ) );

        // Route for webhook updates.
        register_rest_route( 'datapocket/v1', '/webhooks/(?P<webhook_id>\d+)', array(
            'methods'             => 'POST',
            'callback'            => array( __CLASS__, 'update_webhook' ),
            'args'                => array(
                'token' => array( 'required' => true ),
                'url'   => array( 'required' => true ),
            ),
            'permission_callback' => function() { return isset( $_GET['token'] ) && get_option( 'datapocket_wp_token' ) === $_GET['token']; },
        ) );

        // Route for webhook deletion.
        register_rest_route( 'datapocket/v1', '/webhooks/(?P<webhook_id>\d+)', array(
            'methods'             => 'DELETE',
            'callback'            => array( __CLASS__, 'delete_webhook' ),
            'args'                => array(
                'token' => array( 'required' => true ),
            ),
            'permission_callback' => function() { return isset( $_GET['token'] ) && get_option( 'datapocket_wp_token' ) === $_GET['token']; },
        ) );

        // Route for application password creation.
        register_rest_route( 'datapocket/v1', '/application-passwords', array(
            'methods'             => 'POST',
            'callback'            => array( __CLASS__, 'create_application_password' ),
            'args'                => array(
                'token' => array( 'required' => true ),
                'name'  => array( 'required' => true ),
            ),
            'permission_callback' => function() {
                $token = $_GET['token'] ?? '';

                return get_option( 'datapocket_wp_token' ) === $token || get_option( 'datapocket_token' ) === $token;
            },
        ) );

        // Route for application password deletion.
        register_rest_route( 'datapocket/v1', '/application-passwords/(?P<uuid>[a-zA-Z0-9-_]+)', array(
            'methods'             => 'DELETE',
            'callback'            => array( __CLASS__, 'delete_application_password' ),
            'args'                => array(
                'token' => array( 'required' => true ),
            ),
            'permission_callback' => function() {
                $token = $_GET['token'] ?? '';

                return get_option( 'datapocket_wp_token' ) === $token || get_option( 'datapocket_token' ) === $token;
            },
        ) );
    }

    /**
     * Connection check.
     *
     * @since 1.0.0
     *
     * @return WP_REST_Response
     */
    public static function connection_check() {
        return new WP_REST_Response( array( 'message' => __( 'Token is valid for the current installation.', 'datapocket' ) ), 200 );
    }

    /**
     * Create keys.
     *
     * @since 1.0.0
     *
     * @return WP_REST_Response
     */
    public static function create_keys() {
		global $wpdb;

        $admins = get_users( array( 'role' => 'administrator', 'fields' => 'ID', 'number' => 1 ) );

        $consumer_key    = 'ck_' . wc_rand_hash();
        $consumer_secret = 'cs_' . wc_rand_hash();

        $data = array(
            'user_id'         => $admins[0],
            'description'     => '',
            'permissions'     => 'read_write',
            'consumer_key'    => wc_api_hash( $consumer_key ),
            'consumer_secret' => $consumer_secret,
            'truncated_key'   => substr( $consumer_key, -7 ),
        );

        $wpdb->insert(
            $wpdb->prefix . 'woocommerce_api_keys',
            $data,
            array(
                '%d',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
            )
        );

        return new WP_REST_Response( compact( 'consumer_key', 'consumer_secret' ), 200 );
    }

    /**
     * Check key.
     *
     * @since 1.0.0
     *
     * @return WP_REST_Response
     */
    public static function check_key( $request ) {
        global $wpdb;

        $consumer_key = wc_api_hash( sanitize_text_field( $request->get_param( 'consumer_key' ) ) );

        $api_key = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT * FROM {$wpdb->prefix}woocommerce_api_keys WHERE consumer_key = %s", $consumer_key
            )
        );

        if( $api_key ) {
            return new WP_REST_Response( array( 'permissions' => $api_key->permissions ), 200 );
        } else {
            return new WP_REST_Response( array( 'message' => __( "Consumer key doesn't exist.", 'datapocket' ) ), 404 );
        }
    }

    /**
     * Change key permissions.
     *
     * @since 1.0.0
     *
     * @return WP_REST_Response
     */
    public static function change_key_permissions( $request ) {
		global $wpdb;

        $consumer_key = wc_api_hash( sanitize_text_field( $request->get_param( 'consumer_key' ) ) );
        $permissions  = ( in_array( wp_unslash( $request->get_param( 'permissions' ) ), array( 'read', 'write', 'read_write' ), true ) ) ? sanitize_text_field( wp_unslash( $request->get_param( 'permissions' ) ) ) : 'read';

        $consumer_key_exists = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT * FROM {$wpdb->prefix}woocommerce_api_keys WHERE consumer_key = %s", $consumer_key
            )
        );

        // Update the key set which matches the consumer key.
        $query = $wpdb->update(
            $wpdb->prefix . 'woocommerce_api_keys',
            array( 'permissions' => $permissions ),
            compact( 'consumer_key' )
        );

        if( $consumer_key_exists ) {
            return new WP_REST_Response( array( 'message' => __( 'Key permissions have been updated.', 'datapocket' ) ), 200 );
        } else {
            return new WP_REST_Response( array( 'message' => __( "Consumer key doesn't exist.", 'datapocket' ) ), 404 );
        }
    }

    /**
     * Connection check for WP token.
     *
     * @since 1.0.0
     *
     * @return WP_REST_Response
     */
    public static function wp_connection_check() {
        return new WP_REST_Response( array( 'message' => __( 'Token is valid for the current installation.', 'datapocket' ) ), 200 );
    }

    /**
     * Create webhook.
     *
     * @since 1.0.0
     *
     * @return WP_REST_Response
     */
    public static function create_webhook( $request ) {
        $webhook_id = wp_insert_post( array(
            'post_type'   => 'webhook',
            'post_status' => 'publish',
            'meta_input'  => array(
                '_url' => trailingslashit( sanitize_url( $request->get_param( 'url' ) ) ),
            )
        ) );

        return new WP_REST_Response( array(
            'id'  => $webhook_id,
            'url' => get_post_meta( $webhook_id, '_url', true ),
        ), 200 );
    }

    /**
     * Show an index of all created webhooks.
     *
     * @since 1.0.0
     *
     * @return WP_REST_Response
     */
    public static function webhook_index() {
        return new WP_REST_Response( datapocket_get_webhooks(), 200 );
    }

    /**
     * Update webhook.
     *
     * @since 1.0.0
     *
     * @return WP_REST_Response
     */
    public static function update_webhook( $request ) {
        $webhook_id = absint( $request->get_param( 'webhook_id' ) );
        $webhook    = get_post( $webhook_id );

        // If it's indeed a webhook.
        if( $webhook && 'webhook' === $webhook->post_type ) {
            update_post_meta( $webhook_id, '_url', trailingslashit( sanitize_url( $request->get_param( 'url' ) ) ) );

            return new WP_REST_Response( array(
                'id'  => $webhook_id,
                'url' => get_post_meta( $webhook_id, '_url', true ),
            ), 200 );
        } else {
            return new WP_REST_Response( array( 'message' => __( "Webhook doesn't exist.", 'datapocket' ) ), 404 );
        }
    }

    /**
     * Delete webhook.
     *
     * @since 1.0.0
     *
     * @return WP_REST_Response
     */
    public static function delete_webhook( $request ) {
        $webhook_id = absint( $request->get_param( 'webhook_id' ) );
        $webhook    = get_post( $webhook_id );

        // If it's indeed a webhook.
        if( $webhook ) {
            wp_delete_post( $webhook_id, true );

            return new WP_REST_Response( null, 200 );
        } else {
            return new WP_REST_Response( array( 'message' => __( "Webhook doesn't exist.", 'datapocket' ) ), 404 );
        }
    }

    /**
     * Create application password.
     *
     * @since 1.1.14
     *
     * @return void
     */
    public static function create_application_password( $request )
    {
        $application_password = WP_Application_Passwords::create_new_application_password(
            datapocket_get_datapocket_admin()->ID,
            array( 'name' => $request->get_param( 'name' ) )
        );

        if( is_wp_error( $application_password ) ) {
            return $application_password;
        }

        // We replace the hashed password with the actual password in the object we will return.
        $application_password[ 1 ][ 'password']   = $application_password[ 0 ];
        $application_password[ 1 ][ 'user_id']    = datapocket_get_datapocket_admin()->ID;
        $application_password[ 1 ][ 'user_login'] = datapocket_get_datapocket_admin()->user_login;

        // Return the application password object.
        return $application_password[ 1 ];
    }

    /**
     * Delete application password.
     *
     * @since 1.1.14
     *
     * @return void
     */
    public static function delete_application_password( $request )
    {
        $application_password = WP_Application_Passwords::delete_application_password(
            datapocket_get_datapocket_admin()->ID,
            $request->get_param( 'uuid' )
        );

        if( is_wp_error( $application_password ) ) {
            return $application_password;
        }

        return new WP_REST_Response( array( 'message' => __( 'Application password has been deleted.', 'datapocket' ) ), 200 );
    }

}

Datapocket_Api::init();