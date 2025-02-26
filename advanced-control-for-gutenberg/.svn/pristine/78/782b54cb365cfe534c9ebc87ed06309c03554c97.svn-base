<?php
/**
 * Global Functions
 *
 * @category Class
 * @package ACFG
 * @subpackage ACFGSettings
 * @since 1.0.0
 */

/**
 * Get all editable roles
 *
 * @since 1.0.0
 * @return array
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function acfg_get_editable_roles()
{

    $roles = array();

    if ( ! function_exists( 'get_editable_roles' ) ) {
        require_once ABSPATH . 'wp-admin/includes/user.php';
    }

    $wp_roles = get_editable_roles();

    // Clean up the roles array.
    foreach ( $wp_roles as $role => $role_data ) {
        $roles[ $role ] = $role_data['name'];
    }

    asort( $roles );

    return apply_filters( 'acfg_get_editable_roles', $roles );
}
