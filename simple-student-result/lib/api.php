<?php
// lib.api.php

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register REST API routes
 */
add_action( 'rest_api_init', 'ssr_register_rest_routes' );
function ssr_register_rest_routes() {
    // Register ssr_find_all route
    register_rest_route( 'v2', '/ssr_find_all/', array(
        'methods'             => WP_REST_Server::READABLE, // GET
        'callback'            => 'ssr_api_ssr_find_all',
        'permission_callback' => 'ssr_get_public_data_permissions_check',
    ) );

    // Register ssr_add_data route
    register_rest_route( 'v2', '/ssr_add_data/', array(
        'methods'             => WP_REST_Server::CREATABLE, // POST
        'callback'            => 'ssr_update_st_submit',
        'permission_callback' => 'ssr_get_private_data_permissions_check',
    ) );

    // Register ssr_delete_data route
    register_rest_route( 'v2', '/ssr_delete_data/', array(
        'methods'             => WP_REST_Server::CREATABLE, // POST
        'callback'            => 'ssr_delete_data_now',
        'permission_callback' => 'ssr_get_private_data_permissions_check',
    ) );

    // Register ssr_text_option route
    register_rest_route( 'v2', '/ssr_text_option/', array(
        'methods'             => WP_REST_Server::CREATABLE, // POST
        'callback'            => 'ssr_update_text_option',
        'permission_callback' => 'ssr_get_private_data_permissions_check',
    ) );

    // Register ssr_tick_option route
    register_rest_route( 'v2', '/ssr_tick_option/', array(
        'methods'             => WP_REST_Server::CREATABLE, // POST
        'callback'            => 'ssr_update_tick_option',
        'permission_callback' => 'ssr_get_private_data_permissions_check',
    ) );
}

/**
 * Permission callback for public data
 *
 * @return bool
 */
function ssr_get_public_data_permissions_check() {
    return true;
}

/**
 * Permission callback for private data
 *
 * @return bool
 */
function ssr_get_private_data_permissions_check() {
    return current_user_can( 'manage_options' ) ? true : false;
}

/**
 * REST API callback to find all data based on registration ID
 *
 * @param WP_REST_Request $request_data
 * @return array
 */
function ssr_api_ssr_find_all( $request_data ) {
    // No need for output buffering here as global suppression is already in place

    $parameters = $request_data->get_params();

    // Validate 'postID' parameter
    if ( ! isset( $parameters['postID'] ) || empty( $parameters['postID'] ) || strlen( $parameters['postID'] ) == 0 ) {
        return array(
            'success' => false,
            'message' => 'Registration ID not found',
            'code'    => 404,
        );
    }

    global $wpdb;
    $sql = $wpdb->prepare(
        "SELECT * FROM " . $wpdb->prefix . SSR_TABLE . " WHERE rid = %s",
        ssr_needsCleaning( $parameters['postID'] )
    );

    $p = $wpdb->get_results( $sql );

    return $p ? array(
        'success' => true,
        0         => $p[0],
        'code'    => 101,
    ) : array(
        'success' => false,
        'message' => 'No data',
        'code'    => 405,
    );
}

/**
 * REST API callback to add or update student data
 *
 * @param WP_REST_Request $request_data
 * @return array
 */
function ssr_update_st_submit( $request_data ) {
    $parameters = $request_data->get_params();

    // Validate 'rid' parameter
    if ( ! isset( $parameters['rid'] ) || empty( $parameters['rid'] ) || strlen( $parameters['rid'] ) == 0 ) {
        return array(
            'success' => false,
            'message' => 'Registration ID not found',
            'code'    => 404,
        );
    }

    global $wpdb;

    if ( isset( $parameters['rid'] ) ) {
        // Sanitize and prepare data
        $data = array(
            'rid'         => ssr_needsCleaning( $parameters['rid'] ),
            'roll'        => isset( $parameters['roll'] ) ? ssr_needsCleaning( $parameters['roll'] ) : '',
            'stdname'     => isset( $parameters['stdname'] ) ? ssr_needsCleaning( $parameters['stdname'] ) : '',
            'fathersname' => isset( $parameters['fathersname'] ) ? ssr_needsCleaning( $parameters['fathersname'] ) : '',
            'pyear'       => isset( $parameters['pyear'] ) ? ssr_needsCleaning( $parameters['pyear'] ) : '',
            'cgpa'        => isset( $parameters['cgpa'] ) ? ssr_needsCleaning( $parameters['cgpa'] ) : '',
            'subject'     => isset( $parameters['subject'] ) ? ssr_needsCleaning( $parameters['subject'] ) : '',
            'dob'         => isset( $parameters['dob'] ) ? ssr_needsCleaning( $parameters['dob'] ) : '',
            'gender'      => isset( $parameters['gender'] ) ? ssr_needsCleaning( $parameters['gender'] ) : '',
            'address'     => isset( $parameters['address'] ) ? ssr_needsCleaning( $parameters['address'] ) : '',
            'mnam'        => isset( $parameters['mnam'] ) ? ssr_needsCleaning( $parameters['mnam'] ) : '',
            'c1'          => isset( $parameters['c1'] ) ? ssr_needsCleaning( $parameters['c1'] ) : '',
            'c2'          => isset( $parameters['c2'] ) ? ssr_needsCleaning( $parameters['c2'] ) : '',
            'image'       => isset( $parameters['image'] ) ? ssr_needsCleaning( $parameters['image'] ) : '',
        );

        // Delete existing record with the same 'rid'
        $wpdb->delete( $wpdb->prefix . SSR_TABLE, array( 'rid' => $data['rid'] ) );

        // Insert the new record
        $p = $wpdb->insert(
            $wpdb->prefix . SSR_TABLE,
            ssr_clean_arr( $data ),
            array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' )
        );
    }

    // Get updated student count
    $student_count = $wpdb->get_var( "SELECT COUNT(*) FROM " . $wpdb->prefix . SSR_TABLE );

    return $p ? array(
        'success' => true,
        'count'   => $student_count,
        'code'    => 101,
    ) : array(
        'success' => false,
        'message' => 'Not saved, please email saadvi@gmail.com to submit this error report',
        'code'    => 406,
    );
}

