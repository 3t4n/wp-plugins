<?php

/**
 * Plugin Name:       SocialMark
 * Plugin URI:        https://shawonpro.com/socialmark-wp-plugin/
 * Description:       Easy way to add/change overlay/watermark to Facebook, Twitter, open graph post preview images.
 * Version:           2.0.7
 * Author:            ShawonPro
 * Author URI:        https://shawonpro.com/
 * Docs:        https://shawonpro.com/socialmark-docs/
 * License: GPLv2 or later
 * Text Domain:       socialmark
 */

if ( !defined( 'ABSPATH' ) ) {
    exit;
    // Exit if accessed directly
}


if ( !function_exists( 'smark_fs' ) ) {
    // Create a helper function for easy SDK access.
    function smark_fs()
    {
        global  $socialmark_ark_fs ;
        
        if ( !isset( $socialmark_ark_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $socialmark_ark_fs = fs_dynamic_init( array(
                'id'             => '8205',
                'slug'           => 'socialmark',
                'type'           => 'plugin',
                'public_key'     => 'pk_7094fd298f65eb74821d84bb8865c',
                'is_premium'     => false,
                'premium_suffix' => 'Premium',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'menu'           => array(
                'slug' => 'socialmark',
            ),
                'is_live'        => true,
            ) );
        }
        
        return $socialmark_ark_fs;
    }
    
    // Init Freemius.
    smark_fs();
    // Signal that SDK was initiated.
    do_action( 'smark_fs_loaded' );
}


if ( !defined( 'SOCIALMARK_VERSION' ) ) {
    $socialmark_upload_dir = wp_upload_dir();
    define( 'SOCIALMARK_VERSION', '1.0.0' );
    define( 'SOCIALMARK_FILE', __FILE__ );
    define( 'SOCIALMARK_PATH', dirname( SOCIALMARK_FILE ) );
    define( 'SOCIALMARK_URL', plugin_dir_URL( SOCIALMARK_FILE ) );
    define( 'SOCIALMARK_ASSETS', SOCIALMARK_URL . '/assets' );
    define( 'SOCIALMARK_UPLOAD', $socialmark_upload_dir['basedir'] . '/socialmark-images' );
    define( 'SOCIALMARK_UPLOAD_URL', $socialmark_upload_dir['baseurl'] . '/socialmark-images' );
    $socialmark_include_folder = "/includes";
    define( 'SOCIALMARK_INCLUDES', SOCIALMARK_PATH . $socialmark_include_folder );
    include_once SOCIALMARK_INCLUDES . '/main.php';
}

function smark_fs_custom_connect_message_on_update(
    $message,
    $user_first_name,
    $plugin_title,
    $user_login,
    $site_link,
    $freemius_link
)
{
    return sprintf(
        __( 'Hey %1$s' ) . ',<br>' . __( 'Please help us improve %2$s! If you opt-in, some data about your usage of %2$s will be sent to %5$s. If you skip this, that\'s okay! %2$s will still work just fine.', 'socialmark' ),
        $user_first_name,
        '<b>' . $plugin_title . '</b>',
        '<b>' . $user_login . '</b>',
        $site_link,
        $freemius_link
    );
}

smark_fs()->add_filter(
    'connect_message_on_update',
    'smark_fs_custom_connect_message_on_update',
    10,
    6
);