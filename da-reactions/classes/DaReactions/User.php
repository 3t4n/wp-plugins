<?php

/**
 * Class User
 *
 * Manages all user tasks such as identify an unregistered user by cookie
 *
 * @package DaReactions
 *
 * @since 1.0.0
 */
namespace DaReactions;

use WP_User;
/**
 * Class User
 *
 * Manages all user tasks such as identify an unregistered user by cookie
 *
 * @package DaReactions
 *
 * @since 1.0.0
 */
class User {
    /**
     * User constructor.
     *
     * @param Main $main
     *
     * @since 1.0.0
     */
    public function __construct() {
    }

    /**
     * Save a cookie if needed
     *
     * @since 1.0.0
     */
    public function setCookie() {
        $general_options = Options::getInstance( 'general' );
        if ( $general_options->getOption( 'id_method_cookie' ) === 'on' ) {
            $token = self::getUserToken();
            setcookie(
                'da-reactions-token',
                $token,
                time() + 60 * 60 * 24 * 365,
                '/',
                ( isset( $_SERVER['SERVER_NAME'] ) ? $_SERVER['SERVER_NAME'] : 'no_server_name' ),
                true,
                true
            );
        }
    }

    /**
     * Get the current user IP address
     *
     * @return string
     *
     * @since 1.0.0
     */
    public static function getUserIp() {
        $client = false;
        if ( array_key_exists( 'HTTP_CLIENT_IP', $_SERVER ) ) {
            $client = $_SERVER['HTTP_CLIENT_IP'];
        }
        $forward = false;
        if ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $_SERVER ) ) {
            $forward = ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : '' );
        }
        $remote = false;
        if ( array_key_exists( 'REMOTE_ADDR', $_SERVER ) ) {
            $remote = ( isset( $_SERVER['REMOTE_ADDR'] ) ? $_SERVER['REMOTE_ADDR'] : '' );
        }
        if ( filter_var( $client, FILTER_VALIDATE_IP ) ) {
            $ip = $client;
        } elseif ( filter_var( $forward, FILTER_VALIDATE_IP ) ) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
        return $ip;
    }

    /**
     * Get a pseudo unique string token to identify a user
     *
     * @return string
     *
     * @since 1.0.0
     */
    public static function getUserToken( $user = null ) {
        $general_options = Options::getInstance( 'general' );
        $current_user = ( isset( $user ) ? $user : wp_get_current_user() );
        $user_role = self::getUserRole( $current_user );
        $user_can_react = true;
        if ( $user_can_react ) {
            if ( $user_role === 'unregistered' ) {
                // We don't know who the user is
                if ( isset( $_COOKIE['da-reactions-token'] ) && $general_options->getOption( 'id_method_cookie' ) === 'on' ) {
                    // There is a token saved as cookie
                    $token = $_COOKIE['da-reactions-token'];
                } else {
                    if ( $general_options->getOption( 'id_method_ip' ) === 'on' ) {
                        // We may use IP address
                        $token = Utils::hash( self::getUserIp() );
                    } else {
                        // We cannot use IP address
                        $token = Utils::hash( time() );
                    }
                }
            } else {
                // We know the user!
                $token = Utils::hash( $current_user->ID );
            }
        } else {
            /// No anon & no user role
            $token = 0;
        }
        return $token;
    }

    /**
     * Get user role
     *
     * @param WP_User|null $user
     *
     * @return string
     *
     * @since 1.0.0
     */
    public static function getUserRole( $user = null ) {
        if ( !isset( $user ) ) {
            $user = wp_get_current_user();
        }
        if ( !is_null( $user ) ) {
            if ( !isset( $user->roles ) ) {
                $user->roles = [];
            }
            if ( count( $user->roles ) > 0 ) {
                return array_values( $user->roles )[0];
            }
        }
        return 'unregistered';
    }

    /**
     * Tell if user can add Reaction
     *
     * @param null $user
     * @return bool
     *
     * @since 3.15.0
     */
    public static function userCanReact( $user = null ) {
        $general_options = Options::getInstance( 'general' );
        if ( $general_options->getOption( 'user_roles_restriction', 'off' ) !== 'on' ) {
            /// Anybody can react
            return true;
        }
        $user = ( $user ?: wp_get_current_user() );
        foreach ( $user->roles as $role ) {
            if ( $general_options->getOption( "user_role_{$role}" ) === 'on' ) {
                /// At least one of this user is enabled
                return true;
            }
        }
        return false;
    }

}