/**
 * REST API callback to delete student data
 *
 * @param WP_REST_Request $request_data
 * @return array
 */
function ssr_delete_data_now( $request_data ) {
    $parameters = $request_data->get_params();

    // Validate 'rid' parameter
    if ( ! isset( $parameters['rid'] ) || empty( $parameters['rid'] ) || strlen( $parameters['rid'] ) == 0 ) {
        return array(
            'success' => false,
            'message' => 'Registration ID not found',
            'code'    => 404,
        );
    }

    global $wpdb;

    if ( isset( $parameters['rid'] ) ) {
        // Delete the record with the specified 'rid'
        $p = $wpdb->delete( $wpdb->prefix . SSR_TABLE, array( 'rid' => ssr_needsCleaning( $parameters['rid'] ) ) );
    }

    // Get updated student count
    $student_count = $wpdb->get_var( "SELECT COUNT(*) FROM " . $wpdb->prefix . SSR_TABLE );

    return $p ? array(
        'success' => true,
        'count'   => $student_count,
        'code'    => 407,
    ) : array(
        'success' => false,
        'message' => 'Not deleted, please email saadvi@gmail.com to submit this error report',
        'code'    => 407,
    );
}

/**
 * REST API callback to update text options
 *
 * @param WP_REST_Request $request_data
 * @return array
 */
function ssr_update_text_option( $request_data ) {
    $parameters = $request_data->get_params();

    // Validate 'optionId' parameter
    if ( ! isset( $parameters['optionId'] ) || empty( $parameters['optionId'] ) || strlen( $parameters['optionId'] ) == 0 ) {
        return array(
            'success' => false,
            'message' => 'Option ID not found',
            'code'    => 404,
        );
    }

    // Validate 'optionValue' parameter
    if ( ! isset( $parameters['optionValue'] ) || empty( $parameters['optionValue'] ) || strlen( $parameters['optionValue'] ) == 0 ) {
        return array(
            'success' => false,
            'message' => 'Option Value not found',
            'code'    => 404,
        );
    }

    // Sanitize and update the option
    $text       = sanitize_text_field( ssr_needsCleaning( $parameters['optionValue'] ) );
    $option_id  = intval( $parameters['optionId'] );
    $option_key = 'ssr_settings_ssr_item' . $option_id;
    $oldval     = esc_attr( get_option( $option_key ) );

    $update_success = update_option( $option_key, $text );

    return array(
        'success' => $update_success,
        'text'    => $text,
        'oldval'  => $oldval,
        'option'  => $option_key,
        'code'    => 701,
    );
}

/**
 * REST API callback to update tick options
 *
 * @param WP_REST_Request $request_data
 * @return array
 */
function ssr_update_tick_option( $request_data ) {
    $parameters = $request_data->get_params();

    // Validate 'optionId' parameter
    if ( ! isset( $parameters['optionId'] ) || empty( $parameters['optionId'] ) || strlen( $parameters['optionId'] ) == 0 ) {
        return array(
            'success' => false,
            'message' => 'Option ID not found',
            'code'    => 404,
        );
    }

    // Validate 'optionValue' parameter
    if ( ! isset( $parameters['optionValue'] ) || strlen( $parameters['optionValue'] ) == 0 ) {
        return array(
            'success' => false,
            'message' => 'Option Value not found',
            'code'    => 404,
        );
    }

    $option_id    = intval( $parameters['optionId'] );
    $option_value = intval( $parameters['optionValue'] );
    $option_key   = 'checkedssr_item' . $option_id;

    // Delete existing option and add the new value
    delete_option( $option_key );
    $add_success = add_option( $option_key, $option_value );

    return array(
        'success' => $add_success,
        'code'    => 702,
    );
}
function ssr_clean_arr($arr){
	$newArr =[];$search="nonce";
	foreach($arr as $key => $val){
        if(!preg_match("/{$search}/i", $key)) {
            $newArr[$key]= ssr_needsCleaning($val);
        }
	}
	return $newArr;
}